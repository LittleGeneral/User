<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>帐号 - 登陆</title>
        <script type="text/javascript" src="/code/thinkphp/email/Public/Js/jquery-1.8.3.min.js"></script>
        <script>
            $(function () {
                var flag = false;
                $('#email').blur(function () {
                    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
                    var re = /\d{10}/;
                   // var phone = /(1[3-9]\d{9}$)/;
                    var email = $('#email').val();
                    if(email == ''){
                                $("#emailyz").html('选项不能为空');
                    } else if(reg.test($('#email').val()) || re.test($('#email').val())){

                        $("#emailyz").html('');
                    } else{
                        $("#emailyz").html('邮箱或账号格式错误!');

                    }
//                      if(!reg.test($('#email').val())){
//                          if(!re.test($('#email').val())){
//                              $("#emailyz").html('小米账号错误!');
//                          }else{
//                              $("#emailyz").html('');
//                          }
//                          $("#emailyz").html('邮箱格式错误!');
//                      } else if(email == ''){
//                          $("#emailyz").html('选项不能为空');
//                      } else{
//                          $("#emailyz").html('');
//                      }
                });

                $("#passwd").blur(function(){
                	if($("#passwd").val()==''){
                                    $("#pass").html('密码不能为空!');
                                    flag = flase;
                	}else{
                            $("#pass").html('');
                        }
                });

                    $("#rs").click(function(){
                        window.open("<?php echo U('User/register');?>",target = "_self");
                    });

                $("#submit").click(function () {
                    $.ajax({
                        url: '/code/thinkphp/email/index.php/home/user/dologin',
                        type: 'POST',
                        data: {email: $('#email').val(),passwd:$("#passwd").val()},
                        success: function (data) {
                            if (data == 200) {
                                alert('账号或者密码有误!');
                            } else if (data == 400) {
                                //window.open('/code/thinkphp/email/index.php', target = "_self");
                                window.open('<?php echo U('Index/index');?>',target='_self');
                            }
                        },
                        error: function () {
                        },
                        timeout: 5000
                    });
                });
            });
        </script>
    </head>

<body>

    <input  id="email" type="text" name="email" placeholder="邮箱/账号">
    <div id="emailyz"></div>
            <input  id="passwd" type="password" name="passwd" placeholder="密码">
    <div id="pass"></div>
    <input id="submit" type="submit" value="立即登陆">
    <input id="rs" type="submit" value="注册账号">
    <h4><a href="<?php echo U('Index/index');?>">返回首页</a></h4>
</body>
</html>