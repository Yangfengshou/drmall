<?php
return array(
    //'配置项'=>'配置值'
    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.qq.com',//smtp服务器的名称smtp.qq.com    smtp.163.com
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'2773049719@qq.com',//你的邮箱名
    'MAIL_FROM' =>'2773049719@qq.com',//发件人地址1896697@qq.com 17737781096@163.com
    'MAIL_FROMNAME'=>'庞婷婷',//发件人姓名
    'MAIL_PASSWORD' =>'elmncdiaxruydfed',//邮箱密码  nzylmxrqgxthbjgj(应该写上授权码)
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
    //163的怎么测试都不成功   qq的已经成功

    //'配置项'=>'配置值'
    //数据库配置信息
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'drmall', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'pang', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'dr_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
//'DB_DEBUG' => TRUE, // 数据库调试模式

);
//系统常量
//define('ROOT',str_replace("\\","/",dirname(__FILE__)));
//define('UPLOAD_DIR',ROOT.'/Public/upload');

//'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志

