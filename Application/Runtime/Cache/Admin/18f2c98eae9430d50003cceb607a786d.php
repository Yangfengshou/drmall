<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>分类编辑</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/layer/layer.js"></script>
</head>
<body>
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
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">分类编辑</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <form action="<?php echo U('Cate/cate_MyEdit');?>" method="post" enctype="multipart/form-data" id="form1">
            <ul class="forminfo">
                <li><label>分类名称<b>*</b></label><input name="catename" type="text" value="<?php echo ($cateInfo[0][cate_name]); ?>" class="dfinput" style="width:342px;"/><span></span></li>
                <li><label>上级分类<b>*</b></label>
                    <div class="vocation">
                        <?php $catelist=getCateList(0);?>
                        <select class="select1" name="cid"><span></span>
                            <option value="0" name="topid">顶级分类</option>
                            <?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><option value="<?php echo ($v["cate_id"]); ?>" style="color: #000088">&nbsp;&nbsp;&nbsp;<?php echo ($v["cate_name"]); ?></option>
                                <?php $catelist1=getCateList($v['cate_id']);?>
                                <?php if(is_array($catelist1)): foreach($catelist1 as $key=>$v1): ?><option value="<?php echo ($v1["cate_id"]); ?>" style="color: #00C4F6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v1["cate_name"]); ?></option>
                                    <?php $catelist2=getCateList($v1['cate_id']);?>
                                    <?php if(is_array($catelist2)): foreach($catelist2 as $key=>$v2): ?><option value="<?php echo ($v2["cate_id"]); ?>" style="color: #666600">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($v2["cate_name"]); ?></option><?php endforeach; endif; endforeach; endif; endforeach; endif; ?>
                        </select>
                    </div>
                </li>
                <li><label>&nbsp;</label><input type="submit" class="btn" value="确认编辑"/></li>
            </ul>
        </form>
    </div>
</div>
</body>
<script>
    $(function(){
        $(".btn").click(function(){
            var catename=$('input[name="catename"]').val();
            if(!catename){
                layer.tips("不能为空",'.dfinput',{tips:[1,'orange']});
                return false;
            }else{
               // layer.tips("编辑成功",'.btn',{tips:[1,'orange']},3000);
                layer.msg('编辑成功',{icon:6});
            }
        })
    })
</script>
</html>