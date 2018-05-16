<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
<script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
<script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
<script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>

<body>

	<div class="sign-logo w1200">
	<h1><a href="../Index/index.html" title="宅客微购"><img src="/drmall/Public/home/images/logo.jpg" /></a></h1>
</div>

	<div class="sign-con w1200">
	<img src="/drmall/Public/home/images/logn-tu.gif" class="sign-contu f-l" />
    <form method="post">
    <div class="sign-ipt f-l">
    	<p>用户昵称</p>
        <input type="text" id="username" name="username" placeholder="手机号/邮箱" />
        <p>密码</p>
        <input type="password" id="password" name="password" placeholder="密码可见" /><br />
        <input class="slig-btn" id="login" type="button" value="登录" />
        <p>第三方账号？请<a href="#">登录</a><a href="serchpwd.html" class="wj">忘记密码？</a></p>
        <div class="sign-qx">
        	<a href="#" class="f-r"><img src="/drmall/Public/home/images/sign-xinlan.gif" /></a>
        	<a href="#" class="qq f-r"><img src="/drmall/Public/home/images/sign-qq.gif" /></a>
            <div style="clear:both;"></div>
        </div>
    </div>
    </form>
    <div style="clear:both;"></div>
</div>

    <!--底部服务-->
    <div class="ft-service">
    	<div class="w1200">
        	<div class="sv-con-l2 f-l">
            	<dl>
                	<dt><a href="#">新手上路</a></dt>
                    <dd>
                    	<a href="#">购物流程</a>
                    	<a href="#">在线支付</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">配送方式</a></dt>
                    <dd>
                    	<a href="#">货到付款区域</a>
                    	<a href="#">配送费标准</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">购物指南</a></dt>
                    <dd>
                    	<a href="#">常见问题</a>
                    	<a href="#">订购流程</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">售后服务</a></dt>
                    <dd>
                    	<a href="#">售后服务保障</a>
                    	<a href="#">退款说明</a>
                    	<a href="#">新手选购商品总则</a>
                    </dd>
                </dl>
                <dl>
                	<dt><a href="#">关于我们</a></dt>
                    <dd>
                    	<a href="#">投诉与建议</a>
                    </dd>
                </dl>
                <div style="clear:both;"></div>
            </div>
        	<div class="sv-con-r2 f-r">
            	<p class="sv-r-tle">187-8660-5539</p>
            	<p>周一至周五9:00-17:30</p>
            	<p>（仅收市话费）</p>
            	<a href="#" class="zxkf">24小时在线客服</a>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--底部 版权-->
    <div class="footer w1200">
    	<p>
        	<a href="#">关于我们</a><span>|</span>
        	<a href="#">友情链接</a><span>|</span>
        	<a href="#">宅客微购社区</a><span>|</span>
        	<a href="#">诚征英才</a><span>|</span>
        	<a href="#">商家登录</a><span>|</span>
        	<a href="#">供应商登录</a><span>|</span>
        	<a href="#">热门搜索</a><span>|</span>
        	<a href="#">宅客微购新品</a><span>|</span>
        	<a href="#">开放平台</a>
        </p>
        <p>
        	沪ICP备13044278号<span>|</span>合字B1.B2-20130004<span>|</span>营业执照<span>|</span>互联网药品信息服务资格证<span>|</span>互联网药品交易服务资格证
        </p>
    </div>
    
</body>
<script type="text/javascript">
//登陆
    $(function(){
        $('#login').click(function(){
            var username = $('#username').val();
            var password = $('#password').val();
            $.post("<?php echo U('Home/Login/loginMy');?>", {username: username,password: password},function (data){
                if(data['status']==2){
                    location.href="<?php echo U('/Home/Goods/goodsdetail');?>";
                }
                if(data['status']==3){
                    location.href="<?php echo U('/Home/MyCart/mycart');?>";
                }
                if(data['status']==1){
                    layer.msg(data['info'],{icon:6});
                    location.href="<?php echo U('/Home/Index/index');?>";
                }else{
                    layer.msg(data['info'],{icon:5})
                }
            },'json');
        })
    })
</script>
</html>