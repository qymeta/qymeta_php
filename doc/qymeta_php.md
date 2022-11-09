## 清元链 NFT

### 创建链账户

接口: CreateAccountAddress

描述: 创建用户链账户；

**输入参数**

名称 | 类型 | 必须 | 说明
---|:---:|:---:|---
appid | str | Y | appid
secret | str | Y | 秘钥
name | str | Y | 用户姓名
idc | str | Y | 用户身份证号
mobile | str | Y | 用户手机号

**输出参数**

名称 | 类型 | 说明
---|:---:|---
code | int | 返回码
msg | str | 返回说明
data |  |
-- address | str | 链账户地址

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'address': '0x75b136cb0ab31bd3b34a194c083ef5a510c285d0'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::CreateAccountAddress($appid,$secret)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'address': '0x75b136cb0ab31bd3b34a194c083ef5a510c285d0'}}
```



### 创建NFT资源

接口: CreateNft

描述: 创建NFT资源；

**输入参数**

| 名称        | 类型 | 必须 | 说明            |
| ----------- | :--: | :--: | --------------- |
| appid       | str  |  Y   | appid           |
| secret      | str  |  Y   | 秘钥            |
| title       | str  |  Y   | NFT资源名称     |
| address     | str  |  Y   | NFT拥有者链账户 |
| author      | str  |  Y   | 作者            |
| url         | str  |  Y   | NFT资源地址     |
| series_id   | str  |  N   | 系列ID          |
| series_name | str  |  N   | 系列名称        |

**输出参数**

| 名称             | 类型 | 说明        |
| ---------------- | :--: | ----------- |
| code             | int  | 返回码      |
| msg              | str  | 返回说明    |
| data             |      |             |
| -- Payload       | str  |             |
| -- TokenId       | str  | TOKEN ID    |
| -- ResouceUrl    | str  | NFT资源地址 |
| -- TransactionID | str  | 交易ID      |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'Payload': '', 
		'TokenId': '5cfe2dfc4ef914985e60ac2c7723e67875c0eeda56232ebd6e8858350e0b4b52', 
		'TransactionID': 'ae86ae491cad24dfbc21fa5cbb2877b24a15b6a2dd3bba9f44f400fe3775e0fe', 
		'ResouceUrl': 'http://openqkl.newmin.cn/resouce/hxSFmLMR9zDsFRNIICffDiIOSTPwBK'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::CreateNft($appid,$secret,$author,$title,$series_name,$series_id,$url,$address,$note='')
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Payload': '', 'TokenId': '5cfe2dfc4ef914985e60ac2c7723e67875c0eeda56232ebd6e8858350e0b4b52', 'TransactionID': 'ae86ae491cad24dfbc21fa5cbb2877b24a15b6a2dd3bba9f44f400fe3775e0fe', 'ResouceUrl': 'http://openqkl.newmin.cn/resouce/hxSFmLMR9zDsFRNIICffDiIOSTPwBK'}}
```



### 铸造NFT

接口: Save

描述: 将NFT资源上链进行铸造NFT；

**输入参数**

| 名称        | 类型 | 必须 | 说明                                 |
| ----------- | :--: | :--: | ------------------------------------ |
| appid       | str  |  Y   | appid                                |
| secret      | str  |  Y   | 秘钥                                 |
| asource_url | str  |  Y   | NFT资源地址  通过创建NFT资源接口获取 |
| order_sn    | str  |  Y   | 订单号                               |

**输出参数**

| 名称             | 类型 | 说明     |
| ---------------- | :--: | -------- |
| code             | int  | 返回码   |
| msg              | str  | 返回说明 |
| data             |      |          |
| -- Hash          | str  | 交易哈希 |
| -- TransactionID | str  | 交易ID   |
| -- tokenId       | str  | TOKEN ID |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'Payload': '', 
		'TransactionID': 'e2a94bcb9c97492ebaab27135186556cb13ef9458e400570bd166ca35cc8510d', 
		'tokenId': '11a4f81dc2eb44dda24f94f2492c62729b5a2a02f5eebb4e21a150e282ded21e'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta:: Save($appid,$secret,$source_url,$order_sn)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Payload': '', 'TokenId': 'e34577bf7aaa3d41cbd4d35717cb3f9db92a1eb13b0d8295a18c90b9d1ba0848', 'TransactionID': '0ffdeb3d1a8962144d1ad6f970aae34bf7a9a0f0d1b60e06de02de407e733d6d'}}


```



### NFT转移

接口: TransFrom

描述: 将NFT资源上链进行铸造NFT；

**输入参数**

| 名称         | 类型 | 必须 | 说明                |
| ------------ | :--: | :--: | ------------------- |
| appid        | str  |  Y   | appid               |
| secret       | str  |  Y   | 秘钥                |
| address_from | str  |  Y   | NFT归属者链账户地址 |
| address_to   | str  |  Y   | NFT接收方链账户地址 |
| token_id     | str  |  Y   | Token ID            |

**输出参数**

| 名称             | 类型 | 说明     |
| ---------------- | :--: | -------- |
| code             | int  | 返回码   |
| msg              | str  | 返回说明 |
| data             |      |          |
| -- TransactionID | str  | 交易ID   |
| -- Payload       | str  |          |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'Payload': '', 
		'TransactionID': 'f5a700c184d94ddbbf07d3842c7ae424cd22c6c3697581cdc7fbfbdb34e35839'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::TransFrom($appid,$secret,$address_from,$address_to,$token_id)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Payload': '', 'TransactionID': 'f5a700c184d94ddbbf07d3842c7ae424cd22c6c3697581cdc7fbfbdb34e35839'}}
```



### NFT销毁

接口: Destruction

描述: 将链上NFT销毁；

**输入参数**

| 名称         | 类型 | 必须 | 说明                |
| ------------ | :--: | :--: | ------------------- |
| appid        | str  |  Y   | appid               |
| secret       | str  |  Y   | 秘钥                |
| address_from | str  |  Y   | NFT归属者链账户地址 |
| token_id     | str  |  Y   | Token ID            |

**输出参数**

| 名称             | 类型 | 说明     |
| ---------------- | :--: | -------- |
| code             | int  | 返回码   |
| msg              | str  | 返回说明 |
| data             |      |          |
| -- TransactionID | str  | 交易ID   |
| -- Payload       | str  |          |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'Payload': '', 
		'TransactionID': 'f5a700c184d94ddbbf07d3842c7ae424cd22c6c3697581cdc7fbfbdb34e35839'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::Destruction($appid,$secret,$address_from,$token_id)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Payload': '', 'TransactionID': 'f5a700c184d94ddbbf07d3842c7ae424cd22c6c3697581cdc7fbfbdb34e35839'}}
```



### 查询某账户拥有的NFT

接口: GetBalanceof

描述: 查询某账户下拥有的NFT信息；

**输入参数**

| 名称    | 类型 | 必须 | 说明       |
| ------- | :--: | :--: | ---------- |
| appid   | str  |  Y   | appid      |
| secret  | str  |  Y   | 秘钥       |
| address | str  |  Y   | 链账户地址 |

**输出参数**

| 名称     | 类型  | 说明                               |
| -------- | :---: | ---------------------------------- |
| code     |  int  | 返回码                             |
| msg      |  str  | 返回说明                           |
| data     |       |                                    |
| -- Count |  int  | 拥有NFT总数                        |
| -- List  | array | 拥有NFT列表｛TOKENID:NFT资源地址｝ |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'count': 0, 
	'data': {
		'Count': 1, 
		'List': {'11a4f81dc2eb44dda24f94f2492c62729b5a2a02f5eebb4e21a150e282ded21e': 'http://openqkl.newmin.cn/resouce/1Ivid5vTCkGwG0RbwYbLITOFQrZXl4?tokenId=11a4f81dc2eb44dda24f94f2492c62729b5a2a02f5eebb4e21a150e282ded21e'
		}, 
		'TransactionID': '09e52b2bd84d121d57964a205a0c1a22d8ac64ebeba6ffd805ff03cd75e8f01a'
	}
}
```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::GetBalanceof($appid,$secret,$address)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Count': 1, 'List': {'11a4f81dc2eb44dda24f94f2492c62729b5a2a02f5eebb4e21a150e282ded21e': 'http://openqkl.newmin.cn/resouce/1Ivid5vTCkGwG0RbwYbLITOFQrZXl4?tokenId=11a4f81dc2eb44dda24f94f2492c62729b5a2a02f5eebb4e21a150e282ded21e'}, 'TransactionID': '09e52b2bd84d121d57964a205a0c1a22d8ac64ebeba6ffd805ff03cd75e8f01a'}}

```



### 查询NFT上链存证信息

接口: Query

描述: 查询交易哈希获取上链的存证信息；

**输入参数**

| 名称   | 类型 | 必须 | 说明     |
| ------ | :--: | :--: | -------- |
| appid  | str  |  Y   | appid    |
| secret | str  |  Y   | 秘钥     |
| hash   | str  |  Y   | 交易哈希 |

**输出参数**

| 名称             | 类型 | 说明        |
| ---------------- | :--: | ----------- |
| code             | int  | 返回码      |
| msg              | str  | 返回说明    |
| data             |      |             |
| -- Info          | dict | NFT存证信息 |
| -- TransactionID | str  | 交易ID      |

**返回示例**

```
{
	'code': 200, 
	'msg': 'success', 
	'data': {
		'Info': {
			'author': '李四', 
			'title': '测试nft', 
			'series_name': None, 
			'series_id': None, 
			'url': 'https://pics6.baidu.com/feed/f31fbe096b63f624f3a2472ac3cecbf31b4ca3b5.jpeg@f_auto?token=59521ff095f3494fc1207eeba354f130'
		}, 
		'TransactionID': 'd3d72e0a36a1c6dadd50af1e8495faacd14bbce55db9f570d711088ddb7f8257'}
	}

```

**接口示例**

```
use Qymeta\Qymeta;

$resources = Qymeta::Query($appid,$secret,$hash)
var_dump($resources);

>> {'code': 200, 'msg': 'success', 'data': {'Info': {'author': '李四', 'title': '测试nft', 'series_name': None, 'series_id': None, 'url': 'https://pics6.baidu.com/feed/f31fbe096b63f624f3a2472ac3cecbf31b4ca3b5.jpeg@f_auto?token=59521ff095f3494fc1207eeba354f130'}, 'TransactionID': 'd3d72e0a36a1c6dadd50af1e8495faacd14bbce55db9f570d711088ddb7f8257'}}
```

