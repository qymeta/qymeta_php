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
/**
* 创建NFT资源
* $appid 平台appid
* $secret 平台秘钥
* $author 作者
* $title NFT资源名称
* $series_name 系列名称
* $series_id 系列ID
* $url NFT资源地址
* $address NFT拥有者链账户
*/
$resources = Qymeta::CreateNft($appid,$secret,$author,$title,$series_name,$series_id,$url,$address,$note='')
var_dump($resources);
```

### Change Logs

#### 1.0.2 2022/11/11

* 清元链 NFT 相关接口发布

