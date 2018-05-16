<?php if (!defined('THINK_PATH')) exit(); if(is_array($member)): foreach($member as $key=>$v): ?><tr>
        <td><?php echo ($v["member_id"]); ?></td>
        <td><?php echo ($v["member_name"]); ?></td>
        <td><?php echo ($v["member_phone"]); ?></td>
        <td><?php echo date('Y-m-d H:i:s',$v[member_registertime]);?></td>
        <td><?php echo date('Y-m-d H:i:s',$v[member_lastlogintime]);?></td>
        <td><?php echo ($v["member_tname"]); ?></td>
        <td><a href="<?php echo U('Member/member_redact',array(id=>$v[member_id]));?>" class="tablelink">编辑</a>
            <a href="#" name="delete" data-id="<?php echo ($v[member_id]); ?>" class="tablelink"> 删除</a></td>
    </tr><?php endforeach; endif; ?>
<script>
    $('a[name=delete]').on('click',function(){
        var member_id=$(this).data('id');
        //这里获得变量的值的时候   要用this   意思就的点谁获得到谁的值
        $.post("<?php echo U('Member/member_delete');?>",{member_id:member_id},function(data){
            layer.msg('删除成功',{icon:6});//这里引用layer插件上边写样式的地方引入layer插件
            //下面这句话 就是收到后台传过来的值  然后进行覆盖
            $('#live').html(data);
        })
    })
    $('.serch').on('click',function(){
        var serch=$('#serch').val();
        $.post("<?php echo U('Member/memberdelete');?>",{serch:serch},function(data){
            $("#alive").html(data);
        })
    })
</script>