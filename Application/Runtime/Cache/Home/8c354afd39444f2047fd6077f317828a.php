<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.validate.min.js"></script>
</head>
<body>
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
            <form action="<?php echo U('Index/shopserch');?>" method="post">
                <div class="ipt f-l">
                    <input type="text" placeholder="搜索商品..." value="" name="serch" ss-search-show="sp" />
                    <input type="text" placeholder="搜索店铺..." ss-search-show="dp" style="display:none;" />
                </div>
                <button class="f-r" type="submit" style="border-radius:5px;font-size:20px;">搜 索</button>
                <div style="clear:both;"></div>
            </form>
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

<!--nav 开始-->
<div style="border-bottom:2px solid #F09E0B;">
    <div class="nav w1200">
        <a href="JavaScript:;" class="sp-kj" kj="">商品分类快捷</a>
        <div class="kj-show2 none" kj-sh="">

<!--1--><?php if(is_array($cateArr1)): foreach($cateArr1 as $key=>$v1): $res2=M('cate')->field('cate_id,cate_name')->where("cate_pid=$v1[cate_id]")->select(); ?>
            <div class="kj-info1" mg="<?php echo ($v1['cate_name']); ?>">
                <dl class="kj-dl1">
                    <dt><a href="#"><?php echo ($v1['cate_name']); ?></a></dt>
                    <dd>
                        <?php if(is_array($res2)): foreach($res2 as $key=>$v2): echo ($v2[cate_name]); ?>/<?php endforeach; endif; ?>
                    </dd>
                </dl>
                <div class="kj-if-show" mg2="<?php echo ($v1['cate_name']); ?>">
                    <?php if(is_array($res2)): foreach($res2 as $key=>$v2): ?><dl>
                        <!--2-->
                        <dt><?php echo ($v2[cate_name]); ?></dt>
                        <dd>
                            <!--3-->
                            <?php
 $res3=M('cate')->field('cate_id,cate_name')->where("cate_pid=$v2[cate_id]")->select(); ?>
                            <?php if(is_array($res3)): foreach($res3 as $key=>$v3): ?><a href="#"><?php echo ($v3[cate_name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl><?php endforeach; endif; ?>
                </div>
            </div><?php endforeach; endif; ?>
        </div>
        <ul>
            <li><a href="<?php echo U('Index/shopCostume',array(cate_id=>2));?>">服饰</a></li>
            <li><a href="<?php echo U('Index/shopFood',array(cate_id=>3));?>">食品</a></li>
            <li><a href="<?php echo U('Index/shopHouse',array(cate_id=>1));?>">家用电器</a></li>
            <li><a href="<?php echo U('Index/shopGradeActive');?>">积分商城</a></li>
            <li><a href="<?php echo U('Index/shopBrand');?>">品牌专卖</a></li>
            <li><a href="<?php echo U('Index/mallActive');?>">商城活动</a></li>
            <li><a href="<?php echo U('Index/serchShop');?>">热卖专区</a></li>
            <li><a href="#">联系我们</a></li>
            <div style="clear:both;"></div>
        </ul>
        <div style="clear:both;"></div>
    </div>
</div>

<!--内容开始-->
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>家用电器</title>
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/page.css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/shopping-mall-index.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/js/zhonglin.js"></script>
    </head>-->
<title>家用电器</title>

<!--内容开始-->
<!--筛选结果-->
<!--<div class="screening-results w1200">
    <p class="tiao">找到共 233 条</p>
    <div class="results">
        <p class="re-p1 f-l">
            全部结果：零食 > <span>品牌：三只松鼠　X　</span>　>
        </p>
        <div class="re-search f-l">
            <input type="text" placeholder="三只松鼠" class="f-l" />
            <button></button>
            <div style="clear:both;"></div>
        </div>
        <p class="re-p2 f-r">
            <a href="#">清空筛选条件</a>
        </p>
        <div style="clear:both;"></div>
    </div>
</div>-->
<!--品牌-->
<!--<div class="sj-brand">
    <div class="sj-br-l f-l">
        <img src="/drmall/Public/home/images/sj-pingpai-tu.gif" />
    </div>
    <div class="sj-br-m f-l">
        <h3>三只松鼠旗舰店</h3>
        <p>三只松鼠，互联网坚果销量冠军品牌，致力于生产天然新鲜、非过度加工的健康食品</p>
    </div>
    <div class="sj-br-r f-r">
        <a href="#">进店逛逛<br />></a>
    </div>
    <div style="clear:both;"></div>
</div>-->

<!--品牌热销-->
<div class="brand-sales">
    <dl>
        <dt>所有商品</dt>
        <dd>
            <?php if(is_array($catename1)): foreach($catename1 as $key=>$v1): ?><a href="#" class="catename" data-id="<?php echo ($v1[cate_id]); ?>"><?php echo ($v1["cate_name"]); ?></a><?php endforeach; endif; ?>
        </dd>
        <div style="clear:both;"></div>
    </dl>
    <dl style="border-bottom:none;" id="shop_1">
        <dt>大家都在选</dt>
        <dd>
            <a href="#">坚果礼品</a>
            <a href="#">碧根果</a>
            <a href="#">松子</a>
            <a href="#">夏威夷果</a>
            <a href="#">核桃</a>
            <a href="#">葡萄干</a>
            <a href="#">花生</a>
            <a href="#">豆类制品</a>
            <a href="#">杏仁</a>
            <a href="#">枣类</a>
            <a href="#">瓜子</a>
            <a href="#">其他坚果</a>
        </dd>
        <div style="clear:both;"></div>
    </dl>
</div>

<!--内容↓↑-->
<div class="shop-page-con w1200">
    <div class="shop-pg-left f-l" style="width:215px">
        <div class="shop-left-buttom" style="margin-top:0;">
            <div class="sp-tit1">
                <h3>商品推荐</h3>
            </div>
            <ul class="shop-left-ul">
                <!--商品推荐开始  4个-->
                <li>
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="/drmall/Public/home/images/sp-con-r-tu.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1">立即购买</button>
                            <button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="shop-pg-right f-r">
        <div class="shop-right-cmp" style="margin-top:0;">
            <ul class="shop-cmp-l f-l">
                <li class="current"><a href="#">综合 ↓</a></li>
                <li><a href="#">销量 ↓</a></li>
                <li><a href="#">新品 ↓</a></li>
                <li><a href="#">评价 ↓</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div class="shop-cmp-m f-l">
                <span>价格</span><input type="text" /><span>-</span><input type="text" />
            </div>
            <div class="shop-cmp-r f-l">
                <ul class="f-l">
                    <li>
                        <input type="checkbox" name="hobby" value=""/>
                        <span>包邮</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value=""/>
                        <span>进口</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value=""/>
                        <span>仅显示有货</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value=""/>
                        <span>满赠</span>
                    </li>
                    <li>
                        <input type="checkbox" name="hobby" value=""/>
                        <span>满减</span>
                    </li>
                    <div style="clear:both;"></div>
                </ul>
                <button>确定</button>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="shop-right-con">
            <ul class="shop-ul-tu shop-ul-tu1"  id="shop_2">
                <!--商品开始位置  一行4个  3行-->

                <li>
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="/drmall/Public/home/images/sp-con-r-tu.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1">立即购买</button>
                            <button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>
                <li>
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="/drmall/Public/home/images/sp-con-r-tu.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1">立即购买</button>
                            <button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>
                <li style="margin-right:0;">
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="/drmall/Public/home/images/sp-con-r-tu.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1">立即购买</button>
                            <button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>
                <!--<li style="margin-right:0;">
                    <div class="li-top">
                        <a href="#" class="li-top-tu"><img src="/drmall/Public/home/images/sp-con-r-tu.gif" /></a>
                        <p class="jiage"><span class="sp1">￥109</span><span class="sp2">￥209</span></p>
                    </div>
                    <p class="miaoshu">德国原装进口Wurenbacher瓦伦冰黑啤5L/桶</p>
                    <div class="li-md">
                        <div class="md-l f-l">
                            <p class="md-l-l f-l" ap="">1</p>
                            <div class="md-l-r f-l">
                                <a href="JavaScript:;" class="md-xs" at="">∧</a>
                                <a href="JavaScript:;" class="md-xx" ab="">∨</a>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div class="md-r f-l">
                            <button class="md-l-btn1">立即购买</button>
                            <button class="md-l-btn2">加入购物车</button>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <p class="pingjia">88888评价</p>
                    <p class="weike">微克宅购自营</p>
                </li>-->
                <div style="clear:both;"></div>
            </ul>

            <!--分页-->
            <!--<div class="paging">
                <div class="pag-left f-l">
                    <a href="#" class="about left-r f-l"><</a>
                    <ul class="left-m f-l">
                        <li><a href="#">1</a></li>
                        <li class="current"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">100</a></li>
                        <div style="clear:both;"></div>
                    </ul>
                    <a href="#" class="about left-l f-l">></a>
                    <div style="clear:both;"></div>
                </div>
                <div class="pag-right f-l">
                    <div class="jump-page f-l">
                        到第<input type="text" />页
                    </div>
                    <button class="f-l">确定</button>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>-->
        </div>
    </div>

    <div style="clear:both;"></div>
</div>
<!--JQ-->
<script>
    //分页
    function getInputPage() {
        var page = $("#page-num").val();
        var page_url = decodeURI($("#page-submit").attr("data-page"));
        page_url = page_url.replace('[PAGE]', page);
        repage(page_url);
        return false;
    }
    //分页
    function repage(url) {
        if(typeof url == 'undefined') url="<?php echo U('',array('p'=>$_GET['p']));?>";
        $.post(url,function(data){
            $('#shop_2').html(data);
        });
    }
    //商品
    $(document).on('click','.goodsname',function() {
        var _this = this;
        num=$(_this).data('pid')//定义一个全局变量  把获得到的pid的值赋值给它
        $.post("<?php echo U('Index/shop_2');?>",{"cate_pid" :num},function(data){
            $("#shop_2").html(data);
        })
    })
    //换页
    $(document).on('click','.page a',function() {
        var url=this.href
        $.post(url,{"cate_pid" :num},function(res){
            $('#shop_2').html(res);
        })
        return false;
    })
    //分类
    $(document).on('click','.catename',function() {
        var _this = this;
        $.post("<?php echo U('Index/shop_1');?>",{"cate_id" :$(_this).data('id')},function(data){
            $("#shop_1").html(data);
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