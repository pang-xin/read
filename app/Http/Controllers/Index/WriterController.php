<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Writer;
use App\Model\Cate;
use App\Model\Book;
use App\Model\Details;

class WriterController extends Controller
{
    public function writer_area()
    {
        $pen_name = session('pen_name');
        return view('read.writer_area',['pen_name'=>$pen_name]);
    }

    public function writer()
    {
        return view('read/writer');
    }

    public function writer_do(Request $request)
    {
        $data = $request->all();
        $pwd = md5($data['pwd']);
        if(empty($data['pen_name'])){
            echo '笔名不能为空';die;
        }
        if(empty($data['identity'])){
            echo '身份证不能为空';die;
        }
        if(empty($data['pwd'])){
            echo '密码不能为空';die;
        }
        $res = Writer::create([
            'pen_name'=>$data['pen_name'],
            'identity'=>$data['identity'],
            'pwd'=>$pwd
        ]);
        dd($res);
    }

    public function login_writer()
    {
        return view('read.login_writer');
    }

    public function login_writer_do(Request $request)
    {
        $data = $request->all();
        $pwd = md5($data['pwd']);

        $info = Writer::where(['pen_name'=>$data['pen_name']])->first();
        if(!empty($info)){
            if($pwd != $info['pwd']){
                echo '密码有误';die;
            }else{
                session(['pen_name'=>$data['pen_name']]);
                return redirect('read/writer_area');
            }
        }else{
            echo '笔名不存在';die;
        }
    }

    public function book()
    {
        $cateinfo = Cate::get();
        return view('read.create',['cateinfo'=>$cateinfo]);
    }

    public function book_do()
    {
        $data = request()->all();
        if (!request()->hasFile('book_file')) {
            echo '文件没有上传';
            die;
        }
        $ext = $data['book_file']->getClientOriginalExtension();
        $filename = md5(uniqid()) . "." . $ext;
        $store_result = request()->book_file->storeAs('images', $filename);
        $data['book_file'] = "/" . $store_result;
        $res = Book::create([
            'book_name'=>$data['book_name'],
            'author'=>$data['author'],
            'cate_id'=>$data['cate_id'],
            'book_file'=>$data['book_file']
        ]);
        $book_id = $res->book_id;
        $res1 = Details::create([
            'introd'=>$data['introd'],
            'chapter'=>$data['chapter'],
            'chapter_desc'=>$data['chapter_desc'],
            'book_id'=>$book_id
        ]);
        if($res1){
            return redirect('book/review');
        }
    }
}
