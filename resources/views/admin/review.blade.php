<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>作品名称</td>
        <td>作品作者</td>
        <td>作品封面</td>
        <td>审核</td>
    </tr>
    <tr>
            @foreach($review as $k=>$v)
                <td>{{$v['book_name']}}</td>
                <td>{{$v['author']}}</td>
                <td><img src="{{$v['book_file']}}" style="width: 50px;height: 50px;"></td>
                <td>
                    <a href="{{url('book/review_by/'.$v['book_id'])}}">通过审核</a>
                    <a href="{{url('book/review_no/'.$v['book_id'])}}">审核不通过</a>
                </td>
            @endforeach
    </tr>
</table>
</body>
</html>
