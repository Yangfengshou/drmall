<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
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
<form id="form1">
    <div class="password-con registered">
    	<div class="psw">
        	<p class="psw-p1">用户名</p>
            <input type="text" id="username"name="username" placeholder="HR了" /><span></span>
        </div>
    	<div class="psw">
        	<p class="psw-p1">输入密码</p>
            <input type="password" id="fpwd" name="fpwd" placeholder="请输入密码" /><span></span>
        </div>
    	<div class="psw">
        	<p class="psw-p1">确认密码</p>
            <input type="password" id="spwd" name="spwd" placeholder="请再次确认密码" /><span></span>
        </div>
    	<!--<div class="psw psw2">
        	<p class="psw-p1">手机号/邮箱</p>
            <input type="text" placeholder="请输入手机/邮箱验证码" />
            <button>获取短信验证码</button>
        </div>-->
    	<div class="psw psw3" style="position: absolute">
        	<p class="psw-p1">验证码</p>
            <input type="text" placeholder="请输入验证码" name="verify" id="verify"/>
        </div>
        <div class="yanzhentu">
        	<div class="yz-tu f-l"style="float: left;position: relative;margin-left:250px">
                <img src="<?php echo U('Public/verifyMy',array('id'=>1));?>"  id='yzmImg' onclick="this.src='/drmall/index.php/Home/Public/verifyMy/id/1/'+Math.random()" height="44px"width="90px"/>
            </div>
            <p class="f-l">看不清？<a href="javascript:void(0)" onclick="document.getElementById('yzmImg').src='/drmall/index.php/Home/Public/verifyMy/id/1/'+Math.random()">换张图</a></p>
            <div style="clear:both;"></div>
        </div>
        <div class="agreement">
        	<input type="checkbox" name="protocol" id="myprotocol"/>
            <p>我有阅读并同意<span class="document">《宅客微购网站服务协议》</span></p>
        </div>
       <input class="psw-btn" type="submit" id="psw-btn" value="立即注册" style="text-align: center"/>
       <!-- <button class="psw-btn" id="psw-btn" >立即注册</button>-->
        <p class="sign-in">已有账号？请<a href="login.html">登录</a> <span>设置密保？请<a href="safepwd.html">设置</a></span></p>

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
            //设置验证信息：
            rules:{
                username:{
                    required:true,
                    minlength:3,
                    maxlength:8
                },
                fpwd:{
                    required:true,
                    minlength:6,
                    maxlength:16
                },
                spwd:{
                    required:true,
                    equalTo:"#fpwd"
                }
            },
            //设置提醒信息：
            messages:{
                username:{
                    required:"用户名不能为空",
                    minlength:"用户名不能少于3个字符",
                    maxlength:"用户名最大不能超过8个字符"
                },
                fpwd:{
                    required:"密码不能为空",
                    minlength:"密码不能少于6个字符",
                    maxlength:"密码最大不能超过16个字符"
                },
                spwd:{
                    required:"确认密码不能为空",
                    equalTo:"两次密码不一致"
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


        //协议验证：
        var protocol=document.getElementById('myprotocol');
        //注册按钮
        $('#form1').submit(function() {
            var username = $('#username').val();
            var fpwd = $('#fpwd').val();
            var spwd = $('#spwd').val();
            var verify = $('#verify').val();
            if (!protocol.checked) {
                layer.msg("必须先阅读相关协议。", {icon: 5});
                $('#yzmImg').attr({src: "<?php echo U('Public/verifyMy',array('id'=>1));?>"});//出错时   点击弹出框以后   验证码自动刷新一次
            } else {
                $.post("<?php echo U('Login/registerMy');?>", {
                    username: username,
                    password: fpwd,
                    verify: verify
                }, function (data) {
                    if (data['status'] == 1) {
                        layer.msg(data['info'], {icon: 6});
                        location.href = "<?php echo U('/Home/Index/index');?>";
                    } else {
                        layer.msg(data['info'], {icon: 5})
                        $('#yzmImg').attr({src: "<?php echo U('Public/verifyMy',array('id'=>1));?>"});//出错时   点击弹出框以后   验证码自动刷新一次
                    }
                }, 'json');
            }
        })
    })

    //验证信息弹出层
    $(function(){
        $('.document').click(function() {
            layer.open({
                type: 2,
                title:'《宅客微购网站服务协议》',
                shadeClose: true,
                shade: 0.5,
                area: ['380px', '90%'],
                content: 'protocol.html'
            });
        })
    })
</script>
</html>