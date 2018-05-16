<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>邮箱验证</title>
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
<link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
<script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
<script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
<script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
<script type="text/javascript" src="/drmall/Public/home/js/jquery.validate.min.js"></script>
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
<form method="post">
    <div class="password-con registered">
    	<div class="psw">
        	<p class="psw-p1">用户昵称：</p>
            <input type="text" id="username" name="username" placeholder="请输入昵称" /><span></span>
        </div>
    	<div class="psw">
            <p class="psw-p1">邮箱：</p>
            <input type="text" name="mail" value=""/><span></span>
        </div>
    	<!--<div class="psw psw3" style="position: absolute">
        	<p class="psw-p1">验证码：</p>
            <input type="text" placeholder="请输入验证码" name="verify" id="verify" value=""/>
        </div>
        <div class="yanzhentu">
        	<div class="yz-tu f-l" style="float: left;position: relative;margin-left:250px">
                <img src="<?php echo U('Public/verifyMy',array('id'=>1));?>"  id='yzmImg' onclick="this.src='/drmall/index.php/Home/Public/verifyMy/id/1/'+Math.random()" height="44px"width="90px"/>
            </div>
            <p class="f-l">看不清？<a href="javascript:void(0)" onclick="document.getElementById('yzmImg').src='/drmall/index.php/Home/Public/verifyMy/id/1/'+Math.random()">换张图</a></p>
            <div style="clear:both;"></div>
        </div>-->

        <div class="psw">
            <p class="psw-p1">邮箱验证：</p>
            <input type="text" id="answer" name="answer" placeholder="请输入验证码"style="width: 160px"/><span></span>
            <!--<input type="button" onclick="" value="获取验证码" name="button_vrfy" style="width: 120px;background-color: orange;color: #fff"/>-->
            <input type="button" class="psw-btn" id="button_vrfy" value="发送验证码" style="text-align: center; width: 100px; margin-left: 1px;"/>
        </div>
        <div class="agreement">

        </div>
       <input type="button" class="psw-btn" id="psw-btn" value="找回密码" style="text-align: center"/>
        <p class="sign-in">已找回？请<a href="login.html">登录</a></p>
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
        $('#form1').validate({
            //设置验证信息：      //这里应该写成验证格式是否正确   内容对不对转后台验证
            rules:{
                mail:{
                    required:true,
                    email:true
                },
                username:{
                    required:true,
                    remote:{
                        url:"<?php echo U('Login/mailpwd');?>",
                        type:"post"
                    }
                }
            },
            //设置提醒信息：
            messages:{
                mail:{
                    required:"邮箱不能为空",
                    email:"邮箱格式不正确"
                },
                username:{
                    required:"用户名不能为空",
                    remote:"该用户不存在"
                }
            },
            success: function(label){
                label.addClass("ok").text("通过验证");
            },
            validClass: "ok",
            errorPlacement:function(error, element){
                error.insertAfter(element.next());
            }
        })
        $('#form1').submit(function() {
            $(this).ajaxSubmit(function(res) {
                alert(res);
            });
            return false; //阻止表单默认提交
        });
    })
//邮箱验证     后台判断
$(function(){
    //点击发送验证码
    $("#button_vrfy").on('click',function() {
        var username = $("input[name=username]").val();
        var mail = $("input[name=mail]").val();
        $.post("<?php echo U('Login/addmail');?>", {
            'username': username,
            'mail': mail
        }, function (data) {
            layer.msg(data['info']);
        }, 'json')
    })
    //点击找回密码
    $("#psw-btn").on('click',function(){
        var answer=$("#answer").val();
        $.post("<?php echo U('Login/mailpwd1');?>",{
            'answer':answer},function(data){
            if(data['res']==0){
                layer.msg(data['info']);
            }else{
                layer.msg(data['info']);
                location.href="<?php echo U('Login/pwd');?>";
            }

        },'json')
    })
})

</script>
</html>