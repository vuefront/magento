<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Compare extends Model
{
    /**
     * @var \Magento\Framework\Session\SessionManagerInterface
     */
    private $_sessionManager;

    public function __construct(
        \Magento\Framework\Session\SessionManagerInterface $sessionManager
    ) {
        $this->_sessionManager = $sessionManager;
    }

    public function getCompare()
    {
        $result = [];

        if (!empty($this->_sessionManager->getCompare())) {
            $result = $this->_sessionManager->getCompare();
        }

        return $result;
    }

    public function addCompare($product_id)
    {

        $compare = $this->_sessionManager->getCompare();

        if (!$compare) {
            $compare = [];
        }

        if (!in_array($product_id, $compare)) {
            if (count($compare) >= 4) {
                array_shift($compare);
            }
            $compare[] = (int)$product_id;
        }

        $this->_sessionManager->setCompare($compare);
    }

    public function deleteCompare($product_id)
    {
        if ($this->_sessionManager->getCompare()) {
            $compare = $this->_sessionManager->getCompare();
            $key = array_search($product_id, $compare);

            if ($key !== false) {
                unset($compare[$key]);
            }
            $this->_sessionManager->setCompare($compare);
        }
    }
}
