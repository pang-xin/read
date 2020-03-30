<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('read/book_do')}}" method="post" enctype="multipart/form-data">
    作品名称:<input type="text" name="book_name"><br>
    <input type="hidden" name="author" value="{{session('pen_name')}}">
    作品分类:<select name="cate_id">
        @foreach($cateinfo as $k=>$v)
        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
        @endforeach
    </select><br>
    作品封面:<input type="file" name="book_file"><br>
    <input type="submit" value="提交">
</form>
</body>
</html>
