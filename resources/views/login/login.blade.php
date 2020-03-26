<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="{{url('read/login_do')}}" method="post">
        手机号:<input type="text" name="tel"><br>
        密码  :<input type="password" name="pwd"><br>
        <input type="submit" value="登陆">
    </form>
<div style="float:left;">
    <p>微信扫码登陆</p>
    <img src="/1.png" alt="">
    <p class="shixiao"></p><span class="content"></span>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    //获取一下当前的状态
    $(function(){
        setInterval(shixiao,1000);
        time = 60;
        setInterval(getstatus,1000);
    })

    function shixiao(){
        if(time>0){
            var str = "二维码"+"s 后失效，请尽快操作";
            $('shixiao').html(str);
            time --;
        }else{
            $('img').attr('src','/1.png');
            $('.content').html('');
            var str = '二维码已失效，请点击图片重新获取';
            $('.shixiao').html(str);
        }
    }

    function getstatus(){
        {{--$.ajax({--}}
        {{--    url:"{{url('read/index')}}",--}}
        {{--    data:"get",--}}

        {{--});--}}
    }

    $('img').on('click',function(){
        history.go(0);
    });
</script>
</html>
