<?php if (!defined('THINK_PATH')) exit(); if(is_array($bannerList)): foreach($bannerList as $key=>$v): ?><tr>
        <td style="color:red;font-weight:900;">banner<?php echo ($v[id]); ?></td>
        <input type="hidden" value="<?php echo ($v[id]); ?>" id="aid">
        <td><?php echo ($v[banner_name]); ?></td>
        <td><img src="/drmall/Public/home/images/banner/<?php echo ($v[banner_pic]); ?>" width="120" height="40"></td>
        <td><?php echo ($v[banner_pic]); ?></td>
        <td><?php echo (date('Y年m月d日',$v[banner_addtime])); ?></td>
        <td style="font-weight:900;"><?php echo ($v[banner_alive]==1?显示中:屏蔽中); ?></td>
        <td><a href="" class="tablelink" data-bid="<?php echo ($v[id]); ?>" data-alive="<?php echo ($v[banner_alive]); ?>"><?php if(($v[banner_alive] == 1)): ?>屏蔽<?php else: ?>显示<?php endif; ?></a>
            <a href="<?php echo U('Admin/admin_alter',array('aid'=>$v[admin_id]));?>" class="tablelink">修改</a>
            <a href="" class="tablelink" id="del" data-alive="2" data-bid="<?php echo ($v[id]); ?>" onclick="confirm('你确定要删除吗?')">删除</a>
        </td>
    </tr><?php endforeach; endif; ?>
<script>
    //点击显示或屏蔽
    $('.tablelink').on('click',function(){
        var bid=$(this).data('bid');
        var alive=$(this).data('alive');
        $.post("<?php echo U('Mall/banner_alive');?>",{bid:bid,alive:alive},function(data){
            if(alive==1){
                $("#alive").html(data);
            }else{
                $("#alive").html(data);
            }
        })
        //点击删除banner图
        $('#del').on('click',function(){
            var alive=$(this).data('alive');
            $.post("<?php echo U('Mall/banner_alive');?>",{alive:alive},function(data){
                if(alive==2){
                    $("#alive").html(data);
                }
            })
        })
    })
</script>