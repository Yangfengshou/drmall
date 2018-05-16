<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密保设置</title>
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
<script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
<script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
<script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
<!--<script type="text/javascript" src="/drmall/Public/home/js/jquery.validate.min.js"></script>-->
</head>

<body>

	<!--top 开始-->
    <div class="top">
    	<div class="top-con w1200">
        	<p class="t-con-l f-l">您好，欢迎来到宅客微购</p>
            <ul class="t-con-r f-r">
            	<li><a href="#">我 (个人中心)</a></li>
            	<li><a href="#">我的购物车</a></li>
            	<li><a href="#">我的订单</a></li>
            	<li class="erweima">
                	<a href="#">扫描二维码</a>
                    <div class="ewm-tu">
                    	<a href="#"><img src="/drmall/Public/home/images/erweima-tu.jpg" /></a>
                    </div>
                </li>
                <div style="clear:both;"></div>
            </ul>
            <div style="clear:both;"></div>
        </div>
    </div>
    
    <!--logo search 开始-->
    <div class="hd-info1 w1200">
    	<div class="logo f-l">
        	<h1><a href="../Index/index.html" title="中林网站"><img src="/drmall/Public/home/images/logo.jpg" /></a></h1>
        </div>
        <div style="clear:both;"></div>
    </div>
    
    <!--内容开始-->
<form id="form1">
    <input type="hidden" name="mid" value="<?=session('mid');?>"/>
  <!--  <?php
 echo session('mname'); ?>-->
    <div class="password-con registered">
    	<div class="psw">
        	<p class="psw-p1">密保问题：</p>
            <select class="opt" name="question">
                <option>请选择</option>
                <option value="您的学号是？">问题一：您的学号是？</option>
                <option value="您童年的好友是？">问题二：您童年的好友是？</option>
                <option value="您的小学是？">问题三：您的小学是？</option>
                <option value="您印象深刻的老师是？">问题四：您印象深刻的老师是？</option>
            </select>
        </div>
    	<div class="psw">
        	<p class="psw-p1">密保答案：</p>
            <input type="text" id="answer" name="answer" placeholder="请输入答案"/><span></span>
        </div>
       <input type="button" class="psw-btn" id="psw-btn" value="立即保存" style="text-align: center"/>
    </div>
</form>
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
    $(function(){
        $('#psw-btn').click(function(){
            $.post("<?php echo U('Login/safepwdMy');?>",$('#form1').serialize(),function(data){
                if(data['status']==1){
                    layer.msg(data['info'],{icon:6});
                    location.href="<?php echo U('/Home/Login/login');?>";
                }else{layer.msg(data['info'],{icon:5})}
            },'json');
        })
    })
</script>
</html>