<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/layer/layer.js"></script>
  <!--  <script type="text/javascript" src="/drmall/Public/admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>-->
   <!-- <script type="text/javascript" src="/drmall/Public/admin/editor/kindeditor.js"></script>-->
</head>
<body>
<div class="place">
    <span>位置:订单列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">订单列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <ul class="seachform">
                <li><label>综合查询</label><input name="" type="text" class="scinput" /></li>
                <li><label>指派</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>重点客户</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>客户状态</label>
                    <div class="vocation">
                        <select class="select3">
                            <option>全部</option>
                            <option>其他</option>
                        </select>
                    </div>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" value="查询"/></li>
            </ul>
            <table class="tablelist" id="order_1">
               <!-- <thead>
                <tr>
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
                    <th>编号<i class="sort"></i></th>
                    <th>订单号</th>
                    <th>用户</th>
                    <th>订单状态</th>
                    <th>订单时间</th>
                    <th>成交额</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($res)): foreach($res as $k=>$val): ?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($val[order_id]); ?></td>
                    <td><?php echo ($val[order_number]); ?></td>
                    <td><?php echo ($val[member_name]); ?></td>
                    <td><?php echo ($val[order_status_name]); ?></td>
                    <td><?php echo (date('Y-m-d H:m:s',$val[order_addtime])); ?></td>
                    <td><?php echo ($val[goods_price]); ?></td>
                    <td>
                        <input name="oid"  type="hidden" value="<?php echo ($val[order_id]); ?>">
                        <a href="javascript:void (0)"  class="tablelink" data-id="<?php echo ($val[order_status]); ?>">
                            <?php echo ($val[admin_option]); ?>
                        </a>
                        <a href="#" class="tablelink2" data-id="<?php echo ($val[order_id]); ?>"> 删除
                        </a></td>
                </tr><?php endforeach; endif; ?>
                </tbody>-->
            </table>
            <tr>
                <td colspan="4">
                    <div class="page">
                        <?php echo ($page); ?>
                    </div>
                </td>
            </tr>
        </div>
    </div>
<!--    <?php print_r($res)?>-->
    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>
    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>
    <script>
        //分页
        function getInputPage() {
            var page = $("#page-num").val();
            var page_url = decodeURI($("#page-submit").attr("data-page"));
            page_url = page_url.replace('[PAGE]', page);
            repage(page_url);
            return false;
        }
        //分页
        function repage(url) {
            if(typeof url == 'undefined') url="<?php echo U('',array('p'=>$_GET['p']));?>";
            $.post(url,function(data){
                $('#shop_2').html(data);
            });
        }
        //换页
        $(document).on('click','.page a',function() {
            var url=this.href
            $.post(url,{"cate_pid" :num},function(res){
                $('#shop_2').html(res);
            })
            return false;
        })

    </script>
</div>
</body>
</html>
<script>
    replace();
    function replace(){
        $.post("<?php echo U('Order/order_1');?>",function(data){
            $("#order_1").html(data);
            $('.tablelink').bind("click",function(){
                date($(this))
            })
        })

    }
function date(_this){
        var id=_this.data('id');  //状态id
        var oid=_this.siblings("input:hidden").val();  //订单id

        $.post("<?php echo U('Order/state');?>",{id:id,oid:oid},function(data){
            if(data['status']==1){
                layer.msg(data['info']);
                replace();
            }else{
                layer.msg(data['info']);
            }
        },'json')
}

        $('.tablelink2').click(function(){
        var id=$(this).data('id');
       $.post("<?php echo U('Order/delete');?>",{id:id},function(data){
           if(data['status']==1){
               layer.msg(data['info']);
            }else{
                layer.msg(data['info']);
            }
        },'json')
    })
</script>
<!--
$(function(){
$('.delete').click(function(){
var gid=$(this).data('id');
$.post("<?php echo U('MyCart/delete');?>",{gid:gid},function(data){
if(data['status']==1){
location.href='<?php echo U("MyCart/mycart");?>';
}else{
location.href='<?php echo U("MyCart/mycart");?>';
}

},'json')

})-->