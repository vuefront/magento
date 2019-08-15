<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Magento\Store\Model\ScopeInterface;
use \Magento\Framework\App\Area;
use \Magento\Store\Model\Store;
use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Contact extends Resolver
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $_scopeConfig;
    /**
     * @var \Magento\Framework\Translate\Inline\StateInterface
     */
    private $_stateModel;
    /**
     * @var \Magento\Framework\Mail\Template\TransportBuilder
     */
    private $_transportBuilder;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Translate\Inline\StateInterface $stateModel,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder
    ) {
        $this->_scopeConfig = $scopeConfig;
        $this->_stateModel = $stateModel;
        $this->_transportBuilder = $transportBuilder;
    }

    public function get()
    {
        return [
            'store' => $this->_scopeConfig->getValue('general/store_information/name', ScopeInterface::SCOPE_STORE),
            'email' => $this->_scopeConfig->getValue('trans_email/ident_general/email', ScopeInterface::SCOPE_STORE),
            'address' => $this->store->getFormattedAddress(),
            'geocode' => '',
            'locations' => [],
            'telephone' => $this->_scopeConfig
                ->getValue('general/store_information/phone', ScopeInterface::SCOPE_STORE),
            'fax' => '',
            'open' => $this->_scopeConfig->getValue('general/store_information/hours', ScopeInterface::SCOPE_STORE),
            'comment' => ''
        ];
    }

    public function send($args)
    {
        $this->_stateModel->suspend();
        try {
            $sender = [
                'name' => $args['name'],
                'email' => $args['email'],
            ];

            $storeScope = ScopeInterface::SCOPE_STORE;
            $transport = $this->_transportBuilder
                ->setTemplateIdentifier('send_email_email_template')
                ->setTemplateOptions(
                    [
                        'area' => Area::AREA_FRONTEND,
                        'store' => Store::DEFAULT_STORE_ID,
                    ]
                )
                ->setTemplateVars($args)
                ->setFrom($sender)
                ->addTo($this->_scopeConfig->getValue('trans_email/ident_general/email', $storeScope))
                ->getTransport();

            $transport->sendMessage();
            $this->_stateModel->resume();
        } catch (\Exception $e) {
            $this->_stateModel->resume();
            throw new \Magento\Framework\Exception\MailException(__($e->getMessage()));
        }

        return [
            "status" => true
        ];
    }
}
