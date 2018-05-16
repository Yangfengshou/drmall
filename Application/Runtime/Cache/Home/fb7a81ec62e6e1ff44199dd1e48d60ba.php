<?php if (!defined('THINK_PATH')) exit(); if(is_array($lists)): foreach($lists as $key=>$gv1): ?><li>
    <div class="li-top">
        <a href="<?php echo U('Goods/goodsdetail',array(gid=>$gv1[goods_id]));?>" title="<?php echo ($gv1[goods_name]); ?>"class="li-top-tu"><img src="/drmall/Public/home/upload/300/thumb_300_<?php echo ($gv1[goods_pic]); ?>" style="width: 235px;height: 135px;"/></a>
        <p class="jiage"><span class="sp1">￥<?php echo ($gv1["goods_price"]); ?></span><span class="sp2">￥<?php echo ($gv1["goods_marketprice"]); ?></span></p>
    </div>
    <p class="miaoshu"><?php echo mb_substr($gv1['goods_name'],0,12,'utf8');?></p>
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
</li><?php endforeach; endif; ?>

<tr>
    <td colspan="4">
        <div class="page">
            <?php echo ($page); ?>
        </div>
    </td>
</tr>