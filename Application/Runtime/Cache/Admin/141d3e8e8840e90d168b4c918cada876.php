<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>品牌列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/page.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>
<body>
<div class="place">
    <span>位置:品牌列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">品牌列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <li><label>品牌查询</label><input id="serch" placeholder="请输入品牌关键字(如：小米)" type="text" class="scinput" style="width: 300px;" /></li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
            </ul>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/drmall/Public/admin/images/px.gif" /></i></th>
                    <th>品牌名称</th>
                    <th>品牌logo</th>
                    <th>分类名称/ID</th>
                    <th>状态显示</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="active">
                <?php if(is_array($brandlist)): foreach($brandlist as $key=>$v): ?><tr>
                        <td><input name="" type="checkbox" value="" /></td>
                        <td><?php echo ($v["brand_id"]); ?></td>
                        <td><?php echo ($v['brand_name']); ?></td>
                        <td><img src="/drmall/Public/upload/50/thumb_50_<?php echo ($v["brand_pic"]); ?>" /></td>
                        <?php $catename=getCateName($v['cate_id']); ?>
                        <?php if(is_array($catename)): foreach($catename as $key=>$v1): ?><td><?php echo ($v1["cate_name"]); ?> / <?php echo ($v1["cate_id"]); ?></td><?php endforeach; endif; ?>
                        <td><a><?php if($v[brand_active] == 1): ?>已审核
                            <?php else: if($v[brand_active] == 2): ?>审核中<?php else: ?>未审核<?php endif; endif; ?></a></td>
                        <td><a href="<?php echo U('Brand/brand_edit',array(bid=>$v[brand_id]));?>" name="edit" data-bid="<?php echo ($v[brand_id]); ?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
                            <a href="#" class="tablelink" name="shenhe" data-id="<?php echo ($v[brand_id]); ?>" data-active="<?php echo ($v[brand_active]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/><?php if($v[brand_active] == 0): ?>审核<?php else: endif; ?></a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <td colspan="4">
                <div class="page">
                    <?php echo ($page); ?>
                </div>
            </td>
            </tr>
            <tr>
        </div>
    </div>
    <script>
        $('a[name=shenhe]').bind('click',function() {
            var brand_id=$(this).data('id');
            var brand_active=$(this).data('active');
            $.post("<?php echo U('Brand/brand_active');?>",{brand_id:brand_id,brand_active:brand_active},function(data){
                if(brand_active==0){
                    layer.msg('已提交审核，请耐心等待审核结果',{icon:6});
                    $("#active").html(data);
                }
            })
        })
        $('.scbtn').bind('click',function(){
            var serch=$('#serch').val();
            $.post("<?php echo U('Brand/brand_serch');?>",{serch:serch},function(data){
                $("#active").html(data);
            })
        })
    </script>
    <!--<script>
        $('a[name=edit]').on('click',function(){
            var bid=$(this).data('bid');
            $.post("<?php echo U('Brand/brand_edit');?>",{bid:bid},function(data){
                //console.log(bid);return false;
            })
        })
    </script>-->

</div>
</body>
</html>