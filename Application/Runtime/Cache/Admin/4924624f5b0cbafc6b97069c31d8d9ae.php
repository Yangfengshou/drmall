<?php if (!defined('THINK_PATH')) exit(); if(is_array($member)): foreach($member as $key=>$v): ?><tr>
        <td><?php echo ($v["member_id"]); ?></td>
        <td><?php echo ($v["member_name"]); ?></td>
        <td><?php echo ($v["member_phone"]); ?></td>
        <td><?php echo date('Y-m-d H:i:s',$v[member_registertime]);?></td>
        <td><?php echo date('Y-m-d H:i:s',$v[member_lastlogintime]);?></td>
        <td><?php echo ($v[member_alive]==1?使用中:已冻结); ?></td>
        <td><a href="" class="tablelink" data-mid="<?php echo ($v[member_id]); ?>" data-alive="<?php echo ($v[member_alive]); ?>"><?php if(($v[member_alive] == 1)): ?>冻结<?php else: ?>激活<?php endif; ?></a>
            <a href="<?php echo U('Member/member_redact',array(id=>$v[member_id]));?>" class="tablelink">修改</a>
            <a href="#" name="delete" data-id="<?php echo ($v[member_id]); ?>" class="tablelink">删除</a></td>
    </tr><?php endforeach; endif; ?>
<script>
    //点击禁用或启用
    $('.tablelink').on('click',function(){
        var mid=$(this).data('mid');
        var alive=$(this).data('alive');
        $.post("<?php echo U('Member/member_alive');?>",{mid:mid,alive:alive},function(data){
            if(alive==1){
                $("#live").html(data);
            }else{
                $("#live").html(data);
            }
        })
    })
    //连续删除时  必须要把这个JQ代码放到我们局部刷新的那个页面里面   就是member_delete.html里面
    $('a[name=delete]').on('click',function(){
        var member_id=$(this).data('id');
        //这里获得变量的值的时候   要用this   意思就的点谁获得到谁的值
        $.post("<?php echo U('Member/member_delete');?>",{member_id:member_id},function(data){
            layer.msg('删除成功',{icon:6});//这里引用layer插件上边写样式的地方引入layer插件
            //下面这句话 就是收到后台传过来的值  然后进行覆盖
            $('#live').html(data);
        })
    })
    //查询
    $('#dosubmit').on('click',function(){
        $.post("<?php echo U('Member/member_select');?>",$('#form1').serialize(),function(data){
            $("#live").html(data);
        })
    })
</script>