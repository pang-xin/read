<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>书籍</title>
</head>
<body>
    {{$author}}所有的书籍
    @foreach($info as $k=>$v)
        {{$v['book_name']}}
    @endforeach
</body>
</html>
