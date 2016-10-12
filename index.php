<?php
header('content-type:text/html;charset=utf-8');
/// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.lnamphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author:michlu liuchunxi.8@gmail.com
// +----------------------------------------------------------------------

if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

/**
 * 系统调试设置
 * 项目正式部署后请设置为false
 */
define('APP_DEBUG', true );

/**
 * 应用目录设置
 */
define ( 'APP_PATH', './App/' );

/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './ThinkPHP/ThinkPHP.php';