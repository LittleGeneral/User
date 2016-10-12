<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta charset="UTF-8" />
    <title>首页</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
</head>
<body>
    <?php if($user == 'open' ): ?><div>
            <a  href="<?php echo U('User/login');?>">登录</a>
            <span>|</span>
            <a  href="<?php echo U('User/register');?>">注册</a>
        </div>
        <?php else: ?>
        <div>
            <span>
                欢迎您 ：
                <?php echo ($user); ?></span>
                | &nbsp;
                <a href='/code/thinkphp/user/index.php/home/index/layout'>退出</a>
            </span>
        </div><?php endif; ?>
</body>
</html>