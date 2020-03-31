<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{url('admin/reg_do')}}" method="post">
    管理员:<input type="text" name="admin_name" id=""><br>
    密码:<input type="password" name="admin_pwd" id=""><br>
        <input type="submit" value="添加">
</form>
</body>
</html>
