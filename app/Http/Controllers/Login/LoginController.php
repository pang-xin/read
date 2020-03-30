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
                session(['tel'=>$tel]);
                return redirect('read/index');
            }else{
                echo '登陆失败';
            }
        }
    }

    public function wechat_do(Request $request)
    {
        $openid = $request->input('openid');
        $tel = $request->input('tel');
        $telinfo = User::where(['tel'=>$tel])->first()->toArray();
        if(!empty($telinfo)){
            $data = User::where(['tel'=>$tel])->update([
                'openid'=>$openid,
            ]);
            if($data){
                echo '绑定成功';
            }else{
                echo '绑定成功';
            }
        }



    }

    public function reg()
    {
        return view('login.reg');
    }

    public function reg_do(Request $request)
    {
        $tel = $request->input('tel');
        $pwd = $request->input('pwd');
        $code = $request->input('code');
        $code1 = session('code');
        if(empty($code)){
            echo '验证码不能为空';die;
        }
        if($code != $code1){
            echo '验证码不正确';die;
        }
        if($tel == ''){
            echo '手机号不能为空';die;
        }
        if($pwd == ''){
            echo '密码不能为空';die;
        }

        $data = User::create([
            'tel'=>$tel,
            'pwd'=>$pwd
        ]);

        if($data){
            return redirect('read/login');
        }else{
            echo '注册失败';
        }
    }

}
