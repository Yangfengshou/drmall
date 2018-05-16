<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
    <link rel="shortcut icon" href="/drmall/bitbug_favicon(1).ico" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>
<body style="position:relative;">
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <?php if($_SESSION[mid] > 0): ?><p class="t-con-l f-l">您好&nbsp;<span style="color: red;"><a id="myname" href="<?php echo U('Home/Member/mail');?>"><?php echo $_SESSION[mname];?></a></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Home/Login/loginOut');?>">&nbsp;退出</a></p>
            <?php else: ?>
            <p class="t-con-l f-l">您好<span style="color: red;">游客<?php echo mt_rand(600,930);?></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Home/Login/login');?>">&nbsp;&nbsp;亲,请登录</a></p><?php endif; ?>
        <p class="t-con-l f-l"><a href="<?php echo U('Home/Login/register');?>">&nbsp;免费注册</a></p>
        <ul class="t-con-r f-r">
            <?php if(empty($_SESSION[mname]) != true): ?><li><a href="<?php echo U('Member/mail');?>">我 (个人中心)</a></li>
                <li><a href="<?php echo U('MyCart/mycart');?>">我的购物车</a></li>
                <li><a href="<?php echo U('Order/myorder');?>">我的订单</a></li>
                <?php else: ?>
                <li><a href="<?php echo U('Home/Login/login');?>">我 (个人中心)</a></li>
                <li><a href="<?php echo U('Home/Login/login');?>">我的购物车</a></li>
                <li><a href="<?php echo U('Home/Login/login');?>">我的订单</a></li><?php endif; ?>
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
        <h1><a href="<?php echo U('Index/index');?>" title="中林网站"><img src="/drmall/Public/home/images/logo.jpg" /></a></h1>
    </div>
    <div class="search f-r">
        <ul class="sp">
            <li class="current" ss-search="sp"><a href="JavaScript:;">商品</a></li>
            <li ss-search="dp"><a href="JavaScript:;">店铺</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div class="srh">
            <div class="ipt f-l">
                <input type="text" placeholder="搜索商品..." ss-search-show="sp" />
                <input type="text" placeholder="搜索店铺..." ss-search-show="dp" style="display:none;" />
            </div>
            <button class="f-r">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <li><a href="#">绿豆</a></li>
            <li><a href="#">大米</a></li>
            <li><a href="#">驱蚊</a></li>
            <li><a href="#">洗面奶</a></li>
            <li><a href="#">格力空调</a></li>
            <li><a href="#">洗发护发</a></li>
            <li><a href="#">葡萄 </a></li>
            <li><a href="#">脉动</a></li>
            <li><a href="#">海鲜水产</a></li>
            <div style="clear:both;"></div>
        </ul>
    </div>
    <div style="clear:both;"></div>
</div>

<!--切换城市-->
<div class="switch-city w1200">
    <a href="#" class="dianji-qh">切换城市</a>
    <span class="dqm">重庆市</span>
    <div class="select-city">
        <div class="sl-city-top">
            <p class="f-l">切换城市</p>
            <a class="close-select-city f-r" href="#">
                <img src="/drmall/Public/home/images/close-select-city.gif" />
            </a>
        </div>
        <div class="sl-city-con">
            <p>西北</p>
            <dl>
                <dt>重庆市</dt>
                <dd>
                    <a href="#">长寿区</a>
                    <a href="#">巴南区</a>
                    <a href="#">南岸区</a>
                    <a href="#">九龙坡区</a>
                    <a href="#">沙坪坝区</a>
                    <a href="#">北碚</a>
                    <a href="#">江北区</a>
                    <a href="#">渝北区</a>
                    <a href="#">大渡口区</a>
                    <a href="#">渝中区</a>
                    <a href="#">万州</a>
                    <a href="#">武隆</a>
                    <a href="#">晏家</a>
                    <a href="#">长寿湖</a>
                    <a href="#">云集</a>
                    <a href="#">华中</a>
                    <a href="#">林封</a>
                    <a href="#">双龙</a>
                    <a href="#">石回</a>
                    <a href="#">龙凤呈祥</a>
                    <a href="#">朝天门</a>
                    <a href="#">中华</a>
                    <a href="#">玉溪</a>
                    <a href="#">云烟</a>
                    <a href="#">红塔山</a>
                    <a href="#">真龙</a>
                    <a href="#">天子</a>
                    <a href="#">娇子</a>
                </dd>

                <div style="clear:both;"></div>
            </dl>
            <dl>
                <dt>新疆</dt>
                <dd>
                    <a href="#">齐乌鲁木</a>
                    <a href="#">昌吉</a>
                    <a href="#">巴音</a>
                    <a href="#">郭楞</a>
                    <a href="#">伊犁</a>
                    <a href="#">阿克苏</a>
                    <a href="#">喀什</a>
                    <a href="#">哈密</a>
                    <a href="#">克拉玛依</a>
                    <a href="#">博尔塔拉</a>
                    <a href="#">吐鲁番</a>
                    <a href="#">和田</a>
                    <a href="#">石河子</a>
                    <a href="#">克孜勒苏</a>
                    <a href="#">阿拉尔</a>
                    <a href="#">五家渠</a>
                    <a href="#">图木舒克</a>
                    <a href="#">库尔勒</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl>
                <dt>甘肃</dt>
                <dd>
                    <a href="#">兰州</a>
                    <a href="#">天水</a>
                    <a href="#">巴音</a>
                    <a href="#">白银</a>
                    <a href="#">庆阳</a>
                    <a href="#">平凉</a>
                    <a href="#">酒泉</a>
                    <a href="#">张掖</a>
                    <a href="#">武威</a>
                    <a href="#">定西</a>
                    <a href="#">金昌</a>
                    <a href="#">陇南</a>
                    <a href="#">临夏</a>
                    <a href="#">嘉峪关</a>
                    <a href="#">甘南</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl>
                <dt>宁夏</dt>
                <dd>
                    <a href="#">银川</a>
                    <a href="#">吴忠</a>
                    <a href="#">石嘴山</a>
                    <a href="#">中卫</a>
                    <a href="#">固原</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl>
                <dt>青海</dt>
                <dd>
                    <a href="#">西宁</a>
                    <a href="#">海西</a>
                    <a href="#">海北</a>
                    <a href="#">果洛</a>
                    <a href="#">海东</a>
                    <a href="#">黄南</a>
                    <a href="#">玉树</a>
                    <a href="#">海南</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
        </div>
    </div>
</div>

<title>购物车</title>
<!--内容开始-->
    <div class="cart-content w1200">
    	<ul class="cart-tit-nav">
        	<li class="current"><a href="#">全部商品   21</a></li>
        	<li><a href="#">降价商品   1</a></li>
        	<li><a href="#">进口商品   1</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div class="cart-con-tit">
        	<p class="p1">
            	<input type="checkbox" name="hobby[]" class="qx">
				<span>全选</span>
            </p>
            <p class="p2">商品信息</p>
            <p class="p3">规格</p>
            <p class="p4">数量</p>
            <p class="p5">单价（元）</p>
            <p class="p6">金额（元）</p>
            <p class="p7">操作</p>
        </div>
<form id="form1">
    <?php if(is_array($goodsInfo)): foreach($goodsInfo as $key=>$value): if(is_array($value)): foreach($value as $k=>$v): ?><div class="cart-con-info">
                <div class="info-mid">
                    <input type="checkbox"  name="hobby[<?php echo ($k); ?>]" value="<?php echo ($v[goods_id]); ?>" data="hobby" class="mid-ipt f-l">
                    <div class="mid-tu f-l">
                        <a href="#"><img src="/drmall/Public/home/upload/<?php echo ($v[goods_pic]); ?>" style="width: 100px ;height:100px"/></a>
                    </div>
                    <div class="mid-font f-l">
                        <div class="mycart_font"><a href="<?php echo U('Goods/goodsdetail',array('gid'=>$v[goods_id]));?>" title="<?php echo ($v['goods_name']); ?>"><?php echo ($v['goods_name']); ?><br/></a></div>
                        <span>满赠</span>
                    </div>
                    <div class="mid-guige f-l">
                        <p>颜色：<?php echo ($v['goods_color_name']); ?></p>
                        <p>尺码：<?php echo ($v['goods_size_name']); ?></p>

                        <a href="JavaScript:;" class="xg" xg="xg1">修改</a>
                        <div class="guige-xiugai" xg-g="xg1">
                            <div class="xg-left f-l">
                                <dl>
                                    <dt>颜  色</dt>
                                    <dd>
                                        <a href="JavaScript:;" class="current">黑色</a>
                                        <a href="JavaScript:;">白色</a>
                                    </dd>
                                    <div style="clear:both;"></div>
                                </dl>
                                <dl>
                                    <dt>尺  码</dt>
                                    <dd>
                                        <a href="JavaScript:;" class="current">M</a>
                                        <a href="JavaScript:;">L</a>
                                        <a href="JavaScript:;">XL</a>
                                    </dd>
                                    <div style="clear:both;"></div>
                                </dl>
                                <a href="JavaScript:;" class="qd">确定</a>
                                <a href="JavaScript:;" class="qx" qx="xg1">取消</a>
                            </div>

                            <div class="xg-right f-l">
                                <a href="#"><img src="/drmall/Public/home/images/dai2.gif" /></a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <div class="mid-sl f-l">
                        <a href="JavaScript:;" class="sl-left">-</a>
                        <input type="text" name="buynum[<?php echo ($k); ?>]" value="<?php echo ($v['goods_buynum']); ?>" class="buygoodsnum" />
                        <a href="JavaScript:;" class="sl-right">+</a>
                    </div>
                    <input type="hidden" name="goods_price[<?php echo ($k); ?>]" value="<?php echo ($v[goods_detail_price]); ?>"/>
                    <input type="hidden" name="goods_detail_id[<?php echo ($k); ?>]" value="<?php echo ($v[goods_detail_id]); ?>"/>
                    <p class="mid-dj f-l">¥ <span><?php echo ($v[goods_detail_price]); ?></span></p>
                    <p class="mid-je f-l">¥ <span><?php echo ($v[goods_buynum]*$v[goods_detail_price]); ?></span>.00</p>
                    <div class="mid-chaozuo f-l">
                        <a href="#">移入收藏夹</a>
                        <a href="#" data-id="<?php echo ($v[goods_id]); ?>" class="delete">删除</a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div><?php endforeach; endif; endforeach; endif; ?>
</form>
        <tr>
            <td colspan="4">
                <div class="page">
                    <?php echo ($page); ?>
                </div>
            </td>
        </tr>
       	<div class="cart-con-footer">
        	<div class="quanxuan f-l">
            	<input type="checkbox" value="" name="hobby[<?php echo ($k); ?>]" data="hobby" class="qx">
                <span>全选</span>
                <a href="#" class="qxdelete">删除</a>
                <a href="#">加入收藏夹</a>
                <p>（此处始终在屏幕下方）</p>
            </div>
            <div class="jiesuan f-r">
            	<div class="jshj f-l">
                	<p>合计（不含运费）</p>
                	<p class="jshj-p2">
                    	￥：<span style="font-size:25px;color:red;" id="sum">0.00</span>
                    </p>
                </div>
            	<a><input type="button" id="dosum" class="js-a1 f-l" value="结算"/></a>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>


<!--底部服务-->
<script>
    $(function(){
        $('.delete').click(function(){
            var gid=$(this).data('id');
            $.post("<?php echo U('MyCart/delete');?>",{gid:gid},function(data){
                if(data['status']==1){
                    location.href='<?php echo U("MyCart/mycart");?>';
                }else{
                    location.href='<?php echo U("MyCart/mycart");?>';
                }

            },'json')

        })
        $('.qxdelete').click(function(){
            $.post("<?php echo U('MyCart/qxdelete');?>",function(data){
                if(data['status']==1){
                    location.href='<?php echo U("MyCart/mycart");?>';
                }else{
                    layer.msg("删除失败");
                    location.href='<?php echo U("MyCart/mycart");?>';
                }

            },'json')

        })


        //获取对应按钮的id    /*需要修改*/
        /*$('#dosum').click(function(){
            var sum=$('#sum').text();
            //console.log(sum);return false;//0.00
            $.post("<?php echo U('MyCart/dosum');?>",function(data){
                if(data['status']==2){
                    location.href="<?php echo U('Login/login',array('act'=>3));?>" ;
                }else{
                    if(sum==0)else{
                        $.post("<?php echo U('Order/topay');?>",$('#form1').serialize(),function(data){
                            location.href='<?php echo U("Order/orderGoodsGrade",array("act"=>1));?>';
                        },'json')
                    }
                }
            },'json')
        })*/
        $('#dosum').click(function() {
            var sum = $('#sum').text();
            $.post("<?php echo U('MyCart/dosum');?>",function(data){
                if(sum==0){
                    return false;
                }
                if(data['status']==2){
                    //alert(123);
                    location.href="<?php echo U('Login/login',array('act'=>3));?>" ;
                }else{
                    //alert(321);
                    $.post("<?php echo U('Order/topay');?>",$('#form1').serialize(),function(data){
                        location.href='<?php echo U("Order/orderGoodsGrade",array("act"=>1));?>';
                    },'json')
                }
            },'json')

        })

    })

</script>
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
</html>