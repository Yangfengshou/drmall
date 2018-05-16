<?php if (!defined('THINK_PATH')) exit();?>
<div class="md-hd">
    <P class="md-p1"><input type="checkbox" name="hobby" value=""/><span>全选</span></P>
    <p class="md-p2">商品信息</p>
    <p class="md-p3">规格</p>
    <p class="md-p4">单价（元）</p>
    <p class="md-p5">金额（元）</p>
    <p class="md-p6">操作</p>
</div>

<!--遍历开始-->

<?php if(is_array($res)): foreach($res as $key=>$v): ?><div class="md-info">

        <div class="dai-con">
            <dl class="dl1">
                <dt>
                    <input type="checkbox" name="hobby" value="" class="f-l"/>
                    <a href="#" class="f-l"><img src="/drmall/Public/home/upload/50/thumb_50_<?php echo ($v[goods_pic]); ?>" /></a>
                <div style="clear:both;"></div>
                </dt>
                <dd>
                    <p><?php echo ($v[goods_name]); ?></p>
                    <span>X <?php echo ($v[goods_buynum]); ?></span>
                </dd>
                <div style="clear:both;"></div>
            </dl>
            <div class="dai-right f-l">
                <P class="d-r-p1">颜色：蓝色<br />尺码：XL</P>
                <p class="d-r-p2">¥ <?php echo ($v[goods_price]); ?></p>
                <p class="d-r-p3">¥ <?php echo ($v[order_price]); ?></p>
                <p class="d-r-p4"><a href="#">移入收藏夹</a><br />
                    <a href="aliPay.html">付款</a></p>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div><?php endforeach; endif; ?>
<!--结束-->