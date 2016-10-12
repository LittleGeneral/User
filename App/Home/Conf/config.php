<?php
return array(
	//'配置项'=>'配置值'
        //当开启调试模式的情况下,这个参数是false,因此你会发现在调试下面URL区分大小写
        'URL_CASE_INSENSITIVE'  =>  true,
        //显示页面trace信息
        'SHOW_PAGE_TRACE'       =>  true,
        //默认访问模块
        //'MODULE_ALLOW_LIST'     =>  array('Home','Admin'),
        //'DEFAULT_MODULE'        =>  'Home',
    	'DB_CHARSET'            =>  'utf8',
        'DB_TYPE'               =>  'mysql',
        'DB_HOST'               =>  'localhost',
        'DB_NAME'               =>  'tp_model',
        'DB_USER'               =>  'root',
        'DB_PWD'                =>  '',
        'DB_PORT'               =>  '3306',
        'DB_PREFIX'             =>  'model_',
        'TMPL_L_DELIM' => '<{',
        'TMPL_R_DELIM' => '}>',
        //URL_PARAMS_BIND_TYPE = 1；    设置参数绑定按照参数绑定
        //多个伪静态后缀设置用 |分割
        'URL_HTML_SUFFIX'       =>  'html|xml',
        'URL_DENY_SUFFIX'       =>  'shtml',

        'THINK_EMAIL' => array(

        'SMTP_HOST' => 'smtp.sina.com', //SMTP服务器

        'SMTP_PORT' => '465', //SMTP服务器端口

        'SMTP_USER' => 'lamp140@sina.com', //SMTP服务器用户名

        'SMTP_PASS' => '140140', //SMTP服务器密码

        'FROM_EMAIL' => 'lamp140@sina.com', //发件人EMAIL

        'FROM_NAME' => 'email', //发件人名称

        'REPLY_EMAIL' => 'lamp140@sina.com', //回复EMAIL（留空则为发件人EMAIL）

        'REPLY_NAME' => '', //回复名称（留空则为发件人名称）

        )
);