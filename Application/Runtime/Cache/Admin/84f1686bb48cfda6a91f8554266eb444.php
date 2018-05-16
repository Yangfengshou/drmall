<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/drmall/Public/home/css/page.css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/home/layer/layer.js"></script>
</head>
<body>
<div class="place">
    <span>位置:商品列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <li><label>商品查询</label><input id="serch" placeholder="请输入商品关键字(如：休闲裤)" type="text" class="scinput" style="width: 300px;" /></li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
            </ul>
            <table class="tablelist">
                <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"><img src="/drmall/Public/admin/images/px.gif" /></i></th>
                    <th>商品名称</th>
                    <th>商品图片</th>
                    <th>商品别名</th>
                    <th>市场价格</th>
                    <th>手机价格</th>
                    <th>分类名称/ID</th>
                    <th>商品数量</th>
                    <th>商品属性</th>
                    <th>商品状态</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="alive">
                <?php if(is_array($goodslist)): foreach($goodslist as $key=>$v): ?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($v["goods_id"]); ?></td>
                    <td><?php echo mb_substr($v['goods_name'],0,12,'utf8');?></td>
                    <td><img src="/drmall/Public/upload/50/thumb_50_<?php echo ($v["goods_pic"]); ?>" /></td>
                    <td><?php echo ($v["goods_nickname"]); ?></td>
                    <td><?php echo ($v["goods_marketprice"]); ?></td>
                    <td><?php echo ($v["goods_mobileprice"]); ?></td>
                    <?php $catename=getCateName($v['cate_id']); ?>
                    <?php if(is_array($catename)): foreach($catename as $key=>$v1): ?><td><?php echo ($v1["cate_name"]); ?> / <?php echo ($v1["cate_id"]); ?></td><?php endforeach; endif; ?>
                    <td><?php echo ($v["goods_salednum"]); ?></td>
                    <td><?php echo ($v["color"]); ?> / <?php echo ($v["size"]); ?></td>

                        <td><a><?php if($v[goods_alive] == 1): ?>已上架
                        <?php else: ?>
                        已下架<?php endif; ?></a></td>
                    <td><?php echo date('Y-m-d H:i:s',$v['goods_addtime']);?></td>
                    <td><a href="<?php echo U('Goods/goods_edit',array(gid=>$v[goods_id]));?>"  class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
                        <a href="#" name="tablelink" class="tablelink" data-id="<?php echo ($v[goods_id]); ?>" data-alive="<?php echo ($v[goods_alive]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/><?php if($v[goods_alive] == 1): ?>下架
                        <?php else: ?>
                        上架<?php endif; ?></a>
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
         $('a[name=tablelink]').bind('click',function() {
         var goods_id=$(this).data('id');
         var goods_alive=$(this).data('alive');
         $.post("<?php echo U('Goods/goods_alive');?>",{goods_id:goods_id,goods_alive:goods_alive},function(data){
         if(goods_alive==1){
         layer.msg('商品下架成功',{icon:5});
             $("#alive").html(data);
         }else{
         layer.msg('商品上架成功',{icon:6});
             $("#alive").html(data);
         }
         })
         })
         $('.scbtn').on('click',function(){
             //alert(123);
             var serch=$('#serch').val();
             $.post("<?php echo U('Goods/goods_serch');?>",{serch:serch},function(data){
                 $("#alive").html(data);
             })
         })
    </script>
</div>
</body>
</html>