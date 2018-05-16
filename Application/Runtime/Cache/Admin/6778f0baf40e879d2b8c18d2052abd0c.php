<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧菜单页</title>
<link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/drmall/Public/admin/js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();
		//$(".menuson>li.active").removeClass("active open").find('.sub-menus').hide();

		 $parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();	
			}					
		}
	});
	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });
	
	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})	
</script>
</head>
<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>后台管理</div>
    <dl class="leftmenu">

        <?php if(is_array($menu)): foreach($menu as $key=>$val): ?><dd>
            <div class="title">
                <span><img src="/drmall/Public/admin/images/leftico01.png" /></span><?php echo ($val[menu_name]); ?>
            </div>
            <ul class="menuson">
                <?php if(is_array($val[child])): foreach($val[child] as $key=>$value): if($value[menu_id] == 2): ?><li class="active">
                        <?php else: ?>
                        <li ><?php endif; ?>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U($value['menu_path']);?>" target="rightFrame"><?php echo ($value[menu_name]); ?></a>
                        <i></i>
                    </div>
                </li><?php endforeach; endif; ?>
            </ul>

        </dd><?php endforeach; endif; ?>

    </dl>
</body>
</html>