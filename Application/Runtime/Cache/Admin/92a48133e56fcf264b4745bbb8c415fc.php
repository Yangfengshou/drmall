<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加商品</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/kindeditor/kindeditor-all-min.js"></script>
    <style>
        tr{border: 1px ;width: 90px;height: 25px; text-align: center;}
        td{border: 1px dotted;width: 90px;height: 25px; text-align: center;}
        .detail_1{
            text-align: center;
            width: 90px;
            height: 23px;
        }
    </style>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content7', {
                allowFileManager : true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>
<body>
<div class="place">
    <span>位置:编辑商品</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">编辑商品</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Goods/goods_edit');?>" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>商品名称<b>*</b></label><input name="goodsname" type="text" class="dfinput" value="<?php echo ($res["goods_name"]); ?>"  style="width:342px;"/></li>
                    <li><label>商品别名<b>*</b></label><input name="goods_nickname" type="text" class="dfinput" value="<?php echo ($res["goods_nickname"]); ?>"  style="width:342px;"/></li>
                    <li><label>分类名称<b>*</b></label>
                        <div class="vocation">
                            <?php $catelist=getCateList(0);?>
                            <select class="select1" name="cid">
                                <option value="">顶级分类</option>
                                <?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><option value="<?php echo ($v["cate_id"]); ?>" style="color: #000088" <?php echo $v['cate_id']==$res['cate_id']?'selected':''?>>&nbsp;&nbsp;&nbsp;<?php echo ($v["cate_name"]); ?></option>
                                    <?php $catelist1=getCateList($v['cate_id']);?>
                                    <?php if(is_array($catelist1)): foreach($catelist1 as $key=>$v1): ?><option value="<?php echo ($v1["cate_id"]); ?>"  style="color: #00C4F6" <?php echo $v1['cate_id']==$res['cate_id']?'selected':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v1["cate_name"]); ?></option>
                                        <?php $catelist2=getCateList($v1['cate_id']);?>
                                        <?php if(is_array($catelist2)): foreach($catelist2 as $key=>$v2): ?><option value="<?php echo ($v2["cate_id"]); ?>"  style="color: #666600" <?php echo $v2['cate_id']==$res['cate_id']?'selected':''?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v2["cate_name"]); ?></option><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
                            </select>
                        </div>
                    </li>
                    <li><label>市场价格<b>*</b></label><input name="marketprice" type="text" class="dfinput" value="<?php echo ($res["goods_marketprice"]); ?>"  style="width:342px;"/></li>
                    <li><label>手机价格<b>*</b></label><input name="mobileprice" type="text" class="dfinput" value="<?php echo ($res["goods_mobileprice"]); ?>"  style="width:342px;"/></li>
                    <li><label>商品主图<b>*</b></label><img src="/drmall/Public/upload/<?php echo ($res["goods_pic"]); ?>" id='show' style="width: 80px;height: 80px;"></li>
                    <li><label>商品附图<b>*</b></label>
                        <img src="/drmall/Public/upload/<?php echo ($pic[1][pic_name]); ?>" id='show1' style="width: 80px;height: 80px;">
                        <img src="/drmall/Public/upload/<?php echo ($pic[2][pic_name]); ?>" id='show2' style="width: 80px;height: 80px;margin-left: 260px;">
                        <img src="/drmall/Public/upload/<?php echo ($pic[3][pic_name]); ?>" id='show3' style="width: 80px;height: 80px;margin-left: 260px;"></li>
                    <li><label>商品规格<b>*</b></label><input name="color" type="text" class="dfinput" value="<?php echo ($res["color"]); ?>"  style="width:220px;"/></li>
                    <li id="add11"></li>
                    <li><label>商品规格<b>*</b></label><input name="size" type="text" class="dfinput" value="<?php echo ($res["size"]); ?>"  style="width:220px;"/></li>

                    <input name="gid1" type="hidden" value="<?php echo ($res["goods_id"]); ?>"/>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认编辑"/></li>
                </ul>
            </form>
        </div>
        <!--//<input type='text' class='dfinput' value='' style='width: 100px;'/><span>撤销</span>-->
    </div>
</div>
<script>
    $('.delTz').live('click',function () {
        $(this).prev().remove()
        $(this).remove()
    })
    $(".delDetail3").click(function () {
        $("#detail_table").empty()
        $(this).parent().hide()
        $("input[name='gcgoods[]']").attr({readonly:false})
        $("input[name='gsgoods[]']").attr({readonly:false})
        $('.delTz').show()
    })
    $(".addgoods3").click(function () {
        $('.delTz').hide()
        $("#detail_table").append("<tr><td>"+$("input[name='color']").val()+"</td><td>"+$("input[name='size']").val()+"</td><td>价格</td><td>库存</td>")
        $("input[name='gcgoods[]']").each(function () {
            var gcgoods=$(this).val()
            $("input[name='gsgoods[]']").each(function () {
                $("#detail_table").append("<tr><td>"+gcgoods+"</td><td>"+$(this).val()+"</td><td><input type='text' class='detail_1' name='detail_price[]'></td><td><input type='text' class='detail_1' name='detail_num[]'></td>")
            })
        })
        $("input[name='gcgoods[]']").attr({readonly:'readonly'})
        $("input[name='gsgoods[]']").attr({readonly:'readonly'})
        $(".addgoods3").parent().hide()
        $(".addgoods3").parent().next().show();
    })
    $(".addgoods1").click(function () {
        $(this).parent().append('<input  placeholder="属性值" type="text" class="dfinput" name="gcgoods[]" style="width: 80px"/><input type="button" value="撤销" class="delTz">')
    })
    $(".addgoods2").click(function () {
        $(this).parent().append('<input  placeholder="属性值" type="text" class="dfinput" name="gsgoods[]" style="width: 80px"/><input type="button" value="撤销" class="delTz">')
    })
</script>
</body>
<script type="text/javascript">
    //不能添加相同路径或者名字的图片   会报错
    function c () {
        var r= new FileReader();
        f=document.getElementById('file').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show').src=this.result;
        };
    }
    function b () {
        var r= new FileReader();
        f=document.getElementById('file1').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show1').src=this.result;
        };
    }
    function d () {
        var r= new FileReader();
        f=document.getElementById('file2').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show2').src=this.result;
        };
    }
    function e () {
        var r= new FileReader();
        f=document.getElementById('file3').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show3').src=this.result;
        };
    }
</script>
</html>