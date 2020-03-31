<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function login_do(Request $request)
    {
        $data = $request->all();
        $admin_pwd = md5($data['admin_pwd']);

        $info = Admin::where(['admin_name'=>$data['admin_name']])->first();
        if(!empty($info)){
            if($admin_pwd == $info->admin_pwd){
                session(['admin'=>$info->admin_name]);
                return redirect('admin/index');
            }else{
                echo '密码错误';
            }
        }else{
            echo '用户不存在';
        }
    }

    public function reg()
    {
        return view('admin.reg');
    }

    public function reg_do(Request $request)
    {
        $data = $request->all();
        $admin_pwd = md5($data['admin_pwd']);
        if(empty($data['admin_name'])){
            echo '管理员名称不能为空';die;
        }
        if(empty($data['admin_pwd'])){
            echo '密码不能为空';die;
        }
        $res = Admin::create([
            'admin_name'=>$data['admin_name'],
            'admin_pwd'=>$admin_pwd
        ]);
        if($res){
            return redirect('admin/login');
        }
    }
}
