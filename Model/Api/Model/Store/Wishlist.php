<?php

namespace Vuefront\Vuefront\Model\Api\Model\Store;

use \Vuefront\Vuefront\Model\Api\System\Engine\Model;

class Wishlist extends Model
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

    public function getWishlist()
    {
        $result = [];

        if (!empty($this->_sessionManager->getWishList())) {
            $result = $this->_sessionManager->getWishList();
        }

        return $result;
    }

    public function addWishlist($product_id)
    {
        $wishList = $this->_sessionManager->getWishList();

        if (!$wishList) {
            $wishList = [];
        }

        if (!in_array($product_id, $wishList)) {
            $wishList[] = (int)$product_id;
        }

        $this->_sessionManager->setWishList($wishList);
    }

    public function deleteWishlist($product_id)
    {
        if ($this->_sessionManager->getWishList()) {
            $wishList = $this->_sessionManager->getWishList();
            $key = array_search($product_id, $wishList);

            if ($key !== false) {
                unset($wishList[$key]);
            }

            $this->_sessionManager->setWishList($wishList);
        }
    }
}
