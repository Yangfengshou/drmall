<?php if (!defined('THINK_PATH')) exit(); if(is_array($catelist)): foreach($catelist as $key=>$v): ?><tr>
        <td><?php echo ($v["cate_id"]); ?></td>
        <td><?php echo ($v["cate_name"]); ?></td>
        <td><?php echo ($v["cate_pid"]); ?></td>
        <?php if($v[active] == 1): ?><td><a>已上架</a></td>
            <?php else: ?>
            <td><a style="color: #808080">已下架</a></td><?php endif; ?>
        <td><a href="<?php echo U('Cate/cate_edit',array('cate_id',$v[cate_id]));?>" class="tablelink">编辑</a>
            <a href="#" data-id="<?php echo ($v[cate_id]); ?>" data-alive="<?php echo ($v[active]); ?>" id="tablelink" class="tablelink">
                <?php if($v[active] == 1): ?>下架<?php else: ?>上架<?php endif; ?></a></td>
    </tr><?php endforeach; endif; ?>
<script>
    //上下架
    $('#tablelink').bind('click',function() {
        var cate_id=$(this).data('id');
        var cate_alive=$(this).data('alive');
        $.post("<?php echo U('Cate/cate_delete');?>",{cate_id:cate_id,cate_alive:cate_alive},function(data){
            if(cate_alive==1){
                layer.msg('该类下架成功',{icon:5});
                $("#alive").html(data);
            }else{
                layer.msg('该类上架成功',{icon:6});
                $("#alive").html(data);
            }
        })
    })

</script>