<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加管理员</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/drmall/Public/admin/css/content_h.css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/layer/layer.js"></script>
</head>
<body>
<div class="place">
    <span>位置:添加权限</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form method="post" id="form1">
                <ul class="seachform">
                    <li><label>管理组查询</label><input name="group_name" type="text" class="scinput" /></li>

                    <li><label>&nbsp;</label><input type="button" class="scbtn" id="scbtn" value="查询"/></li>
                </ul>
            </form>
            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>管理组名称</th>
                    <th>成员</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="alive">
                <?php if(is_array($group_arr)): foreach($group_arr as $key=>$v): ?><tr>
                        <td><?php echo ($v[id]); ?></td>
                        <td><?php echo ($v[title]); ?></td>
                        <td style="color: #009900"><?php if(is_array($v["admin_username"])): foreach($v["admin_username"] as $key=>$val): ?>*<?php echo ($val); endforeach; endif; ?>
                        </td>

                        <td>
                            <a href="<?php echo U('group_rule',array('group_id'=>$v[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/>分配权限 |</a>
                            <a href="<?php echo U('group_edit',array('group_id'=>$v[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif"/>编辑 |</a>
                            <a href="javascript:;" class="tablelink1" data-id="<?php echo ($v["id"]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/>删除</a></td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <tr>
        <td colspan="4">
            <div class="page">
                <?php echo ($page); ?>
            </div>
        </td>
    </tr>
</div>
</body>
<script>
    $(function(){
        /*删除*/
        $('.tablelink1').click(function(){
            var  id=$(this).val();
            layer.confirm("确定要删除吗？",{btn:['确定','取消']},function(){
                $.post("<?php echo U('Limit/group_delt');?>","group_id="+id,function(data){
                    if(data['status']==1){
                        layer.msg(data['info'],{icon: 5});
                        location.href="<?php echo U('Limit/group_list');?>";
                    }else{
                        layer.msg(data['info'],{icon: 6});
                    }
                })
            })
        })

        /*查询*/
        $('#scbtn').click(function(){
            $.post("<?php echo U('Limit/group_serch');?>",$('#form1').serialize(),function(data){
                $('.tablelist').html(data);
            });
        })
    })
</script>
</html>