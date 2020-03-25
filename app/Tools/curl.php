<?php

namespace App\Tools;

class curl
{
    public static function get($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);  //请求地址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据格式
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        $result = curl_exec($ch);
        //关闭（释放）  curl_close
        curl_close($ch);
        return $result;
    }
    public static function post($url, $postData)
    {
        //初始化： curl_init
        $ch = curl_init();
        //设置	curl_setopt
        curl_setopt($ch, CURLOPT_URL, $url);  //请求地址
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //返回数据格式
        curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        //访问https网站 关闭ssl验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        //执行  curl_exec
        $result = curl_exec($ch);
        //关闭（释放）  curl_close
        curl_close($ch);
        return $result;
    }
}
