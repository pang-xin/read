<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>书籍详情页</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/read/css/basic.css')}}" >
</head>
<body>
<div>
    书籍名称:{{$bookname->book_name}}<br>
    书籍作者:{{$bookname->author}}
</div>
<div>
    最新章节:{{$bookname->chapter}}<br>
            {{$bookname->chapter_desc}}
</div>
    <button>打赏月票</button>
</body>
</html>
