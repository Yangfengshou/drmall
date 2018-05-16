<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/drmall/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(/drmall/Public/admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="index.html" target="_parent"><img src="/drmall/Public/admin/images/logo.png" title="系统首页" /></a>
    </div>
        
 <!--    <ul class="nav">
 <li>
     <a href="main.html" target="rightFrame" class="selected">
         <img src="/drmall/Public/admin/images/icon01.png" title="工作台" />
     <h2>工作台</h2>
     </a>
 </li>
    
 </ul> -->
            
    <div class="topright">    
    <ul>
    <li><span><img src="/drmall/Public/admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a href="<?php echo U('Login/loginOut');?>" target="_parent">退出</a></li>
    </ul>
     
    <div class="user">
    <span style="color:red;"><?php echo ($_SESSION[aname]); ?></span>
    <i>消息</i>
    <b>1</b>
    </div>    
    
    </div>

</body>
</html>