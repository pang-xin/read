<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Writer;

class IndexController extends Controller
{
    public function index()
    {
        $admin_name = session('admin');
        if(empty($admin_name)){
            return redirect('admin/login');
        }else{
            return view('admin.index');
        }
    }

    public function review()
    {
        $writer = Writer::where(['status'=>1])->get()->toArray();
        if(empty($writer)){
            echo '当前没有作者可审核';die;
        }else{
            return view('admin.author',['writer'=>$writer]);
        }
    }

    public function review_by($writer_id)
    {
        $res = Writer::where(['writer_id'=>$writer_id])->update(['status'=>2]);
        if($res){
            echo '作者审核通过成功';
        }
    }

    public function review_no($writer_id)
    {
        $res = Writer::where(['writer_id'=>$writer_id])->delete();
        if($res){
            echo '作者审核未通过';
        }
    }


}
