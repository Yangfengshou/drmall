<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>宅客微购</title>
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/index.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
    <script src="/drmall/Public/home/js/jquery.min.js"></script>
    <link rel="shortcut icon" href="/drmall/bitbug_favicon(1).ico"/>
</head>
<body>
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <!--<?php print_r($_SESSION[mname])?>-->
        <?php if($_SESSION[mid] > 0): ?><p class="t-con-l f-l">您好&nbsp;<span style="color: red;"><a id="myname" href="<?php echo U('Member/mail');?>"><?php echo $_SESSION[mname];?></a></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Login/loginOut');?>">&nbsp;退出</a></p>
            <?php else: ?>
            <p class="t-con-l f-l">您好<span style="color: red;">游客<?php echo mt_rand(600,930);?></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Login/login');?>">&nbsp;&nbsp;亲,请登录</a></p><?php endif; ?>
            <p class="t-con-l f-l"><a href="<?php echo U('Login/register');?>">&nbsp;免费注册</a></p>
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
    <div class="dianji f-r">
        <div class="btn1">
            <button class="btn1-l"><a href="Login/register" style="color:orange">注册</a></button>
            <button class="btn1-r"><a href="Login/login" style="color:orange;">登录</a></button>
            <div style="clear:both;"></div>
        </div>
        <button class="btn2">商家入口    ></button>
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
            <button class="f-r" style="border-radius:5px;font-size:20px;">搜 索</button>
            <div style="clear:both;"></div>
        </div>
        <ul class="sp2">
            <?php if(is_array($clicklist)): foreach($clicklist as $key=>$vc): ?><li><a href="<?php echo U('Goods/goodsdetail',array('gid'=>$vc[goods_id]));?>"><?php echo ($vc["goods_nickname"]); ?></a></li><?php endforeach; endif; ?>
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

<!--nav 开始-->

<div class="nav w1200">
    <a href="JavaScript:;" class="sp-kj" kj="">
        商品分类快捷
    </a>
    <div class="kj-show">
    </div>
    <div class="kj-show2 none" kj-sh="">
        <?php if(is_array($cateArr1)): foreach($cateArr1 as $key=>$v1): $res2=M('cate')->field('cate_id,cate_name')->where("cate_pid=$v1[cate_id]")->select(); ?>
            <div class="kj-info1" mg="<?php echo ($v1['cate_name']); ?>">
                <dl class="kj-dl1">
                    <dt>
                        <a href="#"><?php echo ($v1['cate_name']); ?></a>
                    </dt>
                    <dd>
                        <?php if(is_array($res2)): foreach($res2 as $key=>$v2): echo ($v2[cate_name]); ?>/<?php endforeach; endif; ?>
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="<?php echo ($v1['cate_name']); ?>">

                    <!--2-->
                    <?php if(is_array($res2)): foreach($res2 as $key=>$v2): ?><dl>
                            <dt><?php echo ($v2[cate_name]); ?></dt>
                            <dd>
                                <!--3-->
                                <?php
 $res3=M('cate')->field('cate_id,cate_name')->where("cate_pid=$v2[cate_id]")->select(); ?>
                                <?php if(is_array($res3)): foreach($res3 as $key=>$v3): ?><a href="#"><?php echo ($v3[cate_name]); ?></a><?php endforeach; endif; ?>
                            </dd>
                            <div style="clear:both;"></div>
                        </dl><?php endforeach; endif; ?>
                    <!--
                                    <dl style="border-bottom:none;">
                                        <dt>零食/糖果/巧克力</dt>
                                        <dd>
                                            <a href="#">坚果迷线</a>
                                            <a href="#">膨化食品</a>
                                            <a href="#">糖果果冻/巧克力/口香糖</a>
                                            <a href="#">肉类/熟食食品</a>
                                            <a href="#">进口食品</a>
                                        </dd>
                                        <div style="clear:both;"></div>
                                    </dl>
                                    -->
                </div>
            </div><?php endforeach; endif; ?>
    </div>
    <ul>
        <li><a href="shopCostume/cate_id/2">服饰</a></li>
        <li><a href="shopFood/cate_id/3">食品</a></li>
        <li><a href="shopHouse/cate_id/1">家用电器</a></li>
        <li><a href="shopGradeActive.html">积分商城</a></li>
        <li><a href="shopBrand.html">品牌专卖</a></li>
        <li><a href="mallActive.html">商城活动</a></li>
        <li><a href="serchShop.html">热卖专区</a></li>
        <li><a href="#">联系我们</a></li>
        <div style="clear:both;"></div>
    </ul>
    <div style="clear:both;"></div>
</div>

<!--banner 开始-->
<div class="banner-box">
    <div class="banner w1200">
        <ul>
            <?php if(is_array($bannerArr)): foreach($bannerArr as $key=>$v): ?><li><img src="/drmall/Public/home/upload/banner/<?php echo ($v[banner_pic]); ?>" /></li><?php endforeach; endif; ?>
            <div style="clear:both;"></div>
        </ul>
        <a href="JavaScript:;" class="bnr bnr-left" style="opacity:0.2;"><</a>
        <a href="JavaScript:;" class="bnr bnr-right" style="opacity:0.2;">></a>
    </div>
</div>

<div class="index_ms">
    <div class="ms-div1"><p>限时秒杀▼</p></div>
    <div class="ms-div2"><p>&nbsp;总有你想不到的惊喜►</p></div>
    <div class="ms-div3"><p>当前场次</p></div>
    <div class="ms-div4"><p>后结束抢购</p></div>
    <div class="ms-div-box">
        <div class="ms-div-h"><span id="hideH"><strong id="RemainH"></strong></span></div>
        <div class="ms-div-k1">:</div>
        <div class="ms-div-m"><span id="hideM"><strong id="RemainM"></strong></span></div>
        <div class="ms-div-k2">:</div>
        <div class="ms-div-s"><span id="hideS"><strong id="RemainS"></strong></span></div>
    </div>
</div>
<div class="ms-goods">
    <ul class="ms-ul">
        <?php if(is_array($limitGoods)): foreach($limitGoods as $key=>$v): ?><a href="<?php echo U('Goods/goodsdetail',array('gid'=>$v[goods_id],'alive'=>$v[goods_alive]));?>"><li class="ms-li">
                <div class="ms-goods-img">
                    <img class="ms-img" src="/drmall/Public/home/upload/index-img/<?php echo ($v[limit_goodspic]); ?>">
                    <div class="goods-data1"><span class="ms-span1"><p style="font-size:12px;"><?php echo ($v[goods_name]); ?></span><span style="color:red;font-size:15px;font-weight:bold;"><br>￥<?php echo ($limitGoods[0][goods_alive]==2?$v[limit_goodsprice]:$v[goods_price]); ?>&nbsp;<span style="text-decoration:line-through;font-size:12px;color:#808080;">￥<?php echo ($v[goods_marketprice]); ?></span></span></p></div>
                    <div class="ms-quikly"><?php echo ($limitGoods[0][goods_alive]==2?立即抢购:''); ?><span style="color:#808080;"><?php echo ($limitGoods[0][goods_alive]==2?'':'已结束抢购'); ?></span></div>
                </div>
            </li></a><?php endforeach; endif; ?>
        <div class="ms-goods-img2">
            <a href="<?php echo U('Goods/goodsdetail',array('gid'=>15));?>"><img src="/drmall/Public/home/upload/index-img/ms-img11.jpg"></a>
            <div class="goods-data3"><p style="font-size:15px;font-weight:900;">吉普战车休闲皮鞋</p><p style="font-size:15px;"></span><span style="color:red;font-size:16px;font-weight:bold;"><br>￥???&nbsp;<span style="text-decoration:line-through;font-size:14px;color:#808080;">￥<?php echo ($v[goods_marketprice]); ?></span></span></p><span style="font-size:15px;font-weight:900;color:red;">即将开始抢购</span></div>
        </div>
    </ul>
</div>

<a href="#m"></a>
<div style="width:20px;height:20px;position:fixed;background-color: #ff0000;"></div>
<!--专栏1-->
<!--专栏标题-->
<hr style="border:1px solid;color:lightgray;width:1200px;">
<div class="zl_top">
<ul>
    <li><div class="zl_one">新品上市<span style="margin-left:120px;font-size:15px;">发现品质生活►</span></div></li>
    <li><div class="zl_two">精品专辑<span style="margin-left:120px;font-size:15px;">甄选优质商品►</span></div></li>
    <li><div class="zl_three">排行榜<span style="margin-left:120px;font-size:15px;">您的购物指南►</span></div></li>
</ul>
</div>
<!--专栏商品-->
<div class="zl_goods">
<ul>
    <li><div class="zl_goods1">
        <ul>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58f1a669Nf78a8a75.jpg!q70.jpg"></a><span><p>LUXLEAD碎花连衣裙</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/5907349aN70d07312.jpg!q70.jpg"></a><span><p>LUXLEAD洛诗琳雪纺衫</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58f96bbcN64eef883.jpg!q70.jpg"></a><span><p>蒂凡尼女包</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/553da250N5517e906.jpg!q70.jpg"></a><span><p>索尼无线立体声耳机</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/590f3919N33b8d546.jpg!q70.jpg"></a><span><p>ONEBUYE连衣裙</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/592f8505N7a2ee431.jpg!q70.jpg"></a><span><p>ARMANI精致时尚女表</p></span></div></li>
        </ul>
    </div></li>
    <li><div class="zl_goods2">
        <ul>
            <li><span class="zl_goods2-span1"><p>夏季Polo衫,穿出绅士范</p></span></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58749eaaNfc0ca7d1.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/59081413Nd1c5751c.jpg!q70.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58772453Nb8e3a11f.jpg"></a></div></li>
            <li><span class="zl_goods2-span2"><p>淑女系带连衣裙,甜美可爱气质佳</p></span></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58f1c7d1N2be758d0.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58cf6562N9443f8ad.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/5936992eN3da6d213.jpg"></a></div></li>
            <li><span class="zl_goods2-span2"><p>夏季晨跑少不了轻型运动鞋</p></span></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/56ea7840N2849520e.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58cfe809N5778ef42.jpg"></a></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/58969378Nbb70c8a9.jpg"></a></div></li>

        </ul>
    </div></li>
    <li><div class="zl_goods3">
        <ul>
            <li><p>NO.1</p><div><a href=""><img src="/drmall/Public/home/upload/index-img/58f1a669Nf78a8a75.jpg!q70.jpg"></a><span><p>LUXLEAD碎花连衣裙</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/5907349aN70d07312.jpg!q70.jpg"></a><span><p>LUXLEAD洛诗琳雪纺衫</p></span></div></li>
            <li><p>NO.2</p><div><a href=""><img src="/drmall/Public/home/upload/index-img/58f96bbcN64eef883.jpg!q70.jpg"></a><span><p>蒂凡尼女包</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/553da250N5517e906.jpg!q70.jpg"></a><span><p>索尼无线立体声耳机</p></span></div></li>
            <li><p>NO.3</p><div><a href=""><img src="/drmall/Public/home/upload/index-img/590f3919N33b8d546.jpg!q70.jpg"></a><span><p>ONEBUYE连衣裙</p></span></div></li>
            <li><div><a href=""><img src="/drmall/Public/home/upload/index-img/592f8505N7a2ee431.jpg!q70.jpg"></a><span><p>ARMANI精致时尚女表</p></span></div></li>
        </ul>
    </div></li>
</ul>
</div>







<!--专栏2-->
<div class="property w1200 mt20">
    <div class="title1">
        <h3><span style="color:#7DB92D;">连衣裙<!--<?php echo ($catename1[0][cate_name]); ?>--></span></h3>
        <ul>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    <div class="prt-con">
        <div class="prt-con-l f-l">
                <a href="#"><div class="img-div1"><img src="/drmall/Public/home/images/01cd2ec830b30840586f5d419272d71e.jpg"/></div></a>
            <div class="prt-l-b">
                <a href="#"></a>
            </div>
        </div>
        <ul class="prt-con-r f-l">

            <?php if(is_array($goodsArr1)): foreach($goodsArr1 as $key=>$v01): ?><li>
                <a href="<?php echo U('Goods/goodsdetail',array(gid=>$v01[goods_id]));?>" title="<?php echo ($v01[goods_name]); ?>"><div class="img-div"><img src="/drmall/Public/home/upload/300/thumb_300_<?php echo ($v01[goods_pic]); ?>" class="index-img"/></div></a>
                <h3>
                    <span class="sp1"><?php echo ($v01["goods_nickname"]); ?></span>
                    <span class="sp2"></span>

                </h3>
                <a href="#" class="prt-tit" title="<?php echo ($v01[goods_name]); ?>"><?php echo mb_substr($v01['goods_name'],0,11,'utf8');?></a>
                <p>￥<?php echo ($v01["goods_price"]); ?>元</p>
            </li><?php endforeach; endif; ?>
            <div style="clear:both;"></div>
        </ul>
    </div>
</div>


<div class="property w1200 mt20">
    <div class="title1">
        <h3><span style="color:#7DB92D;">精品连衣裙</span></h3>
        <ul>
            <li><a href="#">公寓</a></li>
            <li><a href="#">复式</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
    <div class="prt-con">
        <div class="prt-con-l f-l">
            <div class="prt-l-t">
                <a href="#"><img src="/drmall/Public/home/images/90661e302c0278ea102fe583723b626b.jpg" /></a>
            </div>
            <div class="prt-l-b">
                <a href="#"></a>

            </div>
        </div>
        <ul class="prt-con-r f-l">
            <?php if(is_array($goodsArr1)): foreach($goodsArr1 as $key=>$v01): ?><li>
                    <a href="<?php echo U('Goods/goodsdetail',array(gid=>$v01[goods_id]));?>" title="<?php echo ($v01[goods_name]); ?>"><div class="img-div"><img src="/drmall/Public/home/upload/300/thumb_300_<?php echo ($v01[goods_pic]); ?>" class="index-img"/></div></a>
                    <h3>
                        <span class="sp1"><?php echo ($v01["goods_nickname"]); ?></span>
                        <span class="sp2"></span>

                    </h3>
                    <a href="#" class="prt-tit" title="<?php echo ($v01[goods_name]); ?>"><?php echo mb_substr($v01['goods_name'],0,11,'utf8');?></a>
                    <p>￥<?php echo ($v01["goods_price"]); ?>元</p>
                </li><?php endforeach; endif; ?>
        </ul>
        <div style="clear:both;"></div>
    </div>
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
    <a href="#" style="position:relative;left:95%;">返回顶部</a>
<!--底部 版权-->
<div class="footer w1200">
    <p>
        <input type="hidden" id="overtime" value="<?php echo ($overtime); ?>"/>
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
<a name="m" style="">123</a>
</body>
<script language="JavaScript">
    var runtimes = 0;
    function GetRTime(){
        // var nMS=24*60*60+60*60+60+1;// 1天 1小时 1分钟 1秒   的秒
        var nMS =$("#overtime").val()*1-runtimes;
        /*console.log(nMS);
        return false;*/
        if (nMS>=0){
            var nD=Math.floor(nMS/(60*60*24))%24;//floor向下取入  //天
            var nH=Math.floor(nMS/(60*60))%24;//小时
            var nM=Math.floor(nMS/(60)) % 60;//分钟
            var nS=Math.floor(nMS) % 60;//秒
            $("#RemainD").html(nD);
            $("#RemainH").html(nH);
            $("#RemainM").html(nM);
            $("#RemainS").html(nS);
            runtimes++;
            if(nD==0){
                //天数0 隐藏天数
                $("#hideD").hide();
                if(nH==0){
                    //数0 隐藏天数
                    $("#hideH").hide();
                    if(nM==0){
                        $("#hideM").hide();
                        if(nS==0){
                        }
                    }
                }
            }
            //计时器
            setTimeout(function(){
                GetRTime();
            },1000);
        }
    }
    $(function () {
        GetRTime();
    });
</script>
</html>