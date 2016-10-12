<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <title>帐号 - 注册</title>
        <script type="text/javascript" src="/code/thinkphp/user/Public/Js/jquery-1.8.3.min.js"></script>
        <script>
            $(function () {
                var flag = false;
                function verifys(flag) {
                    return false;
                }
                var captcha_img = $("#veri");
                var verifyimg = captcha_img.attr("src");
                captcha_img.attr('title', '点击刷新');
                captcha_img.click(function () {
                    $("#disy").html('');
                    if (verifyimg.indexOf('?') > 0) {
                        $(this).attr("src", verifyimg + '&random=' + Math.random());
                    } else {
                        $(this).attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
                    }
                    $("#disy").html('');
                });
                $(".code").blur(function () {
                    $.ajax({
                        url: '/code/thinkphp/user/index.php/home/user/verify_y',
                        type: 'POST',
                        data: {verifyname: $('.code').val()},
                        success: function (data) {
                            if (data == 400) {
                                $("#disy").html('验证码错误!');
                            } else {
                                $("#disy").html('');
                            }
                        },
                        error: function () {
                        },
                        timeout: 5000
                    });
                });

                $('#email').blur(function () {
                    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
                    if (reg.test($('#email').val())) {
                        $("#emailyz").html('');
                        flag = true;
                    } else if ($('#email').val() == '') {
                        $("#emailyz").html('邮箱不能为空!');
                    } else {
                        $("#emailyz").html('邮箱格式不正确!');
                    }
                });

                $("#submit").click(function () {
                    if (flag) {
                        $.ajax({
                            url: '/code/thinkphp/user/index.php/home/user/add',
                            type: 'POST',
                            data: {email: $('#email').val()},
                            success: function (data) {
                                if (data == 200) {
                                    alert('发送邮件失败,请稍后!');
                                } else if (data == 300) {
                                    alert('邮箱已经存在!');
                                } else if (data == 500) {
                                    alert('邮箱格式错误!');
                                } else if (data = 400) {
                                    window.open('/code/thinkphp/user/index.php/home/user/reg', target = "_self");
                                }
                            },
                            error: function () {
                            },
                            timeout: 5000
                        });
                    } else {
                        alert('选项输入有误!');
                    }
                });
            });
        </script>
    </head>

    <body>
        <h4>注册帐号</h4><h4><a href="<?php echo U('Index/index');?>">返回首页</a></h4>
            邮箱:<input  id="email" type="text" name="email" placeholder="请输入邮箱">
             <p color="red" id="emailyz"></p>
            <input  class="code" type="text" name="icode" autocomplete="off" placeholder="图片验证码">
            <img id= "veri" alt="图片验证码" title="看不清换一张"  src="<?php echo U('User/verify_c');?>">
            <div id = "disy" ></div>
            <input id="submit" type="submit" value="立即注册">
    </body>

</html>