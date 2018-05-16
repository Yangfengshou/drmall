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
                <div class="form-group mt0" style="margin-top: 30px; margin-left: 20px;">
                    <label for="user_name">上级权限:</label>
                    <?php if($_GET['auth_id']): ?><span style="color: #f01818;"><?php echo ($auth_arr[title]); ?></span>
                        <?php else: ?>
                        <span style="color: #f01818;">根权限</span><?php endif; ?>
                </div>
                <div class="form-group mt0" style="margin-top: 30px; margin-left: 20px;">
                    <label for="user_name">权限名称:</label>
                    <input type="text" style="width: 280px;" name="title" id="title" value="<?php echo ($auth_arr["title"]); ?>" class="form-input-small">
                </div>
                <div class="form-group mt0" style="margin-top: 30px; margin-left: 20px;">
                    <label for="user_name">权限规则:</label>
                    <input type="text" style="width: 280px;" name="name" id="name"value="<?php echo ($auth_arr["name"]); ?>" class="form-input-small">
                </div>
                <div style="background-color: #52AFB7; float: left; text-align: center; margin: 40px 40px 40px 50px; width: 90px; height: 40px; line-height: 40px; ">
                    <a href="javascript: ;" style="color: #ffffff;" class="public-header-loginout" id="add_auth">确认编辑</a>
                </div>
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
                        layer.msg("编辑成功",{icon: 1},function(){
                            location.href="<?php echo U('limit_list');?>";
                        });
                    }else{
                        layer.msg("编辑失败",{icon: 2});
                    }
                }
            });
        }
    });
</script>
</html>