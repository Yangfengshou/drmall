<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加会员</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>

</head>
<body>
<div class="place">
    <span>位置:添加会员</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">添加会员</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Member/member_add');?>" method="post">
                <ul class="forminfo">
                    <li>
                        <label>用户名称</label>
                        <input class="dfinput" id="username" name="username" type="text" placeholder="请填写用户名称"  style="width:342px;"/>
                    </li>
                    <li>
                        <label>用户密码</label>
                        <input class="dfinput" id="fpwd" name="password" type="text"  placeholder="请填写用户密码"  style="width:342px;"/>
                    </li>
                    <li>
                        <label>确认密码</label>
                        <input class="dfinput" id="spwd" name="spwd" type="text"  placeholder="请再次填写用户密码"  style="width:342px;"/>
                    </li>
                    <li>
                        <label>联系方式</label>
                        <input class="dfinput" id="phone" name="phone" type="text"  placeholder="请填写联系方式"  style="width:342px;"/>
                    </li>
                    <input  type="submit" id="psw-btn" value="立即添加"  class="btn" />
                </ul>
            </form>
        </div>
    </div>
</div>

</body>

</html>