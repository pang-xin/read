<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Qrcode;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Book;

include '../app/Tools/phpqrcode.php';

class IndexController extends Controller
{
    public function token()
    {
        echo $_GET['echostr'];
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        if(empty($search)){
            $bookinfo = Book::orderBy('book_search','desc')->get()->take(5);
            return view('read/index',['bookinfo'=>$bookinfo]);
        }else{
            $bookname = Book::where(['book_name'=>$search])->first();
            if(empty($bookname)){
                $info = Book::where('author','like','%'.$search.'%')->get()->toArray();
                if(empty($info)){
                    echo '您搜索的内容不存在';die;
                }
                return view('search.author',['info'=>$info,'author'=>$search]);
            }else{
                if(empty($bookname->book_search)){
                    Book::where(['book_name'=>$search])->update(['book_search'=>1]);
                }else{
                    $num = $bookname->book_search + 1;
                    Book::where(['book_name'=>$search])->update(['book_search'=>$num]);
                }
                return view('search.book',['bookname'=>$bookname]);
            }
        }


    }

    //生成二维码
    public function code()
    {
        $uid = uniqid();
        echo $uid;die;
        $url = "http://1905read.lijiaxin.xyz/read/wechat?uid=".$uid;
        $OR = new \QRcode();

        $data = $OR::png($url,'../public/1.png');

    }

    //调用微信接口
    public function Wechat()
    {
        $uid = $_GET['uid'];
        $appid = 'wx7fea5071961b3a2d';
        $uri = urlencode("http://1905read.lijiaxin.xyz/read/wechatlogin");
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$uri.'&response_type=code&scope=snsapi_userinfo&state='.$uid.'#wechat_redirect';
        header("location:$url");
    }


    //微信验证登录
    public function wechatlogin()
    {
        $code = $_GET['code'];
        $appid = 'wx7fea5071961b3a2d';
        $secret = "ce5e052573fbe11b8c6166a8c922420f";
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $res = file_get_contents($url);

        $token = json_decode($res,true)['access_token'];
        $openid = json_decode($res,true)['openid'];

        $userurl = "https://api.weixin.qq.com/sns/userinfo?access_token=$token&openid=$openid&lang=zh_CN";
        $userinfo = file_get_contents($userurl);

        $user = json_decode($userinfo,true);

        if(empty($user)){
            echo '登陆失败';
        }else{
            $openidinfo = User::where(['openid'=>$openid])->first();
            if(empty($openidinfo)){
                User::create([
                    'openid'=>$openid
                ]);
            }
            if($openidinfo['tel'] == ''){
                return view('login/wechat',['openid'=>$openid]);
            }else{
                echo '登陆成功';
            }
        }
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $bookname = Book::where(['book_name'=>$search])->first();
        if(empty($bookname)){
            $info = Book::where(['author'=>$search])->get();
            echo 1;
            return view('search.author',['info'=>$info]);
        }else{
            if(empty($bookname->book_search)){
                Book::where(['book_name'=>$search])->update(['book_search'=>1]);
            }else{
                $num = $bookname->book_search + 1;
                Book::where(['book_name'=>$search])->update(['book_search'=>$num]);
            }
            echo 2;
            return view('search.book',['bookname'=>$bookname]);
        }
    }
}
