<?php if (!defined('THINK_PATH')) exit(); if(is_array($adminlist)): foreach($adminlist as $key=>$v): ?><tr>
        <td style="color:red;font-weight:900;">0000<?php echo ($v[admin_id]); ?>  </td>
        <input type="hidden" value="<?php echo ($v[admin_id]); ?>" id="aid">
        <td><?php echo ($v[admin_username]); ?></td>
        <td style="font-weight:900;color:#15adff;"><?php echo ($v[admin_grade]); ?></td>
        <td><?php echo ($v[admin_name]); ?></td>
        <td><?php echo ($v[phone_number]); ?></td>
        <td><?php echo (date('Y-m-d',$v[admin_addtime])); ?></td>
        <td></td>
        <td></td>
        <td><?php echo ($v[admin_alive]==1?启用:禁用); ?></td>
        <td><a href="" class="tablelink" data-aid="<?php echo ($v[admin_id]); ?>" data-alive="<?php echo ($v[admin_alive]); ?>"><?php if(($v[admin_alive] == 1)): ?>禁用<?php else: ?>启用<?php endif; ?></a>
            <a href="<?php echo U('Admin/admin_alter',array('aid'=>$v[admin_id]));?>" class="tablelink">修改信息</a>
            <a href="" class="tablelink" id="del" data-alive="2" data-aid="<?php echo ($v[admin_id]); ?>" onclick="confirm('你确定要删除吗?')">删除</a>
        </td>
    </tr><?php endforeach; endif; ?>
<script>
    $(function(){
        //点击禁用
        $('.tablelink').on('click',function(){
            var aid=$(this).data('aid');
            var alive=$(this).data('alive');
            $.post("<?php echo U('Admin/admin_alive');?>",{aid:aid,alive:alive},function(data){
                if(alive==1){
                    $("#alive").html(data);
                }else{
                    $("#alive").html(data);
                }
            })
        })
        //点击删除
        $('#del').on('click',function(){
            var alive=$(this).data('alive');
            $.post("<?php echo U('Admin/admin_alive');?>",{alive:alive},function(data){
                if(alive==2){
                    $("#alive").html(data);
                }
            })
        })
    })
</script>