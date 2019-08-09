<p align="center">
  <br>
  <a href="https://vuefront.com">
    <img src="https://vuefront.com/logo.png" width="120"/>
  </a>
</p>
<h1 align="center">VueFront [![Latest Stable Version](https://poser.pugx.org/vuefront/module-vuefront/v/stable)](https://packagist.org/packages/vuefront/module-vuefront)</h1>
<h3 align="center">CMS Connect App for Magento
</h3>

VueFront is a <a href="//vuejs.org">Vue-powered</a> agnostic frontend web app for your old fashioned Blog and Ecommerce site. 

Magento empowers thousands of retailers and brands with the best eCommerce platforms and flexible cloud solutions to rapidly innovate and grow.

CMS Connect App - adds the connection between the Magento CMS and VueFront WebApp via a GraphQL API.


## How to install & upgrade VueFront

### 1. Install via composer (recommend)

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

### 2. Copy and paste

If you don't want to install via composer, you can use this way. 

- Download [the latest version here](https://github.com/vuefront/vuefront/archive/master.zip) 
- Extract `master.zip` file to `app/code/Vuefront/Vuefront` ; You should create a folder path `app/code/Vuefront/Vuefront` if not exist.
- Go to Magento root folder and run upgrade command line to install `Vuefront`:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```
