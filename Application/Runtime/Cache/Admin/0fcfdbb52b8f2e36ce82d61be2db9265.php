<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加品牌</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/kindeditor/kindeditor-all-min.js"></script>
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
    <span>位置:添加品牌</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">添加品牌</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Brand/brand_add');?>" method="post" enctype="multipart/form-data">
                <ul class="forminfo">
                    <li><label>品牌名称<b>*</b></label><input name="brandname" type="text" class="dfinput" placeholder="请填写品牌名称"  style="width:342px;"/></li>
                    <li><label>品牌logo<b>*</b></label><input id="file" name="pic[]" onchange="c()" type="file"style="width:342px;"/></li>
                    <li><label>图片显示<b>*</b></label><img src="" id='show' style="width: 80px;height: 80px;"></li>
                    <li><label>所属分类<b>*</b></label>
                        <div class="vocation">
                            <?php $catelist=getCateList(0);?>
                            <select class="select1" name="cid">
                                <option value="">顶级分类</option>
                                <?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><option value="<?php echo ($v["cate_id"]); ?>" style="color: #000088">&nbsp;&nbsp;&nbsp;<?php echo ($v["cate_name"]); ?></option>
                                    <?php $catelist1=getCateList($v['cate_id']);?>
                                    <?php if(is_array($catelist1)): foreach($catelist1 as $key=>$v1): ?><option value="<?php echo ($v1["cate_id"]); ?>" style="color: #00C4F6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v1["cate_name"]); ?></option>
                                        <?php $catelist2=getCateList($v1['cate_id']);?>
                                        <?php if(is_array($catelist2)): foreach($catelist2 as $key=>$v2): ?><option value="<?php echo ($v2["cate_id"]); ?>" style="color: #666600">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v2["cate_name"]); ?></option><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
                            </select>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="添加品牌"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    function c () {
        var r= new FileReader();
        f=document.getElementById('file').files[0];
        r.readAsDataURL(f);
        r.onload=function  (e) {
            document.getElementById('show').src=this.result;
        };
    }
</script>
</html>