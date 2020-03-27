<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>绑定手机号</title>
</head>
<body>
您所用的微信是新用户 需要绑定手机号
<form action="{{url('read/wechat_do')}}" method="post">
    <input type="hidden" name="openid" value="{{$openid}}">
    手机号:<input type="text" name="tel"><br>
    <input type="text" name="code" style="width:8%; margin-left: 52px;">
    <input type="button" value="获取验证码" id="btn"><br>
    <input type="submit" value="绑定手机号">
</form>
</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $('#btn').on('click',function(){
        var tel = $('input[name="tel"]').val();

        if(tel == ''){
            alert('手机号不能为空');
        }
        $.ajax({
            url:"{{url('read/aliyun_code')}}",
            type:'post',
            data:{tel:tel},
            dataType:'json',
            success:function(res){
                if(res.Message == ok){
                    alert('发送成功');
                }
            }
        });
    });
</script>
</html>
