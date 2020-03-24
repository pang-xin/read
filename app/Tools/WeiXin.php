<?php
namespace App\Tools;

Class WeiXin{
    const appId="wx08a66c2af5b43034";
    const appsecret="ebc558b571f067751dc7b4480b3377a4";
    public static function responseText($msg,$postObj){
        //响应微信消息
        echo "<xml>
                <ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
                <FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
                <CreateTime>".time()."</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[".$msg."]]></Content>
              </xml>";die;
    }

    public static function access_token(){
        $access_token=\Redis::get('access_token');
        if(empty($access_token)){
            $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".Self::appId."&secret=".Self::appsecret."";
            $res=file_get_contents($url);
            $res=json_decode($res,true);
            $access_token=$res['access_token'];
        }
        return $access_token;
    }

    public static function getImg($postObj,$media_id){
        echo "<xml>
                <ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
                <FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
                <CreateTime>".time()."</CreateTime>
                <MsgType><![CDATA[image]]></MsgType>
                <Image>
                  <MediaId><![CDATA[".$media_id."]]></MediaId>
                </Image>
              </xml>";
    }

    public static function getvoice($postObj,$media_id){
        echo "<xml>
                <ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
                <FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
                <CreateTime>".time()."</CreateTime>
                <MsgType><![CDATA[voice]]></MsgType>
                <Voice>
                  <MediaId><![CDATA[".$media_id."]]></MediaId>
                </Voice>
              </xml>";
    }

    public static function getvideo($postObj,$media_id){
        echo "<xml>
                <ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
                <FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
                <CreateTime>".time()."</CreateTime>
                <MsgType><![CDATA[video]]></MsgType>
                <Video>
                  <MediaId><![CDATA[".$media_id."]]></MediaId>
                </Video>
              </xml>";
    }

    //用户信息
    public static function getUserInfo($openid){
        $access_token=Self::access_token();
        $url="https://api.weixin.qq.com/cgi-bin/user/info?access_token={$access_token}&openid={$openid}&lang=zh_CN";
        $res=file_get_contents($url);
        $postData=curl::post($url,$res);
        $res=json_decode($postData,true);
        return $res;

    }

    //图片
    public static function getFile($store_result,$media_format){
        $access_token=Self::access_token();
        $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token={$access_token}&type={$media_format}";
        $img="/data/wwwroot/default/1904a/public/".$store_result;
        $postData['media']=new \CURLFile($img);
        $res=curl::post($url,$postData);
        $res=json_decode($res,true);
        return $res;
    }

    public static function getOpenid(){
        //先去session里取openid
        $openid = session('openid');
        //var_dump($openid);die;
        if(!empty($openid)){
            return $openid;
        }
        //微信授权成功后 跳转咱们配置的地址 （回调地址）带一个code参数
        $code = request()->input('code');
        if(empty($code)){
            //没有授权 跳转到微信服务器进行授权
            $host = $_SERVER['HTTP_HOST'];  //域名
            $uri = $_SERVER['REQUEST_URI']; //路由参数
            $redirect_uri = urlencode("http://".$host.$uri);  // ?code=xx
            $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".self::appId."&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";
            header("location:".$url);die;
        }else{
            //通过code换取网页授权access_token
            $url =  "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".self::appId."&secret=".self::appsecret."&code={$code}&grant_type=authorization_code";
            $data = file_get_contents($url);
            $data = json_decode($data,true);
            $openid = $data['openid'];
            //获取到openid之后  存储到session当中
            session(['openid'=>$openid]);
            return $openid;
            //如果是非静默授权 再通过openid  access_token获取用户信息
        }
    }

    /**
     * 网页授权获取用户基本信息
     * @return [type] [description]
     */
    public static function getOpenidByUserInfo()
    {
        //先去session里取openid
        $userInfo = session('userInfo');
        //var_dump($openid);die;
        if(!empty($userInfo)){
            return $userInfo;
        }
        //微信授权成功后 跳转咱们配置的地址 （回调地址）带一个code参数
        $code = request()->input('code');
        if(empty($code)){
            //没有授权 跳转到微信服务器进行授权
            $host = $_SERVER['HTTP_HOST'];  //域名
            $uri = $_SERVER['REQUEST_URI']; //路由参数
            $redirect_uri = urlencode("http://".$host.$uri);  // ?code=xx
            $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".self::appId."&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect";
            header("location:".$url);die;
        }else{
            //通过code换取网页授权access_token
            $url =  "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".self::appId."&secret=".self::appsecret."&code={$code}&grant_type=authorization_code";
            $data = file_get_contents($url);
            $data = json_decode($data,true);
            $openid = $data['openid'];
            $access_token = $data['access_token'];
            //获取到openid之后  存储到session当中
            //session(['openid'=>$openid]);
            //return $openid;
            //如果是非静默授权 再通过openid  access_token获取用户信息
            $url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$openid}&lang=zh_CN";
            $userInfo = file_get_contents($url);
            $userInfo = json_decode($userInfo,true);
            //返回用户信息
            session(['userInfo'=>$userInfo]);
            return $userInfo;
        }
    }
}
