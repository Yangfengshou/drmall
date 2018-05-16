<?php if (!defined('THINK_PATH')) exit();?><dt><?php echo ($catename[0][cate_name]); ?></dt>
<dd>
    <?php if(is_array($catename2)): foreach($catename2 as $key=>$v2): ?><a href="#" data-pid="<?php echo ($v2[cate_id]); ?>" class="goodsname"><?php echo ($v2["cate_name"]); ?></a><?php endforeach; endif; ?>
</dd>
<div style="clear:both;"></div>