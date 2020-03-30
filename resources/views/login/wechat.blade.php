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
    <input type="submit" value="绑定手机号">
</form>
</body>
</html>
