<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="/portal/public/images/favicon.ico">
    <link rel="Bookmark" type="image/x-icon" href="/portal/public/images/favicon.ico">
    <!--   <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />-->
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/index.css">
    <link rel="stylesheet" href="/static/css/font.css">
    <link rel="stylesheet" href="/static/css/module.css">
    <link rel="stylesheet" href="/static/css/layout.css">
    <link rel="stylesheet" href="/static/css/header.css">
    <link rel="stylesheet" href="/static/css/footer.css">
    <link rel="stylesheet" href="/static/css/dialog.css">


    <link rel="stylesheet" href="/static/css/ui.css">
    <link rel="stylesheet" href="/static/css/swiper.min.css">
    <link rel="stylesheet" href="/static/css/plugin-drawer.css">




    <script type="text/javascript" src="/static/js/aq_common.js"></script>
</head>
<body>
<div class="apply-form-item">
    <form action="{{url('read/login_writer_do')}}" method="post">
        笔名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pen_name"><br>
        密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="pwd"><br>
        <input type="submit" value="作者登陆"><br>
        如果您是新用户 请点击<<a href="{{url('admin/login')}}">这里</a>>去管理员审核
    </form>
</div>

</body>
</html>
