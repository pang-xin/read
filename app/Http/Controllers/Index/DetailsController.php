<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;

class DetailsController extends Controller
{
    public function details($book_id)
    {
        $bookname = Book::where(['book_id'=>$book_id])->first();
        return view('search.book',['bookname'=>$bookname]);
    }
}
