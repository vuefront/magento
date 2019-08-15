<?php

namespace Vuefront\Vuefront\Model\Api\System\Library;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\UrlInterface;

/**
 * @property \Magento\Framework\Image\AdapterFactory $_imageFactory
 * @property \Magento\Framework\Filesystem $_fileSystem
 */
class Image
{
    private $storeManager;
    private $imageFactory;
    private $_fileSystem;
    private $_directory;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Image\AdapterFactory $imageFactory,
        \Magento\Framework\Filesystem $filesystem
    ) {
        $this->storeManager = $storeManager;
        $this->imageFactory = $imageFactory;
        $this->_fileSystem = $filesystem;
        $this->_directory = $this->_fileSystem->getDirectoryWrite(DirectoryList::MEDIA);
    }

    public function resize($imageName, $width = 258, $height = 200, $prefix = 'catalog/product')
    {
        $absolutePath = $this->_fileSystem
                ->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::ROOT)
                ->getAbsolutePath('/pub/media/') . $imageName;
        $absolutePath = str_replace('//media/', '/', $absolutePath);
        $imageResized = $this->_fileSystem
                ->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA)
                ->getAbsolutePath('resized/' . $width . '/') . $imageName;
        $imageResized = str_replace('//', '/', $imageResized);
        $imageResize = $this->imageFactory->create();
        $imageResize->open($absolutePath);
        $imageResize->constrainOnly(true);
        $imageResize->keepTransparency(true);
        $imageResize->keepFrame(false);
        $imageResize->keepAspectRatio(true);
        $imageResize->resize($width, $height);
        $destination = $imageResized;
        $imageResize->save($destination);

        $resizedURL = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)
            . 'resized/' . $width . '/' . $imageName;

        return $resizedURL;
    }

    public function getUrl($imagePath, $prefix = 'catalog/product')
    {
        return $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA) . $prefix . $imagePath;
    }
}
