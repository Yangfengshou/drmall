<?php if (!defined('THINK_PATH')) exit();?><table class="tablelist" >
    <thead>
    <tr>
        <th>编号</th>
        <th>权限名称</th>
        <th>权限规则</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <form method="post">
        <?php if(is_array($auth_arr)): foreach($auth_arr as $key=>$val): ?><input type="hidden" id="inp" value="<?php echo ($val["id"]); ?>"/>
            <tr>
                <td><?php echo ($val[id]); ?></td>
                <?php if($val[menu_pid] == 0): ?><td style="color: red;font-size: 14px"><?php echo ($val[title]); ?></td>
                    <td style="color: red"><?php echo ($val[name]); ?></td>
                    <?php else: ?>
                    <td><?php echo ($val[title]); ?></td>
                    <td><?php echo ($val[name]); ?></td><?php endif; ?>

                <td><a href="<?php echo U('limit_add',array('auth_id'=>$val[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/>添加</a> |
                    <a href="<?php echo U('limit_edit',array('auth_id'=>$val[id]));?>" class="tablelink" id="edit"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif" data-val='$val[name]' data-name='$val[title]'/>编辑</a> |
                    <a href="javascript:;" class="tablelink" id="delt" ><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/> 删除</a></td>
            </tr><?php endforeach; endif; ?>
    </form>
    </tbody>
</table>
<script>
    $(function(){
        $('#delt').click(function(){
            var  id=$('#inp').val();
            layer.confirm('确定要删除吗？',{btn:['确定','取消'] },function(){
                $.post("<?php echo U('Limit/limit_delt');?>","auth_id="+id,function(data){
                    if(data['status']==1){
                        layer.msg(data['info'],{icon: 5});
                        location.href="<?php echo U('Limit/limit_list');?>";
                    }else{
                        layer.msg(data['info'],{icon: 6});
                    }
                },'json')
            })
        })
    })
</script>