<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>管理员列表</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jQuery.1.8.2.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/layer/layer.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/editor/kindeditor.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
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
    <span>位置:权限列表</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
            <form id="form1">
            <ul class="seachform">
                <li><label>权限名称</label><input name="name" type="text" class="scinput" /></li>
                <li><label>权限规则</label><input name="rule" type="text" class="scinput" /></li>
                <li><label>&nbsp;</label><input name="" type="button" class="scbtn" id="scbtn" value="查询"/></li>
            </ul>
            </form>
            <table class="tablelist" >
                <thead>
                <tr>
                    <th>编号</th>
                    <th>权限名称</th>
                    <th>权限规则</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <form method="post">
                <?php if(is_array($auth_arr)): foreach($auth_arr as $key=>$val): ?><tr>
                     <td><?php echo ($val[id]); ?></td>
                    <?php if($val[menu_pid] == 0): ?><td style="color: red;font-size: 14px"><?php echo ($val[title]); ?></td>
                        <td style="color: red"><?php echo ($val[name]); ?></td>
                        <?php else: ?>
                    <td><?php echo ($val[title]); ?></td>
                    <td><?php echo ($val[name]); ?></td><?php endif; ?>

                    <td><a href="<?php echo U('limit_add',array('auth_id'=>$val[id]));?>" class="tablelink"><img src="/drmall/Public/admin/images/integral-left-li-p2.gif"/>添加</a> |
                        <a href="<?php echo U('limit_edit',array('auth_id'=>$val[id]));?>" class="tablelink" id="edit"><img src="/drmall/Public/admin/images/integral-left-li-p8.gif" data-val='$val[name]' data-name='$val[title]'/>编辑</a> |
                        <a href="javascript:;" class="tablelink1" data-id="<?php echo ($val["id"]); ?>"><img src="/drmall/Public/admin/images/integral-left-li-p7.gif"/> 删除</a></td>
                </tr><?php endforeach; endif; ?>
                </form>
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
        $('.tablelink1').click(function(){
            var  id=$(this).val();
            layer.confirm('确定要删除吗？',{btn:['确定','取消'] },function(){
                $.post("<?php echo U('Limit/limit_delt');?>","auth_id="+id,function(data){
                    if(data['status']==1){
                        layer.msg(data['info'],{icon: 5});
                        location.href="<?php echo U('Limit/limit_list');?>";
                    }else{
                        layer.msg(data['info'],{icon: 6});
                    }
                },'json');
            })
        })


        $('#scbtn').click(function(){
            $.post("<?php echo U('Limit/limit_serch');?>",$('#form1').serialize(),function(data){
                    $('.tablelist').html(data);
            });
        })
    })
</script>
</html>