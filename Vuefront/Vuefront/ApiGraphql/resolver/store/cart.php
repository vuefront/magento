<?php

use \Magento\Framework\App\ObjectManager;

require_once VF_SYSTEM_DIR . 'engine/resolver.php';

class ResolverStoreCart extends Resolver
{
    public function add($args)
    {
        $objectManager = ObjectManager::getInstance();

        /** @var Magento\Catalog\Model\ProductRepository $productRepository */
        $productRepository = $objectManager->get('Magento\Catalog\Model\ProductRepository');
        /** @var Magento\Checkout\Model\Cart $cart */
        $cart = $objectManager->get('Magento\Checkout\Model\Cart');
        $options = array();
        $links = array();
        $super_attributes = array();

        foreach ($args['options'] as $value) {
            if (substr($value['id'], 0, 7) === "option_") {
                if (strpos($value['value'], '|') === false) {
                    $options[str_replace('option_', '', $value['id'])] = $value['value'];
                } else {
                    $values = array_filter(explode('|', $value['value']), function ($value) {
                        return $value !== '';
                    });
                    $options[str_replace('option_', '', $value['id'])] = $values;
                }
            } elseif ($value['id'] == 'links') {
                $values = array_filter(explode('|', $value['value']), function ($value) {
                    return $value !== '';
                });
                $links = $values;
            } else {
                $super_attributes[$value['id']] = $value['value'];
            }
        }

        $params = array(
            'product' => $args['id'],
            'qty' => $args['quantity'],
            'options' => $options,
            'super_attribute' => $super_attributes,
            'links' => $links
        );
        $product_info = $productRepository->getById($args['id']);

        try {
            $cart->addProduct($product_info, $params);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        $cart->save();

        return $this->get($args);
    }

    public function update($args)
    {
        $objectManager = ObjectManager::getInstance();
        /** @var Magento\Checkout\Model\Cart $cart */
        $cart = $objectManager->get('Magento\Checkout\Model\Cart');

        $item = $cart->getQuote()->getItemById($args['key']);
        $item->setQty($args['quantity']);
        $cart->save();

        return $this->get($args);
    }

    public function remove($args)
    {
        $objectManager = ObjectManager::getInstance();
        /** @var Magento\Checkout\Model\Cart $modelCart */
        $modelCart = $objectManager->get('Magento\Checkout\Model\Cart');

        $modelCart->removeItem($args['key'])->save();

        return $this->get($args);
    }

    public function get($args)
    {
        $objectManager = ObjectManager::getInstance();

        /** @var Magento\Checkout\Model\Cart $modelCart */
        $modelCart = $objectManager->get('Magento\Checkout\Model\Cart');
        /** @var Magento\Downloadable\Api\LinkRepositoryInterface $linkRepository */
        $linkRepository = $objectManager->get('Magento\Downloadable\Api\LinkRepositoryInterface');

        $modelCart->getQuote()->collectTotals();
        $cart = array(
            'products' => array(),
            'total' => $this->currency->format($modelCart->getQuote()->getGrandTotal())
        );

        $results = $modelCart->getItems();

        foreach ($results as $value) {
            /** @var Magento\Catalog\Model\Product $product */
            $product = $value->getProduct();
            if (!$value->isDeleted() && !$value->getParentItemId() && !$value->getParentItem()) {
                $options = array();

                $result_options = $product->getTypeInstance(true)->getOrderOptions($product);
                if (!empty($result_options['links'])) {
                    $values = array();
                    $productLinks = $linkRepository->getLinksByProduct($product);

                    foreach ($productLinks as $link) {
                        if (in_array($link->getId(), $result_options['links'])) {
                            $values[] = $link->getTitle();
                        }
                    }

                    $options[] = array(
                        'name' => $value->getProduct()->getData('links_title'),
                        'type' => 'checkbox',
                        'value' => implode(', ', $values)
                    );
                }
                if (!empty($result_options['attributes_info'])) {
                    foreach ($result_options['attributes_info'] as $option) {
                        $options[] = array(
                            'name' => $option['label'],
                            'type' => 'radio',
                            'value' => $option['value']
                        );
                    }
                }
                if (!empty($result_options['options'])) {
                    foreach ($result_options['options'] as $option) {
                        $type = 'text';

                        switch ($option['option_type']) {
                            case 'field':
                                $type = 'text';
                                break;
                            case 'area':
                                $type = 'textarea';
                                break;
                            case 'drop_down':
                                $type = 'select';
                                break;
                            case 'multiple':
                                $type = 'checkbox';
                                break;
                            case 'date_time':
                                $type = 'datetime';
                                break;
                            default:
                                $type = $option['option_type'];
                                break;
                        }

                        $options[] = array(
                            'name' => $option['label'],
                            'type' => $type,
                            'value' => $option['value']
                        );
                    }
                }

                $cart['products'][] = array(
                    'key' => $value->getId(),
                    'product' => $this->load->resolver('store/product/get', array('product' => $value->getProduct())),
                    'quantity' => $value->getQty(),
                    'option' => $options,
                    'total' => $this->currency->format($value->getPrice() * $value->getQty())
                );
            }
        }

        return $cart;
    }
}
