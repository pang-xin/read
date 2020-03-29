<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Details;

class DetailsController extends Controller
{
    public function details($book_id)
    {
        $bookname = Book::join('details','book.book_id','=','details.book_id')->where(['book.book_id'=>$book_id])->first();
        return view('search.book',['bookname'=>$bookname]);
    }
}
