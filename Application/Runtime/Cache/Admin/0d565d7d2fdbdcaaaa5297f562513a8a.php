<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改信息</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
</head>
<body>
<div class="place">
    <span>位置:修改信息</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="<?php echo U('admin_list');?>">管理员列表</a></li>
        <li><a href="<?php echo U('admin_alter');?>">修改信息</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Admin/myAlter',array('aid'=>$_GET['aid']));?>" method="post">
                <ul class="forminfo">
                    <li><label>密 码 <b>*</b></label><input id="password" name="password" type="text" class="dfinput" placeholder="修改密码"  style="width:342px;"/></li>
                    <li><label>真实姓名 <b>*</b></label><input id="name" name="name" type="text" class="dfinput" placeholder="修改真实姓名"  style="width:342px;"/></li>
                    <li><label>手机号码 <b>*</b></label><input id="phone_number" name="phone_number" type="text" class="dfinput" placeholder="修改手机号码"  style="width:342px;"/></li>
                    <li><label>&nbsp;</label><input name="dosubmit" id="dosubmit" type="submit" class="btn" value="确认修改"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script>
//    $(function(){
//        $('#dosubmit').on('click',function(){
//            var password=$('#password').val();
//            var name=$('#name').val();
//            var phone_number=$('#phone_number').val();
//            $.post("<?php echo U('Admin/myAlter');?>",{password:password,name:name,phone_number:phone_number},function(){
//
//            })
//        })
//    })
</script>
</html>