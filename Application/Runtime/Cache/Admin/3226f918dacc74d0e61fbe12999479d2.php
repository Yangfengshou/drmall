<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>
<body>
<div class="place">
    <span>位置:管理员列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">管理员列表</a></li>
    </ul>
</div>
<form action="" method="post">
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <li><label>综合查询</label><input name="adminInfo" type="text" class="scinput" id="adminInfo" value=""/></li>
                <li><label>&nbsp;</label><input name="dosubmit" id="dosubmit" type="button" class="scbtn" value="查询"/></li>
            </ul>
            <table class="tablelist">
                <thead>
                <tr>
                    <th style="width:80px;">管理员ID</th>
                    <th>用户名</th>
                    <th>权限</th>
                    <th>真实姓名</th>
                    <th>手机号</th>
                    <th>注册时间</th>
                    <th>最后登陆时间</th>
                    <th>登陆IP</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="alive">
                <?php if(is_array($adminlist)): foreach($adminlist as $key=>$v): ?><tr>
                    <td style="color:red;font-weight:900;">0000<?php echo ($v[admin_id]); ?></td>
                    <input type="hidden" value="<?php echo ($v[admin_id]); ?>" id="aid">
                    <td><?php echo ($v[admin_username]); ?></td>
                    <td style="font-weight:900;color:#15adff;"><?php echo ($v[admin_grade]); ?></td>
                    <td><?php echo ($v[admin_name]); ?></td>
                    <td><?php echo ($v[phone_number]); ?></td>
                    <td><?php echo (date('Y年m月d日',$v[admin_addtime])); ?></td>
                    <?php if(empty($v[lastlogin_time]) != true): ?><td><?php echo (date('Y年m月d日 H时i分s秒',$v[lastlogin_time])); ?></td>
                        <?php else: ?>
                        <td></td><?php endif; ?>

                    <td style="color:red;font-weight:900;"><?php echo ($v[lastlogin_ip]); ?></td>
                    <td><?php echo ($v[admin_alive]==1?启用:禁用); ?></td>
                    <td><a href="" class="tablelink" data-aid="<?php echo ($v[admin_id]); ?>" data-alive="<?php echo ($v[admin_alive]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/><?php if(($v[admin_alive] == 1)): ?>禁用<?php else: ?>启用<?php endif; ?></a>
                        <a href="<?php echo U('Admin/admin_alter',array('aid'=>$v[admin_id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
                        <a href="" class="tablelink" id="del" data-alive="2" data-aid="<?php echo ($v[admin_id]); ?>" onclick="confirm('你确定要删除吗?')"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/>删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</form>
<tr>
    <td colspan="4">
        <div class="page">
            <?php echo ($page); ?>
        </div>
    </td>
</tr>
</body>
<script>
    $(function(){
        //点击禁用或启用
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
        //点击查询
        $('#dosubmit').on('click',function(){
            var adminInfo=$('#adminInfo').val();
            $.post("<?php echo U('Admin/admin_select');?>",{adminInfo:adminInfo},function(data){
                    $("#alive").html(data);
            })
        })
    })
</script>
</html>