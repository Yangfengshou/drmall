<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商城轮播图</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>
<body>
<div class="place">
    <span>位置:商城轮播图</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">商城管理</a></li>
        <li><a href="<?php echo U('Mall/banner');?>">商城轮播图</a></li>
    </ul>
</div>
<form action="<?php echo U('Mall/banner_add');?>" method="post">
    <div class="formbody">
        <div id="usual1" class="usual">
            <div id="tab2" class="tabson">
                <ul class="seachform">
                    <!--<li><label>综合查询</label><input name="bannerInfo" type="text" class="scinput" id="bannerInfo" value=""/></li>
                    <li><label>&nbsp;</label><input name="select" id="select" type="button" class="scbtn" value="查询"/></li>-->
                    <li><label>&nbsp;</label><input name="addbanner" id="addbanner" type="submit" class="scbtn" value="添加"/></li>
                </ul>
                <table class="tablelist">
                    <thead>
                    <tr>
                        <th style="width:80px;">bannerID</th>
                        <th>bannerName</th>
                        <th>bannerPic</th>
                        <th>bannerPicName</th>
                        <th>bannerAddtime</th>
                        <th>alive</th>
                        <th>active</th>
                    </tr>
                    </thead>
                    <tbody id="alive">
                    <?php if(is_array($bannerList)): foreach($bannerList as $key=>$v): ?><tr>
                            <td style="color:red;font-weight:900;">banner<?php echo ($v[id]); ?></td>
                            <input type="hidden" value="<?php echo ($v[id]); ?>" id="aid">
                            <td><?php echo ($v[banner_name]); ?></td>
                            <td><img src="/drmall/Public/home/upload/banner/<?php echo ($v[banner_pic]); ?>" width="120" height="40"></td>
                            <td><?php echo ($v[banner_pic]); ?></td>
                            <td><?php echo (date('Y年m月d日',$v[banner_addtime])); ?></td>
                            <td style="font-weight:900;"><?php echo ($v[banner_alive]==1?显示中:屏蔽中); ?></td>
                            <td><a href="" class="tablelink" data-bid="<?php echo ($v[id]); ?>" data-alive="<?php echo ($v[banner_alive]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/><?php if(($v[banner_alive] == 1)): ?>屏蔽<?php else: ?>显示<?php endif; ?></a>
                                <a href="<?php echo U('Mall/banner_alter',array('bid'=>$v[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
                                <a href="" class="tablelink" id="del" data-alive="2" data-bid="<?php echo ($v[id]); ?>" onclick="confirm('你确定要删除吗?')"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/>删除</a>
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
        //点击查询
        $('#select').on('click',function(){
            var bannerInfo=$('#bannerInfo').val();
            $.post("<?php echo U('Mall/benner_select');?>",{bannerInfo:bannerInfo},function(data){
                $("#alive").html(data);
            })
        })
    })
</script>
</html>