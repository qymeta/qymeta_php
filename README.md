# qychan_go_sdk


清元多链qymeta_php是针对国内多家联盟链提供的一套完整的web3、数字藏品等解决方案的php sdk版。开发者无需深入了解各联盟链的相关技术知识，可通过qymeta_php 快速搭建自己的web3、数字藏品应用。

* 清元多链 [官网](http://openqkl.newmin.cn/)

* 清元链 NFT SDK [文档](https://github.com/qymeta/qymeta_php/blob/main/doc/qymeta_php.md)


### Installation
```
composer require qymeta/qymeta_php
```



### qymeta_php Start

```
use Qymeta\Qymeta;

$resources = Qymeta::createAccountAddress($appid,$secret);
var_dump($resources);
```

### Change Logs

#### 1.0.2 2022/11/09

* 清元链 NFT 相关接口发布

