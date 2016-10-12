thinkphp php 开发 用户注册登陆模块 注册 带验证码 邮箱验证 正则匹配 jquery ajax异步验证 session技术  数据表设计

1首先开通邮箱 并开通smtp服务 验证可用 并设置邮箱名称（用于填写框架中的配置） 

2开启php扩展 php.ini中 ssl模块

3下载 phpmailer 放于Thinkphp/Libary/Vendor下（项目中有）

4封装发送邮件函数到 App/Common/function.php中（项目中有）

5填写发送邮件配置到App/Home/Conf/config.php中（项目中有）

6下载jquery插件到Public/Js/目录下（项目中有）

7设计数据表data目录下tp_model.sql文件（数据库名称tp_model）

8 需要自己配置的127项

















