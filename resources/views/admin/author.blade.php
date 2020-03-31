<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>作者名称</td>
        <td>作者身份证</td>
        <td>审核</td>
    </tr>
    <tr>
            @foreach($writer as $k=>$v)
                <td>{{$v['pen_name']}}</td>
                <td>{{$v['identity']}}</td>
                <td>
                    <a href="{{url('author/review_by/'.$v['writer_id'])}}">通过审核</a>
                    <a href="{{url('author/review_no/'.$v['writer_id'])}}">审核不通过</a>
                </td>
            @endforeach
    </tr>
</table>
</body>
</html>
