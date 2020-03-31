<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;


class adminController extends Controller
{
    public function admin()
    {
        return view('admin/admin');
    }

    public function review()
    {
        $review = Book::join('details','book.book_id','=','details.book_id')->where(['book.status'=>1])->get();
        return view('admin.review',['review'=>$review]);
    }
}
