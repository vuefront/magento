<?php

namespace Vuefront\Vuefront\Model;

use Magento\Framework\App\Action\Context;
use Vuefront\Vuefront\Api\InformationInterface;

class InformationModel implements InformationInterface
{
    private $scopeConfig;
    private $context;
    private $response;
    private $redirect;
    private $url;
    private $driver;
    private $storeManager;
    private $moduleManager;
    private $moduleList;
    private $driverFile;
    private $dir;
    private $file;
    private $moduleReader;
    private $zendFileExists;
    private $zendHttp;
    private $arhiveTar;
    protected $request;
    protected $startup;
    protected $collectionFactory;

    public function __construct(
        Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\UrlInterface $url,
        \Magento\Framework\Webapi\Rest\Response $response,
        \Magento\Framework\Webapi\Rest\Request $request,
        \Magento\Framework\Filesystem\Driver\File $driver,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productFactory,
        \Vuefront\Vuefront\Model\Api\System\Startup $startup,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Module\Manager $moduleManager,
        \Magento\Framework\Module\ModuleListInterface $moduleList,
        \Magento\Framework\Filesystem\DirectoryList $dir,
        \Magento\Framework\Filesystem\Driver\File $driverFile,
        \Magento\Framework\Module\Dir\Reader $moduleReader,
        \Zend\Uri\Http $zendHttp,
        \Zend\Validator\File\Exists $zendFileExists,
        \Magento\Framework\Filesystem\Io\File $file,
        \Magento\Framework\Archive\Tar $arhiveTar
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->context = $context;
        $this->response = $response;
        $this->request = $request;
        $this->redirect = $context->getRedirect();
        $this->url = $url;
        $this->startup = $startup;
        $this->driver = $driver;
        $this->collectionFactory = $productFactory;
        $this->moduleManager = $moduleManager;
        $this->storeManager = $storeManager;
        $this->moduleList = $moduleList;
        $this->dir = $dir;
        $this->moduleReader = $moduleReader;
        $this->driverFile = $driverFile;
        $this->zendFileExists = $zendFileExists;
        $this->file = $file;
        $this->zendHttp = $zendHttp;
        $this->arhiveTar = $arhiveTar;
    }

    public function checkCors()
    {
        if (!empty($this->request->get('cors'))) {
            if (!empty($this->request->getServer('HTTP_ORIGIN'))) {
                $this->response->setHeader('Access-Control-Allow-Origin', $this->request->getServer('HTTP_ORIGIN'));
            } else {
                $this->response->setHeader('Access-Control-Allow-Origin', '*');
            }
            $this->response->setHeader('Access-Control-Allow-Methods', 'POST, OPTIONS, GET');
            $this->response->setHeader('Access-Control-Allow-Credentials', 'true');
            $this->response->setHeader(
                'Access-Control-Allow-Headers',
                'DNT,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,' .
                'Content-Type,Range,Token,token,Cookie,cookie,content-type,Authorization,authorization'
            );
        }
    }

    public function cors()
    {
        $this->checkCors();
        return '';
    }

    public function vfInformation()
    {

        $extensions = [];

        if ($this->moduleManager->isOutputEnabled('Magefan_Blog')) {
            $extensions[] = [
            'name' => 'Magefan Blog',
            'version' => $this->moduleList->getOne('Magefan_Blog')['setup_version'],
            'status' => $this->moduleManager->isEnabled('Magefan_Blog')
            ];
        } else {
            $extensions[] = [
            'name' => 'Magefan Blog',
            'version' => '',
            "status" => false
            ];
        }

        $moduleDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_VIEW_DIR,
            'Vuefront_Vuefront'
        );
        
        $catalog = $this->storeManager->getStore()->getBaseUrl() . "rest/V1/vuefront/graphql";

        $is_apache = strpos($this->request->getServerValue("SERVER_SOFTWARE"), "Apache") !== false;

        return [
        'apache' => $is_apache,
        'backup' => $moduleDir.'/adminhtml/web/js/backup/.htaccess.txt',
        'htaccess' => true,
        'status' => $this->zendFileExists->isValid($moduleDir . '/adminhtml/web/js/backup/.htaccess.txt'),
        'phpversion' => phpversion(),
        'plugin_version' => $this->moduleList->getOne('Vuefront_Vuefront')['setup_version'],
        'extensions' => $extensions,
        'cmsConnect' => $catalog,
        'server' => $this->request->getServerValue("SERVER_SOFTWARE")
        ];
    }

    public function vfTurnOn()
    {
        $catalog = $this->storeManager->getStore()->getBaseUrl();

        try {
            $rootFolder = $this->driverFile->getRealPath($this->dir->getRoot());

            $catalog_url_info = $this->zendHttp->parse($catalog);

            $catalog_path = $catalog_url_info->getPath();
            $document_path = $catalog_path;
            if (!empty($this->request->getServerValue('DOCUMENT_ROOT'))) {
                $document_path = str_replace(
                    $this->driverFile->getRealPath($this->request->getServerValue('DOCUMENT_ROOT')),
                    '',
                    $rootFolder
                ) . '/';
            }

            if (strpos($this->request->getServerValue("SERVER_SOFTWARE"), "Apache") !== false) {

                if (!$this->zendFileExists->isValid($rootFolder . '/.htaccess')) {
                    $this->driverFile->filePutContents($rootFolder.'/.htaccess', "Options +FollowSymlinks
Options -Indexes
<FilesMatch \"(?i)((\.tpl|\.ini|\.log|(?<!robots)\.txt))\">
Require all denied
</FilesMatch>
RewriteEngine On
RewriteBase ".$catalog_path."
RewriteRule ^sitemap.xml$ index.php?route=extension/feed/google_sitemap [L]
RewriteRule ^googlebase.xml$ index.php?route=extension/feed/google_base [L]
RewriteRule ^system/download/(.*) index.php?route=error/not_found [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*\.(ico|gif|jpg|jpeg|png|js|css)
RewriteRule ^([^?]*) index.php?_route_=$1 [L,QSA]");
                }

                if (!$this->driverFile->isWritable($rootFolder . '/.htaccess')) {
                    return [
                      'error' => 'not_writable_htaccess'
                    ];
                }

                if ($this->zendFileExists->isValid($rootFolder . '/.htaccess')) {

                    $paths = [
                    'image',
                    '.php',
                    'admin',
                    'catalog',
                    '\/img\/.*\/',
                    'wp-json',
                    'wp-admin',
                    'wp-content',
                    'checkout',
                    'rest',
                    'static',
                    'order',
                    'themes\/',
                    'modules\/',
                    'js\/',
                    '\/vuefront\/'
                    ];
                    $inserting = "# VueFront scripts, styles and images
RewriteCond %{REQUEST_URI} .*(_nuxt)
RewriteCond %{REQUEST_URI} !.*/vuefront/_nuxt
RewriteRule ^([^?]*) vuefront/$1

# VueFront sw.js
RewriteCond %{REQUEST_URI} .*(sw.js)
RewriteCond %{REQUEST_URI} !.*/vuefront/sw.js
RewriteRule ^([^?]*) vuefront/$1

# VueFront favicon.ico
RewriteCond %{REQUEST_URI} .*(favicon.ico)
RewriteCond %{REQUEST_URI} !.*/vuefront/favicon.ico
RewriteRule ^([^?]*) vuefront/$1

# VueFront pages

# VueFront home page
RewriteCond %{REQUEST_URI} !.*(".implode('|', $paths).")
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/index.html -f
RewriteRule ^$ vuefront/index.html [L]

RewriteCond %{REQUEST_URI} !.*(".implode('|', $paths).")
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/index.html !-f
RewriteRule ^$ vuefront/200.html [L]

# VueFront page if exists html file
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*(".implode('|', $paths).")
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/$1.html -f
RewriteRule ^([^?]*) vuefront/$1.html [L,QSA]

# VueFront page if not exists html file
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*(".implode('|', $paths).")
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/$1.html !-f
RewriteRule ^([^?]*) vuefront/200.html [L,QSA]";

                    $content = $this->driverFile->fileGetContents($rootFolder . '/.htaccess');

                    $moduleDir = $this->moduleReader->getModuleDir(
                        \Magento\Framework\Module\Dir::MODULE_VIEW_DIR,
                        'Vuefront_Vuefront'
                    );

                    if (!$this->driverFile->isDirectory($moduleDir . '/adminhtml/web/js/backup')) {
                        $this->driverFile->createDirectory($moduleDir . '/adminhtml/web/js/backup');
                    }

                    $this->driverFile->filePutContents(
                        $moduleDir . '/adminhtml/web/js/backup/.htaccess.txt',
                        $content
                    );

                    preg_match('/# VueFront pages/m', $content, $matches);

                    if (count($matches) == 0) {
                        $content = preg_replace_callback('/RewriteBase\s.*$/m', function ($matches) use ($inserting) {
                            return $matches[0] . PHP_EOL . $inserting . PHP_EOL;
                        }, $content);

                        $this->driverFile->filePutContents($rootFolder . '/.htaccess', $content);
                    }
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $this->vfInformation();
    }

    public function vfTurnOff()
    {
        $rootFolder = $this->driverFile->getRealPath($this->dir->getRoot());

        $moduleDir = $this->moduleReader->getModuleDir(
            \Magento\Framework\Module\Dir::MODULE_VIEW_DIR,
            'Vuefront_Vuefront'
        );

        if (strpos($this->request->getServerValue("SERVER_SOFTWARE"), "Apache") !== false) {
            if ($this->zendFileExists->isValid($moduleDir . '/adminhtml/web/js/backup/.htaccess.txt')) {
                if (!$this->driverFile->isWritable($rootFolder . '/.htaccess') ||
                   !$this->driverFile->isWritable($moduleDir . '/adminhtml/web/js/backup/.htaccess.txt')
                   ) {
                    return [
                    'error' => 'not_writable_htaccess'
                    ];
                }
                $content = $this->driverFile->fileGetContents($moduleDir . '/adminhtml/web/js/backup/.htaccess.txt');
                $this->driverFile->filePutContents($rootFolder . '/.htaccess', $content);
                $this->file->rm($moduleDir . '/adminhtml/web/js/backup/.htaccess.txt');
            }
        }

        return $this->vfInformation();
    }

    public function vfUpdate()
    {
        try {
            $rootFolder = $this->driverFile->getRealPath($this->dir->getRoot());
            $pubFolder = $this->driverFile->getRealPath($this->dir->getPath('pub'));
            $moduleDir = $this->moduleReader->getModuleDir(
                \Magento\Framework\Module\Dir::MODULE_VIEW_DIR,
                'Vuefront_Vuefront'
            );

            $this->driverFile->filePutContents(
                $moduleDir . '/adminhtml/web/js/download.tar',
                $this->driverFile->fileGetContents($this->request->getBodyParams()['url'])
            );
            if (strpos($this->request->getServerValue("SERVER_SOFTWARE"), "Apache") !== false) {
                $this->file->rmdirRecursive($rootFolder . '/vuefront');

                $this->arhiveTar->unpack($moduleDir . '/adminhtml/web/js/download.tar', $rootFolder . '/vuefront//');
            } else {
                $this->file->rmdirRecursive($pubFolder . '/vuefront');

                $this->arhiveTar->unpack($moduleDir . '/adminhtml/web/js/download.tar', $pubFolder . '/vuefront//');
            }

            $this->file->rm($moduleDir . '/adminhtml/web/js/download.tar');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $this->vfInformation();
    }

    public function info()
    {
        $result = [];
        $this->checkCors();

        switch ($this->request->getParam('id')) {
            case 'vf_information':
                $result = $this->vfInformation();
                break;
            case 'vf_turn_on':
                $result = $this->vfTurnOn();
                break;
            case 'vf_turn_off':
                $result = $this->vfTurnOff();
                break;
            case 'vf_update':
                $result = $this->vfUpdate();
                break;
            default:
                $result = [];
                break;
        }

        return $result;
    }
}
