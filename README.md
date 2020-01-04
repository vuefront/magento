<p align="center">
  <br>
  <a href="https://vuefront.com">
    <img src="https://raw.githubusercontent.com/vuefront/vuefront-docs/master/.vuepress/public/img/github/vuefront-magento.jpg" width="400"/>
  </a>
</p>
<h1 align="center">VueFront</h1>
<h3 align="center">CMS Connect App for Magento
</h3>

<p align="center">
  <a href="https://github.com/vuefront/vuefront"><img src="https://img.shields.io/badge/price-FREE-0098f7.svg" alt="Version"></a>
   <a href="https://packagist.org/packages/vuefront/module-vuefront"><img src="https://poser.pugx.org/vuefront/module-vuefront/v/stable" /></a>
  <a href="https://discord.gg/C9vcTCQ"><img src="https://img.shields.io/badge/chat-on%20discord-7289da.svg" alt="Chat"></a>
</p>

<p align="center">
Show your :heart: - give us a :star: <br/> 
Help us grow this project to be the best it can be!
  </p>

__VueFront__ is a <a href="//vuejs.org">VueJS powered</a> CMS agnostic SPA & PWA frontend for your old-fashioned Blog and E-commerce site. 

__Magento__ empowers thousands of retailers and brands with the best eCommerce platforms and flexible cloud solutions to rapidly innovate and grow.

__CMS Connect App__ - adds the connection between the Magento CMS and VueFront Web App via a GraphQL API.
  
# What does it do?
This is a Magento module that connects the Magento CMS with the VueFront Web App via a GraphQL API. When installed, you will be provided with a CMS Connect URL that you will add to your VueFront Web App during [setup](https://vuefront.com/guide/setup.html).
  
## Demo

[VueFront on Magento](https://magento.vuefront.com/)

![Magento VueFront CMS Connect App](http://joxi.net/LmGewYZiw5VeDA.jpg)

### Magento Blog (Megafan Blog Module)
Since Magento does not have a built-in Blog, we use [Megafan Blog Module](https://marketplace.magento.com/magefan-module-blog.html) to add blog support automatically. If the Megafan Blog Module is not avalible, VueFront will ignore it.


## How to install?
Php version required >= 5.5, <= 7.2 (this limitation will be removed in the future)

### 1. Quick Install via composer (recommended)

We recommend you to install VueFront module via composer. It is easy to install, update and maintaince.

Run the following command in Magento 2 root folder.

#### 1.1 Install

```
composer require vuefront/module-vuefront
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

#### 1.2 Upgrade

```
composer update vuefront/module-vuefront
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

Run compile if your store in Product mode:

```
php bin/magento setup:di:compile
```

### 2. Install vie copy/paste

If you don't want to install via composer, you can use this way. 

- Download [the latest version here](https://github.com/vuefront/magento/archive/master.zip) 
- Extract `master.zip` file to `app/code/Vuefront/Vuefront` ; You should create a folder path `app/code/Vuefront/Vuefront` if not exist.
- Go to Magento root folder and run upgrade command line to install `Vuefront`:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Deploy VueFront Web App to Apache hosting (static website)
### via VueFront Deploy service (recommended)
1. Install the VueFront CMS Connect App from this repo.
2. Log in or register an account with VueFront.com
3. Build your first Web App
4. Activate the new Frontend Web App (only avalible for Apache servers)
 

### via ftp manually
1. Install the VueFront CMS Connect App from this repo.
2. Log in or register an account with VueFront.com
3. Copy the CMS Connect URL 
4. Via Ftp create a new folder `vuefront` in the root of your OpenCart site on your hosting. 
5. Via command line build your VueFront Web App ([read more](https://vuefront.com/guide/setup.html)) 
```
yarn create vuefront-app
# When promote, provide the CMS Connect URL, which you coppied at step 3.
yarn generate
```
6. Copy all files from folder `dist` to the newly created `vuefront` folder
7. modify you `.htaccess` file by adding after `#RewriteBase /magento/` rule the following rules:
```htaccess
# VueFront scripts, styles and images
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
RewriteCond %{REQUEST_URI} !.*(image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/)
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/index.html -f
RewriteRule ^$ vuefront/index.html [L]
RewriteCond %{REQUEST_URI} !.*(image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/)
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/index.html !-f
RewriteRule ^$ vuefront/200.html [L]
# VueFront page if exists html file
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*(image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/)
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/$1.html -f
RewriteRule ^([^?]*) vuefront/$1.html [L,QSA]
# VueFront page if not exists html file
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !.*(image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/)
RewriteCond %{QUERY_STRING} !.*(rest_route)
RewriteCond %{DOCUMENT_ROOT}".$document_path."vuefront/$1.html !-f
RewriteRule ^([^?]*) vuefront/200.html [L,QSA]
```

## Deploy VueFront Web App to Nginx hosting (static website)
Same as for apache only you are required to add the server configurations yourself:

### via VueFront Deploy service (recommended)
1. Install the VueFront CMS Connect App from this repo.
2. Log in or register an account with VueFront.com
3. Build your first Web App
4. Now you need to add this code to your `nginx.config` file right after the `index` directive
 ```
location ~ ^((?!image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/).)*$ {
    try_files /vuefront/$uri /vuefront/$uri "/vuefront${uri}index.html" /vuefront$uri.html /vuefront/200.html;
}
 ```
 
### via ftp manually
1. Install the VueFront CMS Connect App from this repo.
2. Log in or register an account with VueFront.com
3. Copy the CMS Connect URL 
4. Via Ftp create a new folder `ROOT/pub/vuefront` of your Magento site on your hosting. 
5. Via the command line build your VueFront Web App ([read more](https://vuefront.com/guide/setup.html)) 
```
yarn create vuefront-app
# When promote, provide the CMS Connect URL, which you coppied at step 3.
yarn generate
```
6. Now you need to add this code to your `nginx.config` file right after the `index` directive
 ```
location ~ ^((?!image|.php|admin|catalog|\/img\/.*\/|wp-json|wp-admin|wp-content|checkout|rest|static|order|themes\/|modules\/|js\/|\/vuefront\/).)*$ {
    try_files /vuefront/$uri /vuefront/$uri "/vuefront${uri}index.html" /vuefront$uri.html /vuefront/200.html;
}
 ```
 
## Support
For support please contact us at [Discord](https://discord.gg/C9vcTCQ)

## Submit an issue
For submiting an issue, please create one in the [issues tab](https://github.com/vuefront/vuefront/issues). Remember to provide a detailed explanation of your case and a way to reproduce it. 

Enjoy!
