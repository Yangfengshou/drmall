<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>

<body>
<!--top 开始-->
<div class="top">
    <div class="top-con w1200">
        <?php if(empty($_SESSION[mname]) != true): ?><p class="t-con-l f-l">您好&nbsp;<span style="color: red;"><a id="myname" href="<?php echo U('Home/Member/mail');?>"><?php echo $_SESSION[mname];?></a></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Home/Login/loginOut');?>">&nbsp;退出</a></p>
            <?php else: ?>
            <p class="t-con-l f-l">您好<span style="color: red;">游客<?php echo mt_rand(600,930);?></span>，欢迎来到宅客微购</p>
            <p class="t-con-l f-l"><a href="<?php echo U('Home/Login/login');?>">&nbsp;&nbsp;亲,请登录</a></p><?php endif; ?>
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

<!--nav 开始-->
<div style="border-bottom:2px solid #F09E0B;">
    <div class="nav w1200">
        <a href="JavaScript:;" class="sp-kj" kj="">
            商品分类快捷
        </a>
        <div class="kj-show2 none" kj-sh="">
            <div class="kj-info1" mg="shiping">
                <dl class="kj-dl1">
                    <dt><a href="#">食品/饮料/酒水</a></dt>
                    <dd>
                        零食/糖果/巧克力、饼干/糕点、生鲜<br />
                        酒水饮料/乳饮料、调味/速食<br />
                        粮油/干货、冲调制品
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="shiping">
                    <dl>
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
                    <dl>
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
                    <dl>
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
                    <dl>
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
                    <dl>
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
                </div>
            </div>
            <div class="kj-info1" mg="muying">
                <dl class="kj-dl1">
                    <dt><a href="#">母婴用品/玩具</a></dt>
                    <dd>
                        奶粉/辅食、尿裤/湿巾、玩具<br />
                        宝宝喂养/洗护清洁
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="muying">
                    <dl>
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">巧克力</a>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">巧克力</a>
                            <a href="#">巧克力</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">巧克力</a>
                            <a href="#">膨化食品</a>
                            <a href="#">口香糖</a>
                            <a href="#">巧克力</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">巧克力</a>
                            <a href="#">膨食品</a>
                            <a href="#">糖克力/口香糖</a>
                            <a href="#">肉品</a>
                            <a href="#">巧克力</a>
                            <a href="#">进口食品</a>
                            <a href="#">巧克力</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">巧克力</a>
                            <a href="#">坚果线</a>
                            <a href="#">巧克力</a>
                            <a href="#">膨食品</a>
                            <a href="#">果冻/克口香糖</a>
                            <a href="#">巧克力</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">巧克力</a>
                            <a href="#">进食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">迷线</a>
                            <a href="#">巧克力</a>
                            <a href="#">膨化品</a>
                            <a href="#">巧克力</a>
                            <a href="#">糖果力/口香糖</a>
                            <a href="#">巧克力</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl style="border-bottom:none;">
                        <dt>母婴用品/玩具</dt>
                        <dd>
                            <a href="#">迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果克力/口香糖</a>
                            <a href="#">肉类/熟品</a>
                            <a href="#">进食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                </div>
            </div>
            <div class="kj-info1" mg="chuju">
                <dl class="kj-dl1">
                    <dt><a href="#">厨具餐具/家用清洁/纸品</a></dt>
                    <dd>
                        纸品湿巾、衣物清洁护理、家庭清洁<br />
                        清洁、厨具、烹饪用具/厨房配件<br />
                        食物保鲜容器
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="chuju">
                    <dl>
                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>

                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl style="border-bottom:none;">
                        <dt>厨具餐具</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                </div>
            </div>
            <div class="kj-info1" mg="meizhuang">
                <dl class="kj-dl1">
                    <dt><a href="#">美妆洗护/个人护理洗发护发</a></dt>
                    <dd>
                        洗浴用品/身体护理、口腔护理、面部护肤<br />
                        女性护理、彩妆/美容工具、男士护理
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="meizhuang">
                    <dl>
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl style="border-bottom:none;">
                        <dt>美妆洗护</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                </div>
            </div>
            <div class="kj-info1" style="border-bottom:none;" mg="jiafang">
                <dl class="kj-dl1" style="padding:6px 10px;">
                    <dt><a href="#">家居/家纺</a></dt>
                    <dd>
                        浴室用品、餐具水具<br />
                        收纳/居家日用、针织纺品
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="jiafang">
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>

                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl style="border-bottom:none;">
                        <dt>家居/家纺</dt>
                        <dd>
                            <a href="#">坚果迷线</a>
                            <a href="#">膨化食品</a>
                            <a href="#">糖果果冻/巧克力/口香糖</a>
                            <a href="#">肉类/熟食食品</a>
                            <a href="#">进口食品</a>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                </div>
            </div>
        </div>
        <ul>
            <li><a href="#">在线商城</a></li>
            <li><a href="#">餐饮娱乐</a></li>
            <li><a href="#">家政服务</a></li>
            <li><a href="#">美容美发</a></li>
            <li><a href="#">教育培训</a></li>
            <li><a href="#">汽车房产</a></li>
            <li><a href="#">家居建材</a></li>
            <li><a href="#">二手市场</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--内容开始-->
<div class="personal w1200">
    <div class="personal-left f-l">
        <div class="personal-l-tit">
            <h3>个人中心</h3>
        </div>
        <ul>
            <li class="current-li per-li1"><a href="mail.html">消息中心<span>></span></a></li>
            <li class="per-li2"><a href="info.html">个人资料<span>></span></a></li>
            <li class="per-li3"><a href="myorder.html">我的订单<span>></span></a></li>
           <!-- <li class="per-li4"><a href="yuyue.html">我的预约<span>></span></a></li>-->
            <li class="per-li5"><a href="cart.html">购物车<span>></span></a></li>
            <li class="per-li6"><a href="shouhuo.html">管理收货地址<span>></span></a></li>
            <li class="per-li7"><a href="collectShop.html">商品收藏<span>></span></a></li>
            <li class="per-li8"><a href="goumaijilu.html">购买记录<span>></span></a></li>
            <li class="per-li9"><a href="lookHistory.html">浏览记录<span>></span></a></li>
            <li class="per-li10"><a href="vip.html">会员积分<span>></span></a></li>
        </ul>
    </div>
    
    <div class="personal-r f-r">
        <form method="post" id="form1" action="<?php echo U('Member/info');?>" enctype="multipart/form-data">
        <div class="personal-right">
            <div class="personal-r-tit">
                <h3>个人资料</h3>
            </div>
            <div class="data-con">
                <div class="dt1">
                    <p class="f-l">当前头像：</p>
                    <div class="touxiang f-l">
                        <div class="tu f-l">
                            <a href="#">
                                    <img src="/drmall/Public/upload/info/<?php echo ($value["member_pic"]); ?>" id='show'/>
                            </a>
                        </div>
                        <input  id="file" name="pic" onchange="c()" type="file"/>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">昵称：</p>
                    <input type="text" name="username" value="<?=session('mname');?>" readonly/>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">用户名：</p>
                    <input type="text" name="tname" value="<?php echo ($value['member_tname']); ?>"/>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt2">
                    <p class="dt-p f-l">性别：</p>
                    <!--<?php echo $_POST['opt']==0?'selected':''; ?>-->
                    <input type="radio" name="sex" value="男" style="width: 15px;" <?php echo $value['member_sex']=='男'?'checked':'';?>/><span style="font-size: 16px">男</span>
                    <input type="radio" name="sex" value="女" style="width: 15px;"<?php echo $value['member_sex']=='女'?'checked':'';?>/><span style="font-size: 16px">女</span>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">年龄：</p>
                    <input type="text" name="age" value="<?php echo ($value['member_age']); ?>" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt3">
                    <p class="dt-p f-l">手机号：</p>
                    <input type="text" value="" name="phone" placeholder="请输入正确的手机号" />
                    <button>获取短信验证码</button>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">验证码：</p>
                    <input type="text" value="" />
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1">
                    <p class="dt-p f-l">邮箱：</p>
                    <input type="text" name="mail" value="<?php echo ($value['member_mail']); ?>" /><span></span>
                    <div style="clear:both;"></div>
                </div>
                <div class="dt1 dt4">
                    <p class="dt-p f-l">密码：</p>
                    <input type="text" name="pwd" placeholder="请输入密码"/>
                    <input type="button" id="xgpwd" value="修改密码" style="width: 80px;background-color: orange;font-size: 1px;color: #fff"/>
                    <div style="clear:both;"></div>
                </div>
                <input type="hidden">
                <input class="btn-pst" type="submit" value="保存" />
            </div>
            </div>
        </form>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<script type="text/javascript">
    $(function(){
        jQuery.validator.addMethod("mobile", function(value, element) {
            var mobileReg = /^1[34578]{1}[0-9]{9}$/;
            return this.optional(element) || (mobileReg.test(value));
        }, "请正确填写您的手机号码");
        $('#form1').validate({
            //设置验证信息：
            rules:{
                mail:{
                    required:true,
                    email:true
                },
                phone:{
                    required:true,
                    mobile:true
                }
            },
            //设置提醒信息：
            messages:{
                mail:{
                    required:"邮箱不能为空",
                    email:"邮箱格式不正确"
                },
                phone:{
                    required:"电话不能为空",
                    mobile:"请正确输入您的手机号"
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
        /*$(".btn-pst").click(function(){
            $.post("<?php echo U('Member/MyInfo');?>",$("#form1").serialize(),function(data){
                if(data['status']==1){
                    layer.msg(data['info'],{icon:6});
                    location.href="<?php echo U('/Home/Member/info');?>";
                }else{
                    layer.msg(data['info'],{icon:5})
                }
            },'json');
        });*/
        $("#xgpwd").click(function(){
            var password=$('input[name="pwd"]').val();
            if(password){
                $.post("<?php echo U('Member/xgpwd');?>",{password:password},function(data){
                    if(data['status']==1){
                        $('input[name="pwd"]').val('');
                        layer.msg(data['info'],{icon:6});
                    }else{
                        layer.msg(data['info'],{icon:5})
                    }
                },'json');
            }else{
                layer.msg("密码为空",{icon:5})
            }
        })
    })
</script>
<script type="text/javascript">
    function c () {
        var r= new FileReader();
        f=document.getElementById('file').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show').src=this.result;
        };
    }
</script>



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
</html>