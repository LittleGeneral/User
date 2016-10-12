<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>帐号 - 注册</title>
    <script type="text/javascript" src="/code/thinkphp/email/Public/Js/jquery-1.8.3.min.js"></script>
    <script>
         $(function(){
             var flag = false;
              $('#email').blur(function(){
                $.ajax({
                    url:'/code/thinkphp/email/index.php/home/user/dopass',
                    type:'POST',
                    data:{email:$('#email').val()},
                    success:function(data){
                        if(data == 400){
                            //alert('验证码超时,请重新获取!');
                             $("#verifys").html('验证码超时,请重新获取!');
                        }else if(data == 200){
                            //alert('验证码输入错误,请重新输入');
                            $("#verifys").html('验证码输入错误,请重新输入!');
                        }else{
                             $("#verifys").html('');
                             flag = true;
                        }
                    },
                    error:function(){},
                    timeout:5000
                });
              });
              $("#passwdq").blur(function(){
                if($("#passwdq").val() != $("#passwd").val()){
                  //alert('两次密码不一致!');
                  $("#passq").html('两次密码不一致!');
                }else{
                   $("#passq").html('');
                }
            });
               $("#passwd").blur(function(){
                if(!$("#passwd").val()){
                  //alert('密码不能为空!');
                  $("#pass").html('密码不能为空!');
                  flag = false;
                }else{
                  $("#pass").html('');
                }
            });
              $("#submit").click(function(){
                  if(flag){
                $.ajax({
                    url:'/code/thinkphp/email/index.php/home/user/loginR',
                    type:'POST',
                    data:{passwd:$('#passwd').val()},
                    success:function(data){
                        if(data == 400){
                           // alert('注册成功!');
                           window.open('/code/thinkphp/email/index.php', target = "_self");
                        }
                    },
                    error:function(){},
                    timeout:5000
                });
                  }else{
                      alert('选项输入有误!');
                  }
              });
          });
    </script>
  </head>

  <body>

  <h4 class="title-big">注册帐号</h4>
  <tt>验证码:</tt>
  <input  id="email" type="text" name="email" placeholder="请输入验证码">
  <div id="verifys"></div>
  <tt id="select-cycode-result">密码:</tt>
  <input  id="passwd" type="password" name="passwd" autocomplete="off" placeholder="请输入密码">
  <div id="pass"></div>
  <tt id="select-cycode-result">确认密码:</tt>
  <input id="passwdq" type="password" name="passwdq" autocomplete="off" placeholder="再次输入密码">
  <div id="passq"></div>

  <input id="submit" type="submit" value="立即注册"></body>
</html>