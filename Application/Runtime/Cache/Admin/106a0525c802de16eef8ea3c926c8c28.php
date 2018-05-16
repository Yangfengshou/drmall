<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加管理员</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/drmall/Public/admin/css/content_h.css" />
    <script type="text/javascript" src="/drmall/Public/admin/js/jquery.js"></script>
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
    <span>位置:编辑权限</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form id="from1" method="POST">
                <?php $i=1; function showTree($tree,$i,$group_id){ if($i==1){ echo "<table class='public-cont-table'>"; }else{ echo "<table>"; } foreach($tree as $k=>$vo){ echo "<tr><td>"; echo "$vo[title]<input type='checkbox' value='$vo[id]' name='rule_id[]'"; if( group_id2rule($group_id,$vo[id])){ echo "checked"; } echo " /> "; echo "</td>"; echo "<td>"; if($vo[childs]){ showTree($vo[childs],$i,$group_id); } echo "</td></tr>"; } echo "</table>"; $i++; } showTree($tree,$i,$group_id); ?>
                <input type="button" value="确定" onclick="dosubmit()">
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $("#title").focusin(function(){
        $("#title").attr({style: "border: 1px double #c0c0c0; width: 280px;"});
    });
    $("#name").focusin(function(){
        $("#name").attr({style: "border: 1px double #c0c0c0; width: 280px;"});
    });

    $("#add_auth").click(function(){
        var menu_path=$("#name").val();
        var menu_name=$("#title").val();
        if(menu_name==''){
            $("#title").attr({style: "border: 1px double #f01818; width: 280px;"});
        }else if(menu_path==''){
            $("#name").attr({style: "border: 1px double #f01818; width: 280px;"});
        }else{
            $.ajax({
                url: "<?php echo U('limit_edit');?>?auth_id=<?php echo $_GET['auth_id']; ?>",
                data: $("#from1").serialize(),
                type: "POST",
                dataType: "json",
                success: function(data){
                    if(data[0]==1){
                        layer.msg("添加成功",{icon: 1},function(){
                            location.href="<?php echo U('limit_list');?>";
                        });
                    }else{
                        layer.msg("添加失败",{icon: 2});
                    }
                }
            });
        }
    });
</script>
</html>