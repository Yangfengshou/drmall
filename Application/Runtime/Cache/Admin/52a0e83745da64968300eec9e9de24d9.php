<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
<body>
<div class="place">
    <span>位置:会员列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">会员列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form method="post" id="form1">
            <ul class="seachform">
                <li><label>综合查询</label><input name="member_name" type="text" class="scinput" id="member" /></li>
                <li><label>&nbsp;</label><input name="dosubmit" id="dosubmit" type="button" class="scbtn" value="查询"/></li>
            </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>用户编号<i class="sort"><img src="/drmall/Public/admin/images/px.gif" /></i></th>
                    <th>用户昵称</th>
                    <th>联系方式</th>
                    <th>注册时间</th>
                    <th>最后登录时间</th>
                    <th>用户状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="live">
                <?php if(is_array($member)): foreach($member as $key=>$v): ?><tr>
                        <td><?php echo ($v["member_id"]); ?></td>
                        <td><?php echo ($v["member_name"]); ?></td>
                        <td><?php echo ($v["member_phone"]); ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$v[member_registertime]);?></td>
                        <td><?php echo date('Y-m-d H:i:s',$v[member_lastlogintime]);?></td>
                        <td><?php echo ($v[member_alive]==1?使用中:已冻结); ?></td>
                        <td><a href="" class="tablelink" data-mid="<?php echo ($v[member_id]); ?>" data-alive="<?php echo ($v[member_alive]); ?>"><?php if(($v[member_alive] == 1)): ?>冻结<?php else: ?>激活<?php endif; ?></a>
                            <a href="<?php echo U('Member/member_redact',array(id=>$v[member_id]));?>" class="tablelink">编辑</a>
                            <a href="#" name="delete" data-id="<?php echo ($v[member_id]); ?>" class="tablelink">删除</a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        //点击禁用或启用
        $('.tablelink').on('click',function(){
            var mid=$(this).data('mid');
            var alive=$(this).data('alive');
            $.post("<?php echo U('Member/member_alive');?>",{mid:mid,alive:alive},function(data){
                if(alive==1){
                    $("#alive").html(data);
                }else{
                    $("#alive").html(data);
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
</div>
</body>
</html>