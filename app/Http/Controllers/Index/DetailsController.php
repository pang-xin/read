<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Month;

class DetailsController extends Controller
{
    public function details($book_id)
    {
        $bookname = Book::join('details','book.book_id','=','details.book_id')->where(['book.book_id'=>$book_id])->first();
        $tel = session('tel');
        return view('search.book',['bookname'=>$bookname,'tel'=>$tel]);
    }

    public function ticket(Request $request)
    {
        $book_id = $request->input('book_id');
        $info = Month::where(['book_id'=>$book_id])->first();
        if(empty($info)){
            $res = Month::where(['book_id'=>$book_id])->update(['month_ticket'=>1]);
        }else{
            $num = $info->month_ticket+1;
            $res = Month::where(['book_id'=>$book_id])->update(['month_ticket'=>$num]);
        }

        return $res;
    }
}
