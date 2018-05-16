<?php if (!defined('THINK_PATH')) exit();?><table class="tablelist">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>管理组名称</th>
                    <th>成员</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="alive">
                <?php if(is_array($group_arr)): foreach($group_arr as $key=>$v): ?><input type="hidden" id="inp" value="<?php echo ($v["id"]); ?>"/>
                    <tr>
                        <td><?php echo ($v[id]); ?></td>
                        <td><?php echo ($v[title]); ?></td>
                        <td style="color: #009900"><?php if(is_array($v["admin_username"])): foreach($v["admin_username"] as $key=>$val): ?>*<?php echo ($val); endforeach; endif; ?>
                        </td>

                        <td>
                            <a href="<?php echo U('group_add',array('group_id'=>$val[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/>分配权限 |</a>
                            <a href="<?php echo U('group_edit',array('group_id'=>$val[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑 |</a>
                            <a href="javascript:;" class="tablelink" id="delt"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/>删除</a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
<script>
    $(function(){
        /*删除*/
        $('#delt').click(function(){
            var  id=$('#inp').val();
            layer.confirm('确定要删除吗？',{btn:['确定','取消'] },function(){
                $.post("<?php echo U('Limit/group_delt');?>","group_id="+id,function(data){
                    if(data['status']==1){
                        layer.msg(data['info'],{icon: 5});
                        location.href="<?php echo U('Limit/group_list');?>";
                    }else{
                        layer.msg(data['info'],{icon: 6});
                    }
                },'json');
            })
        })
        /*查询*/
        $('#scbtn').click(function(){
            $.post("<?php echo U('Limit/group_serch');?>",$('#form1').serialize(),function(data){
                $('.tablelist').html(data);
            });
        })
    })
</script>