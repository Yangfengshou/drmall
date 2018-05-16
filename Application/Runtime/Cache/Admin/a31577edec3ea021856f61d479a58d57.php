<?php if (!defined('THINK_PATH')) exit(); if(is_array($goodslist)): foreach($goodslist as $key=>$v): ?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($v["goods_id"]); ?></td>
        <td><?php echo mb_substr($v['goods_name'],0,12,'utf8');?></td>
        <td><img src="/drmall/Public/upload/50/thumb_50_<?php echo ($v["goods_pic"]); ?>" /></td>
        <td><?php echo ($v["goods_nickname"]); ?></td>
        <td><?php echo ($v["goods_marketprice"]); ?></td>
        <td><?php echo ($v["goods_mobileprice"]); ?></td>
        <?php $catename=getCateName($v['cate_id']); ?>
        <?php if(is_array($catename)): foreach($catename as $key=>$v1): ?><td><?php echo ($v1["cate_name"]); ?> / <?php echo ($v1["cate_id"]); ?></td><?php endforeach; endif; ?>
        <td><?php echo ($v["goods_salednum"]); ?></td>
        <td><?php echo ($v["color"]); ?> / <?php echo ($v["size"]); ?></td>
        <td><a><?php if($v[goods_alive] == 1): ?>已上架
            <?php else: ?>
            已下架<?php endif; ?></a></td>
        <td><?php echo date('Y-m-d H:i:s',$v['goods_addtime']);?></td>
        <td><a href="<?php echo U('Goods/goods_edit');?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
            <a href="#" class="tablelink" data-id="<?php echo ($v[goods_id]); ?>" data-alive="<?php echo ($v[goods_alive]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/><?php if($v[goods_alive] == 1): ?>下架
                <?php else: ?>
                上架<?php endif; ?></a>
        </td>
    </tr><?php endforeach; endif; ?>
<script>
    $('.tablelink').bind('click',function() {
        var goods_id=$(this).data('id');
        var goods_alive=$(this).data('alive');
        $.post("<?php echo U('Goods/goods_alive');?>",{goods_id:goods_id,goods_alive:goods_alive},function(data){
            if(goods_alive==1){
                layer.msg('商品下架成功',{icon:5});
                $("#alive").html(data);
            }else{
                layer.msg('商品上架成功',{icon:6});
                $("#alive").html(data);
            }
        })
    })
</script>