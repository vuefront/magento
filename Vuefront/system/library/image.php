<?php

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\UrlInterface;

class Image
{
    public function __construct() {
        $objectManager =ObjectManager::getInstance();
        $this->storeManager = $objectManager->get('Magento\Store\Model\StoreManagerInterface');
        $this->imageFactory = $objectManager->get('Magento\Framework\Image\AdapterFactory');
        $this->_filesystem = $objectManager->get('Magento\Framework\Filesystem');
        $this->_directory = $this->_filesystem->getDirectoryWrite(DirectoryList::MEDIA);
    }
 
    public function resize($imageName,$width = 258,$height = 200)
    {
        $realPath = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('catalog/product'.$imageName);
        if (!$this->_directory->isFile($realPath) || !$this->_directory->isExist($realPath)) {
            return false;
        }

        $pathRelativeImage = $this->_directory->getRelativePath(dirname($realPath));

        $targetDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('resized/'.$width.'x'.$height.'/'.$pathRelativeImage);
        $pathTargetDir = $this->_directory->getRelativePath($targetDir);

        if (!$this->_directory->isExist($pathTargetDir)) {
            $this->_directory->create($pathTargetDir);
        }
        if (!$this->_directory->isExist($pathTargetDir)) {
            return false;
        }

        $dest = $targetDir . '/' . pathinfo($realPath, PATHINFO_BASENAME);

        if(!$this->_directory->isFile($this->_directory->getRelativePath($dest))) {
            $image = $this->imageFactory->create();
            $image->open($realPath);
            $image->keepAspectRatio(true);
            $image->resize($width,$height);
            $image->save($dest);
        }
        
        if ($this->_directory->isFile($this->_directory->getRelativePath($dest))) {
            return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA).'resized/'.$width.'x'.$height.'/catalog/product'.$imageName;
        }
        return false;
    }

    public function getUrl($imagePath) {
        return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' . $imagePath;
    }
}
