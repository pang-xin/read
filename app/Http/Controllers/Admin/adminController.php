<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Month;

class adminController extends Controller
{
    public function admin()
    {
        return view('admin/admin');
    }

    public function review()
    {
        $review = Book::join('details','book.book_id','=','details.book_id')->where(['book.status'=>1])->get()->toArray();
        if(empty($review)){
            echo '目前没有审核的作品';die;
        }else{
            return view('admin.review',['review'=>$review]);
        }
    }

    public function review_by($book_id)
    {
        $res = Book::where(['book_id'=>$book_id])->update(['status'=>2]);
        if($res){
            return redirect('admin/index');
        }
    }

    public function review_no($book_id)
    {
        $res = Book::where(['book_id'=>$book_id])->delete();
        $res1 = Month::where(['book_id'=>$book_id])->delete();
        if($res1){
            return redirect('admin/index');
        }
    }
}
