<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="{{url('read/reg_do')}}" method="post">
        手机号:<input type="text" name="tel"><br>
        <input type="text" name="code" style="width:8%; margin-left: 52px;">
        <input type="button" value="获取验证码" id="btn"><br>
        密码&nbsp;&nbsp;  :<input type="password" name="pwd"><br>
        <input type="submit" value="注册">
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
