<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\Qrcode;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Cate;

class CateController extends Controller
{
    public function cate()
    {
        $cate_id = $_GET['cate_id'];
        $cateinfo = Book::join('cate','cate.cate_id','=','book.cate_id')->where(['book.cate_id'=>$cate_id])->orderBy('book_search','desc')->take(3)->get()->toArray();
        $catename = Cate::where(['cate_id'=>$cate_id])->first()->toArray();
        return view('read.cate',['cateinfo'=>$cateinfo,'catename'=>$catename]);
    }
}
