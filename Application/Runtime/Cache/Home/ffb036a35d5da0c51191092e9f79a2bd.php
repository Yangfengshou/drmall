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


<!--内容开始-->
<div class="details w1200">
    <div class="deta-info1">
        <div class="dt-if1-l f-l">
            <div class="dt-if1-datu">
                <ul qie-da="">
                    <li><a href="#"><img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" style="width: 350px ;height: 350px"/></a></li>
                    <li><a href="#"><img src="/drmall/Public/home/upload/<?php echo ($picArr[1][pic_name]); ?>" style="width: 350px ;height: 350px"/></a></li>
                    <li><a href="#"><img src="/drmall/Public/home/upload/<?php echo ($picArr[2][pic_name]); ?>" style="width: 350px ;height: 350px"/></a></li>
                    <li><a href="#"><img src="/drmall/Public/home/upload/<?php echo ($picArr[3][pic_name]); ?>" style="width: 350px ;height: 350px"/></a></li>
                    <div style="clear:both;"></div>
                </ul>
            </div>
            <div class="dt-if1-qietu">
                <a class="dt-qie-left f-l" href="JavaScript:(0);"><img src="/drmall/Public/home/images/dt-if1-qietu-left.gif" /></a>
                <div class="dt-qie-con f-l">
                    <ul qie-xiao="">
                        <li class="current"><a href="JavaScript:(0);"><img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" style="width:50px ;height:50px"/></a></li>
                        <li><a href="JavaScript:(0);"><img src="/drmall/Public/home/upload/<?php echo ($picArr[1][pic_name]); ?>" style="width:50px ;height:50px"/></a></li>
                        <li><a href="JavaScript:(0);"><img src="/drmall/Public/home/upload/<?php echo ($picArr[2][pic_name]); ?>" style="width:50px ;height:50px"/></a></li>
                        <li><a href="JavaScript:(0);"><img src="/drmall/Public/home/upload/<?php echo ($picArr[3][pic_name]); ?>" style="width:50px ;height:50px"/></a></li>
                        <div style="clear:both;"></div>
                    </ul>
                </div>
                <a class="dt-qie-right f-r" href="JavaScript:(0);"><img src="/drmall/Public/home/images/dt-if1-qietu-right.gif" /></a>
            </div>
            <div class="dt-if1-fx">
                <span>商品编码:<span style="color:red;">ZKYG-<?php echo ($goodsArr[0][goods_id]); ?></span></span>
                <p>分享到：<a href="JavaScript:(0);"><img src="/drmall/Public/home/images/dt-xl.gif" /></a><a href="#"><img src="/drmall/Public/home/images/dt-kj.gif" /></a><a href="#"><img src="/drmall/Public/home/images/dt-wx.gif" /></a></p>
            </div>
        </div>
        <form action="<?php echo U('Order/orderGoodsGrade');?>" method="post" id="form1">
        <div class="dt-if1-m f-l">
            <div class="dt-ifm-hd">
                <p><a href="#"><?php echo ($goodsArr[0][goods_name]); ?><span style="color:red;font-size:14px;font-weight:900;">&nbsp;<?php echo ($_GET[alive]==2?'限时抢购中！':''); ?></span></a></p>
                <h3><?php echo ($goodsArr[0][goods_nickname]); ?></h3>

            </div>
            <div class="dt-ifm-gojia">
                <dl>
                    <dt><?php echo ($_GET[alive]==2?'抢购价:':'宅购价:'); ?></dt>
                    <dd>
                        <p class="p1">
                            <span class="sp1" id="price">￥<?php echo $_GET[alive]?$limitArr[limit_goodsprice]:$goodsArr[0][goods_price];?></span><span class="sp2"><?php echo ($goodsArr[0][goods_marketprice]); ?></span>
                        </p>
                        <p class="p2">
                            <span class="sp1"><img src="/drmall/Public/home/images/dt-ifm-sp1-img.gif" />5分</span><span class="sp2">共有 2 条评价</span>
                        </p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
            <dl class="dt-ifm-spot">
                <dt>活动</dt>
                <dd>
                    <P><span>手机专享价</span>￥<?php echo ($_GET[alive]==2?$limitArr[limit_goodsprice]:$goodsArr[0][goods_mobileprice]); ?></P>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            </if>
            <dl class="dt-ifm-box1">
                <dt>时间</dt>
                <dd>
                    <select>
                        <option>请选择配送日期</option>
                        <option><?=date('Y-m-d',time()+86400)?></option>
                        <option><?=date('Y-m-d',time()+172800)?></option>
                        <option><?=date('Y-m-d',time()+259200)?></option>
                        <option><?=date('Y-m-d',time()+345600)?></option>
                        <option><?=date('Y-m-d',time()+432000)?></option>
                    </select>
                    <select>
                        <option>请选择配送时段</option>
                        <option>上午</option>
                        <option>下午</option>
                    </select>
                    <p>如果提前两天预定，还可以享受折扣哦！</p>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box6">
                <dt>颜色</dt>
                <dd class="dt-if-dd1" id="color">
                    <?php if(is_array($colorArr)): foreach($colorArr as $k=>$vcolor): ?><a class="goodsdetail <?php echo ($k==0?'current ':''); ?>" href="JavaScript:;"data-gcid="<?php echo ($vcolor[goods_color_id]); ?>" name="gcsid"><?php echo ($vcolor[goods_color_name]); ?>
                        <input type="hidden" name="gcid" value="<?php echo ($vcolor[goods_color_id]); ?>"/></a><?php endforeach; endif; ?>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box6">
                <dt>尺码</dt>
                <dd class="dt-if-dd1" id="size">
                    <?php if(is_array($sizeArr)): foreach($sizeArr as $k1=>$vsize): ?><a class="goodsdetail <?php echo ($k1==0?'current':''); ?>" href="JavaScript:;"data-gsid="<?php echo ($vsize[goods_size_id]); ?>"name="gcsid"><?php echo ($vsize[goods_size_name]); ?>
                        <input type="hidden" name="gsid" value="<?php echo ($vsize[goods_size_id]); ?>"/>
                    </a><?php endforeach; endif; ?>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <dl class="dt-ifm-box3">
                <dt>数量</dt>
                <dd>
                    <a class="box3-left" href="JavaScript:;">-</a>
                    <input type="text" value="1" name="buynum">
                    <a class="box3-right" href="JavaScript:;">+</a>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <div class="dt-ifm-box4">
                <input type="hidden" value="<?php echo ($goodsArr[0][goods_id]); ?>" name="gid"/>
                <input type="hidden" value="<?php echo ($goodsArr[0][goods_price]); ?>" name="price"/>
                <button class="btn1">立即购买</button>
                <button class="btn2"><a href="JavaScript:document.getElementById('form1').action='/drmall/index.php/Home/Goods/../MyCart/Myaddtocar';document.getElementById('form1').submit();">加入购物车</a></button>
                <button type="button" id="btn3" class="btn3">收藏</button>
            </div>
        </div>
        </form>
        <div class="dt-if1-r f-r">
            <div class="dt-ifr-hd">
                <div class="dt-ifr-tit">
                    <h3 style="font-weight:900;font-size:17px;">宅客微购官方旗舰店</h3>
                </div>
                <ul class="dt-ifr-ul1">
                    <li>
                        <p class="p1">5.0 ↑</p>
                        <p class="p2">商品评分</p>
                    </li>
                    <li>
                        <p class="p1">5.0 ↑</p>
                        <p class="p2">商品评分</p>
                    </li>
                    <li>
                        <p class="p1">5.0 ↑</p>
                        <p class="p2">商品评分</p>
                    </li>
                    <div style="clear:both;"></div>
                </ul>
                <div class="dt-ifr-tel">
                    <p>地址：郑州市河南电子上午产业园&nbsp;云和数据</p>
                    <p>TEL：13937220555</p>
                </div>
                <button class="dt-r-btn1">进入店铺</button>
                <button class="dt-r-btn2">收藏店铺</button>
            </div>
            <div class="dt-ifr-fd">
                <div class="dt-ifr-tit">
                    <h3>同类推荐</h3>
                </div>
                <dl>
                    <dt><a href="#"><img src="" /></a></dt>
                    <dd>
                        <a href="#"></a>
                        <p></p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <dl>
                    <dt><a href="#"><img src="" /></a></dt>
                    <dd>
                        <a href="#"></a>
                        <p></p>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="deta-info2">
        <div class="dt-if2-l f-l">
            <div class="if2-l-box1">
                <div class="if2-tit">
                    <h3 style="font-weight:900;">我浏览过的商品</h3>
                </div>
                <ul>
                    <?php if(empty($_SESSION[mname]) != true): if(is_array($browseInfo)): foreach($browseInfo as $key=>$v): ?><li>
                        <a href="#"><img src="/drmall/Public/home/upload/<?php echo ($v[goods_pic]); ?>" width="120" height="120"/></a>

                        <p style="text-align:center;"><a class="if2-li-tit" href="#"><?php echo ($v[goods_name]); ?></a></p>
                    </li><?php endforeach; endif; ?>
                        <?php else: endif; ?>
                </ul>
            </div>
        </div>
        <div class="dt-if2-r f-r">
            <ul class="if2-tit2">
                <li class="current" com-det="dt1"><a href="JavaScript:;">产品信息</a></li>
                <li com-det="dt2"><a href="JavaScript:;">商品评论</a></li>
                <li com-det="dt3"><a href="JavaScript:;">商家信息</a></li>
                <div style="clear:both;"></div>
            </ul>
            <div style="border:1px solid #DBDBDB;" com-det-show="dt1">
                <?php if(is_array($picArr)): foreach($picArr as $key=>$v): ?><div class="if2-tu1">
                    <img src="/drmall/Public/home/upload/<?php echo ($v[pic_name]); ?>" style="margin-top:47px;width:900px;height:900px;" />
                    <div style="clear:both;"></div>
                </div><?php endforeach; endif; ?>
                <!--<div class="if2-tu2">-->
                    <!--<img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" />-->
                    <!--<div style="clear:both;"></div>-->
                <!--</div>-->
                <!--<div class="if2-tu3">-->
                    <!--<img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" />-->
                <!--</div>-->
                <!--<ul class="if2-tu4">-->
                    <!--<li><img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" /></li>-->
                    <!--<li><img src="/drmall/Public/home/upload/<?php echo ($picArr[0][pic_name]); ?>" /></li>-->
                    <!--<li><img src="" /></li>-->
                    <!--<div style="clear:both;"></div>-->
                <!--</ul>-->
            </div>

            <div style="display:none;" com-det-show="dt2">
                <dl class="if2-r-box2">
                    <dt>
                    <p class="box2-p1">好评率</p>
                    <p class="box2-p2">100%</p>
                    <p class="box2-p3">共53967人评论</p>
                    </dt>
                    <dd>
                        <P>买过的人觉得</P>
                        <ul>
                            <li><a href="#">很赞(5766)</a></li>
                            <li><a href="#">价格便宜(2878)</a></li>
                            <li><a href="#">包装不错(7812)</a></li>
                            <li><a href="#">送货快(3674)</a></li>
                            <div style="clear:both;"></div>
                        </ul>
                    </dd>
                    <div style="clear:both;"></div>
                </dl>
                <div class="if2-r-box3">



                    <ul>
                        <li class="current-li"><a href="#">全部（9999+）</a></li>
                        <li><a href="#">好评（9999+）</a></li>
                        <li><a href="#">中评（1245）</a></li>
                        <li><a href="#">差评（34）</a></li>
                        <li><a href="#">图片（9999+）</a></li>
                        <li><a href="#">追加评论（9999+）</a></li>
                        <div style="clear:both;"></div>
                    </ul>
                    <dl>
                        <dt>
                            <a href="#" style="color:red;"><img src="/drmall/Public/home/images/temp.jpg" />稳稳的幸福II</a>
                        </dt>
                        <dd>
                            <a href="#" style="color:red;">评论：</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！</p>
                            <p class="b3-p2">2015-12-12    16:57:22</p>
                            <div class="b3-zuijia">
                                <p class="zj-p1" style="color:red;">追加评论：</p>
                                <p class="zj-p2">宅客微购 值得信赖！！！</p>
                                <p class="zj-p3">2015-12-12    16:57:22</p>
                            </div>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>
                            <a href="#" style="color:red;"><img src="/drmall/Public/home/images/temp.jpg" />稳稳的幸福II</a>
                        </dt>
                        <dd>
                            <a href="#" style="color:red;">评论：</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！</p>
                            <p class="b3-p2">2015-12-12    16:57:22</p>
                            <div class="b3-zuijia">
                                <p class="zj-p1" style="color:red;">追加评论：</p>
                                <p class="zj-p2">宅客微购 值得信赖！！！</p>
                                <p class="zj-p3">2015-12-12    16:57:22</p>
                            </div>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>
                    <dl>
                        <dt>
                            <a href="#" style="color:red;"><img src="/drmall/Public/home/images/temp.jpg" />稳稳的幸福II</a>
                        </dt>
                        <dd>
                            <a href="#" style="color:red;">评论：</a>
                            <p class="b3-p1">赞赞赞赞赞赞赞赞赞赞赞赞赞！！！！</p>
                            <p class="b3-p2">2015-12-12    16:57:22</p>
                            <div class="b3-zuijia">
                                <p class="zj-p1" style="color:red;">追加评论：</p>
                                <p class="zj-p2">宅客微购 值得信赖！！！</p>
                                <p class="zj-p3">2015-12-12    16:57:22</p>
                            </div>
                        </dd>
                        <div style="clear:both;"></div>
                    </dl>

                    <!--分页-->
                    <div class="paging">
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
                    </div>
                </div>
            </div>
            <div class="if2-r-box4" style="display:none;" com-det-show="dt3">
                <div class="b4-tit">
                    <h3>店铺所有商品</h3>
                </div>
                <div class="b4-con1">
                    <a href="#">饼干糕点</a>
                </div>
                <div class="b4-tit">
                    <h3>店铺热销商品</h3>
                </div>
                <ul>
                    <li>
                        <a href="#"><img src="/drmall/Public/home/images/if2-l-box1-tu1.gif" /></a>
                        <a href="#">乐事Lay's 无限薯片（翡翠黄瓜味）104g/罐</a>
                        <p>¥6.90</p>
                    </li>
                    <div style="clear:both;"></div>
                </ul>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>

<script>
   $(function(){
       //商品
       $('.goodsdetail').on('click',function(){
           $(this).addClass('current')
           $(this).siblings().removeClass('current')
           getGoodsPrice()
       })
       getGoodsPrice()
       function getGoodsPrice(){
           var gcid = $(".goodsdetail.current").eq(0).data('gcid');
           var gsid = $(".goodsdetail.current").eq(1).data('gsid');
           var gid=$("input[name='gid']").val();
           $.post("<?php echo U('Goods/goodsprice');?>",
                   {gid:gid,gcid:gcid,gsid:gsid},
                   function(res){
                       $('#price').html("￥"+res['goods_detail_price']);
                   },'json')
       }
       //收藏
           $('.btn3').click(function(){
               var gid=$('input[name="gid"]').val();
              /* var data=$(this).html()*///if(data['status']==0)
               $.post("<?php echo U('Goods/colet');?>",{gid:gid},function(data){
                   if(data['status']==2){
                       location.href="<?php echo U('Login/login');?>";
                   }else{
                       if (data['status'] == 1) {
                           layer.tips("商品已收藏",'.btn3',{tips:[1,'orange']});
                           $("#btn3").html('已收藏')
                           return false;
                       }else{
                           layer.tips("已取消收藏",'.btn3',{tips:[1,'orange']});
                           $(".btn3").html('收藏')
                           return false;
                       }
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