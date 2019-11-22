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


## Support
For support please contact us at [Discord](https://discord.gg/C9vcTCQ)

## Submit an issue
For submiting an issue, please create one in the [issues tab](https://github.com/vuefront/vuefront/issues). Remember to provide a detailed explanation of your case and a way to reproduce it. 

Enjoy!
