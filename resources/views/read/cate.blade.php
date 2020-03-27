<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="{{asset('/read/css/basic.css')}}" >
</head>
<body>
<div class="infoBox">
    <section class="book">
        {{$catename['cate_name']}}下的小说
        <ul>

            @foreach($cateinfo as $k=>$v)
                <li><img src="images/nansheng.jpg" width="150px" height="175px">
                    <p>{{$v['book_name']}}： <span>点击阅读</span></p></li>
            @endforeach
        </ul>
    </section>
</div>
</body>
</html>
