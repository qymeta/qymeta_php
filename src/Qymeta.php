<?php

namespace Qymeta;

class Qymeta{
    /**
     * 创建用户账户
     * @param $appid
     * @param $secrect
     * @return bool|string
     */
    public static function CreateAccountAddress($appid,$secret){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('createAccountAddress',$data);
    }

    /**
     * 创建一个nft
     * @param $appid
     * @param $secret
     * @param $author
     * @param $title
     * @param $series_name
     * @param $series_id
     * @param $url
     * @param $address
     * @param $note
     * @return bool|string\
     */
    public static function CreateNft($appid,$secret,$author,$title,$series_name,$series_id,$url,$address,$note=''){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['author'] = $author;
        $data['title'] = $title;
        $data['series_name'] = $series_name;
        $data['series_id'] = $series_id;
        $data['url'] = $url;
        $data['address'] = $address;
        $data['note'] = $note;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('createNft',$data);
    }

    /**
     * 授权上链
     * @param $appid
     * @param $secret
     * @param $source_url
     * @param $order_sn
     * @return bool|string
     */
    public static function Save($appid,$secret,$source_url,$order_sn){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['source_url'] = $source_url;
        $data['order_sn'] = $order_sn;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('save',$data);
    }


    /**
     * 获取nft实际持有人
     * @param $appid
     * @param $secret
     * @param $token_id
     * @return bool|string
     */
    public static function GetOwnerof($appid,$secret,$token_id){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['token_id'] = $token_id;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('getOwnerof',$data);
    }

    /**获取nft的url
     * @param $appid
     * @param $secret
     * @param $token_id
     * @return bool|string
     */
    public static function GetTokenUrl($appid,$secret,$token_id){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['token_id'] = $token_id;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('getTokenUrl',$data);
    }


    /**
     * 查询某个账户拥有的nft个数
     * @param $appid
     * @param $secret
     * @param $address
     * @return bool|string
     */
    public static function GetBalanceof($appid,$secret,$address){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['address'] = $address;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('getBalanceof',$data);
    }

    /**
     * 查询哈希存证，获取上链的存证信息
     * @param $appid
     * @param $secret
     * @param $hash
     * @return bool|string
     */
    public static function Query($appid,$secret,$hash){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['hash'] = $hash;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('query',$data);
    }


    /**
     * 转移nft到另一个账户
     * @param $appid
     * @param $secret
     * @param $address_from
     * @param $address_to
     * @param $token_id
     * @return bool|string
     */
    public static function TransFrom($appid,$secret,$address_from,$address_to,$token_id){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['address_from'] = $address_from;
        $data['address_to'] = $address_to;
        $data['token_id'] = $token_id;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('transFrom',$data);
    }


    /**
     * 获取某种类型的nft的基本信息

     * @param $appid
     * @param $secret
     * @return bool|string
     */
    public static function GetTokenBasic($appid,$secret){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('getTokenBasic',$data);
    }

    /**
     * 获取某种类型的nft的名称
     * @param $appid
     * @param $secret
     * @return bool|string
     */
    public static function GetName($appid,$secret){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('getName',$data);
    }


    /**
     * 销毁nft
     * @param $appid
     * @param $secret
     * @param $address_from
     * @param $token_id
     * @return bool|string
     */
    public static function Destruction($appid,$secret,$address_from,$token_id){
        $data['appid'] = $appid;
        $data['secret'] = $secret;
        $data['address_from'] = $address_from;
        $data['token_id'] = $token_id;
        $data['timestamp'] = (string)time();
        $data['sign'] = self::Sigin($data);
        return self::Post('destruction',$data);
    }





    /**
     * @param array $data
     * @return string
     * 数据签名
     */
    private static function Sigin(array $data) {
      ksort($data);
      return md5(md5(json_encode($data,JSON_UNESCAPED_SLASHES).$data['secret']));;
    }

    /**
     * @param $url
     * @param $post_data
     * @param $timeout
     * @return bool|string
     * 发送请求
     */
   private static function Post($url, $post_data = '', $timeout = 30){
       $url = "http://qymeta_api.newmin.cn/api/".$url;
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
       curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
       curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       //curl_setopt($ch, CURLOPT_HTTPHEADER, false);
       $result = curl_exec($ch);
       curl_close($ch);
       return $result;
    }
}