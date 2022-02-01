<?php

namespace Vuefront\Vuefront\Model\Api\Resolver\Common;

use \Vuefront\Vuefront\Model\Api\System\Engine\Resolver;

class Home extends Resolver
{
    private $codename = "d_vuefront";

    private $_pageFactory;
    private $_scopeConfig;
    private $_sessionFactory;
    private $_moduleReader;
    private $_driverFile;
    private $_dir;
    private $_file;
    private $_arhiveTar;
    protected $request;

    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Customer\Model\Session $sessionFactory,
        \Magento\Framework\Filesystem\Driver\File $driverFile,
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Magento\Framework\Filesystem\Io\File $file,
        \Magento\Framework\Filesystem\DirectoryList $dir,
        \Magento\Framework\Webapi\Rest\Request $request,
        \Magento\Framework\Archive\Tar $arhiveTar
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_scopeConfig = $scopeConfig;
        $this->_sessionFactory = $sessionFactory;
        $this->_driverFile = $driverFile;
        $this->_moduleReader = $moduleReader;
        $this->request = $request;
        $this->_file = $file;
        $this->_dir = $dir;
        $this->_arhiveTar = $arhiveTar;
    }

    public function get($args)
    {
        $page_id = $this->_scopeConfig
            ->getValue('web/default/cms_home_page', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $page = $this->_pageFactory->create()->load($page_id);
        return [
            'meta' => [
                'title' => $page->getMetaTitle() !== '' ? $page->getTitle() : $page->getTitle(),
                'description' => $page->getMetaDescription(),
                'keyword' => $page->getMetaKeywords()
            ]
        ];
    }
    public function searchUrl($args)
    {
        $this->load->model('common/seo');

        $result = $this->model_common_seo->searchKeyword($args['url']);

        return $result;
    }

    public function updateApp($args)
    {
        $this->load->model('common/vuefront');
        $this->moedl->editApp($args['name'], $args['settings']);

        return $this->model_common_vuefront->getApp($args['name']);
    }

    public function updateSite($args)
    {
        try {
            $rootFolder = $this->_driverFile->getRealPath($this->_dir->getRoot());
            $pubFolder = $this->_driverFile->getRealPath($this->_dir->getPath('pub'));
            $moduleDir = $this->_moduleReader->getModuleDir(
                \Magento\Framework\Module\Dir::MODULE_VIEW_DIR,
                'Vuefront_Vuefront'
            );

            $this->_driverFile->filePutContents(
                $moduleDir . '/adminhtml/web/js/download.tar',
                $this->_driverFile->fileGetContents("https://vuefront2019.s3.amazonaws.com/sites/".$args['number']."/vuefront-app.tar")
            );
            if (strpos($this->request->getServerValue("SERVER_SOFTWARE"), "Apache") !== false) {
                $this->_file->rmdirRecursive($rootFolder . '/vuefront');

                $this->_arhiveTar->unpack($moduleDir . '/adminhtml/web/js/download.tar', $rootFolder . '/vuefront//');
            } else {
                $this->_file->rmdirRecursive($pubFolder . '/vuefront');

                $this->_arhiveTar->unpack($moduleDir . '/adminhtml/web/js/download.tar', $pubFolder . '/vuefront//');
            }

            $this->_file->rm($moduleDir . '/adminhtml/web/js/download.tar');
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function authProxy($args)
    {
        $this->load->model('common/d_vuefront');

        if (!$this->_sessionFactory->isLoggedIn()) {
            return;
        }
        $customer = $this->_sessionFactory->getCustomer();
        $app_info = $this->model_common_vuefront->getApp($args['app']);
        $url = str_replace(':id', $customer->getId(), $app_info['authUrl']);
        $result = $this->model_common_vuefront->request($url, [
            'customer_id' => $customer->getId(),
        ], $app_info['jwt']);

        if (!$result) {
            return '';
        }

        return $result['token'];
    }

    public function version($args)
    {
        return '1.0.0';
    }
}
