<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Cart extends Resolver
{
    /**
     * @var \Magento\Catalog\Model\ProductRepository
     */
    private $_productRepository;
    /**
     * @var \Magento\Downloadable\Api\LinkRepositoryInterface
     */
    private $_linkRepository;
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    private $_cartModel;

    public function __construct(
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Checkout\Model\Cart $cartModel,
        \Magento\Downloadable\Api\LinkRepositoryInterface $linkRepository
    ) {
        $this->_productRepository = $productRepository;
        $this->_cartModel = $cartModel;
        $this->_linkRepository = $linkRepository;
    }
    public function add($args)
    {
        $options = [];
        $links = [];
        $super_attributes = [];

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

        $params = [
            'product' => $args['id'],
            'qty' => $args['quantity'],
            'options' => $options,
            'super_attribute' => $super_attributes,
            'links' => $links
        ];
        $product_info = $this->_productRepository->getById($args['id']);

        try {
            $this->_cartModel->addProduct($product_info, $params);
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\LocalizedException(__($e->getMessage()));
        }

        $this->_cartModel->save();

        return $this->get($args);
    }

    public function update($args)
    {
        $item = $this->_cartModel->getQuote()->getItemById($args['key']);
        $item->setQty($args['quantity']);
        $this->_cartModel->save();

        return $this->get($args);
    }

    public function remove($args)
    {
        $this->_cartModel->removeItem($args['key'])->save();

        return $this->get($args);
    }

    public function get($args)
    {
        $this->_cartModel->getQuote()->collectTotals();
        $cart = [
            'products' => [],
            'total' => $this->currency->format($this->_cartModel->getQuote()->getGrandTotal())
        ];

        $results = $this->_cartModel->getItems();

        foreach ($results as $value) {
            /** @var \Magento\Catalog\Model\Product $product */
            $product = $value->getProduct();
            if (!$value->isDeleted() && !$value->getParentItemId() && !$value->getParentItem()) {
                $cart['products'][] = [
                    'key' => $value->getId(),
                    'product' => $this->load->resolver('store/product/get', ['product' => $value->getProduct()]),
                    'quantity' => $value->getQty(),
                    'option' => $this->getCartOptions($product, $value),
                    'total' => $this->currency->format($value->getPrice() * $value->getQty())
                ];
            }
        }

        return $cart;
    }

    /**
     * @param $product \Magento\Catalog\Model\Product
     * @param $value mixed
     * @return array
     */
    public function getCartOptions($product, $value)
    {
        $options = [];
        $result_options = $product->getTypeInstance(true)->getOrderOptions($product);
        if (!empty($result_options['links'])) {
            $values = [];
            $productLinks = $this->_linkRepository->getLinksByProduct($product);

            foreach ($productLinks as $link) {
                if (in_array($link->getId(), $result_options['links'])) {
                    $values[] = $link->getTitle();
                }
            }

            $options[] = [
                'name' => $value->getProduct()->getData('links_title'),
                'type' => 'checkbox',
                'value' => implode(', ', $values)
            ];
        }
        if (!empty($result_options['attributes_info'])) {
            foreach ($result_options['attributes_info'] as $option) {
                $options[] = [
                    'name' => $option['label'],
                    'type' => 'radio',
                    'value' => $option['value']
                ];
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

                $options[] = [
                    'name' => $option['label'],
                    'type' => $type,
                    'value' => $option['value']
                ];
            }
        }

        return $options;
    }
}
