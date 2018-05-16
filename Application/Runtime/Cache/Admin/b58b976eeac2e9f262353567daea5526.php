<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>分类列表</title>
    <link href="/drmall/Public/admin/css/page.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/layer/layer.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
</head>
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
<body>
<div class="place">
    <span>位置:分类列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">分类列表</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form method="post" id="form1" action="<?php echo U('Cate/cate_serch');?>">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="cate_name" type="text" class="scinput" /></li>

                    <li><label>父级类</label>
                        <div class="vocation">
                            <input name="parent" type="text" class="scinput" />
                        </div>
                    </li>
                    <li><label>类别状态</label>
                        <div class="vocation">
                            <select class="select2" name="opt">
                                <option value="0" <?php echo $_POST['opt']==0?'selected':''; ?>>disable</option>
                                <option value="1" <?php echo $_POST['opt']==1?'selected':''; ?>>dispiay</option>
                            </select>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/drmall/Public/admin/images/px.gif" /></i></th>
                    <th>分类名称</th>
                    <th>父级ID</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="alive">
                <?php if(is_array($catelist)): foreach($catelist as $key=>$v): ?><tr>
                        <td><?php echo ($v["cate_id"]); ?></td>
                        <td><?php echo ($v["cate_name"]); ?></td>
                        <td><?php echo ($v["cate_pid"]); ?></td>
                        <?php if($v[active] == 1): ?><td><a>已上架</a></td>
                            <?php else: ?>
                            <td><a>已下架</a></td><?php endif; ?>
                        <td><a href="<?php echo U('Cate/cate_edit',array('cate_id',$v[cate_id]));?>"  class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑</a>
                            <a href="#" data-id="<?php echo ($v[cate_id]); ?>" data-alive="<?php echo ($v[active]); ?>" id="tablelink" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/>
                                <?php if($v[active] == 1): ?>下架<?php else: ?>上架<?php endif; ?></a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
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
</div>
</body>
<script>
    //上下架
    $(function(){
        $('#tablelink').bind('click',function() {
            var cate_id=$(this).data('id');
            var cate_alive=$(this).data('alive');
            $.post("<?php echo U('Cate/cate_delete');?>",{cate_id:cate_id,cate_alive:cate_alive},function(data){
                if(cate_alive==1){
                    layer.msg('该类下架成功',{icon:5});
                    $("#alive").html(data);
                }else{
                    layer.msg('该类上架成功',{icon:6});
                    $("#alive").html(data);
                }
            })
        })
    })
</script>
</html>