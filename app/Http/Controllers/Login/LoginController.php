<?php
namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function login_do(Request $request)
    {
        $tel = $request->input('tel');
        $pwd = $request->input('pwd');

        $info = User::where(['tel'=>$tel])->first()->toArray();
        if(!empty($info)){
            if($pwd == $info['pwd']){
                echo '登陆成功';
            }else{
                echo '登陆失败';
            }
        }
    }

    public function wechat_do(Request $request)
    {
        $openid = $request->input('openid');
        $tel = $request->input('tel');
        $pwd = $request->input('pwd');
        $data = User::where(['openid'=>$openid])->update([
            'tel'=>$tel,
            'pwd'=>$pwd
        ]);
        if($data){
            echo '绑定成功';
        }else{
            echo '绑定成功';
        }
    }
}
