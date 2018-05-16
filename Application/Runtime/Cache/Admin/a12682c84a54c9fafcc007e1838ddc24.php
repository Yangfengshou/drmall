<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加管理员</title>
    <link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/drmall/Public/admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/drmall/Public/home/js/jquery.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/kindeditor/kindeditor-all-min.js"></script>
    <script type="text/javascript" src="/drmall/Public/admin/js/select-ui.min.js"></script>
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
    <span>位置:添加管理员</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">添加管理员</a></li>
    </ul>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Admin/myadd');?>" method="post">
                <ul class="forminfo">
        <li><label>用户名 <b>*</b></label><input id="username" name="username" type="text" class="dfinput" value="" placeholder="请填写用户名"  style="width:342px;"/></li>
        <li><label>密 码 <b>*</b></label><input id="password" name="password" type="text" class="dfinput" placeholder="请填写密码"  style="width:342px;"/></li>
        <li><label>真实姓名 <b>*</b></label><input id="name" name="name" type="text" class="dfinput" placeholder="请填写真实姓名"  style="width:342px;"/></li>
        <li><label>手机号码 <b>*</b></label><input id="phone_number" name="phone_number" type="text" class="dfinput" placeholder="请填写手机号码"  style="width:342px;"/></li>
        <li><label>权 限 <b>*</b></label>
            <input id="grade" name="grade" type="text" class="dfinput" placeholder="填写S 或SS 或SSS"  style="width:342px;"/></li>
        <li><label>管 理 组<b>*</b></label>
            <div class="vocation">
                <?php $getgroupList=getgroupList(1);?>
                <select class="select1" name="id">
                    <option value="">管理组分类</option>
                    <?php if(is_array($getgroupList)): foreach($getgroupList as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" style="color: #000088">&nbsp;&nbsp;&nbsp;<?php echo ($v["title"]); ?></option><?php endforeach; endif; ?>
                </select>
            </div></li>
        <li><label>&nbsp;</label><input name="dosubmit" id="dosubmit" type="submit" class="btn" value="添加用户"/></li>
        　　　　　</ul>
        </form>
        </div>
    </div>
</div>
<script>
    //ajax添加管理员
//    $(function(){
//        $("#dosubmit").on("click",function(){
//            alert(222);
//            var username=$("#username").val();
//            var password=$("#password").val();
//            var grade=$("#grade").val();
//            alert(333);
//            $.post("<?php echo U('Admin/Admin/myadd');?>",{username:username,password:password,grade:grade},function(data){
//                alert(111);
//                if(data['status']==1){
//                    alert(444);
//                    alert(data['info']);
//                    location.href="<?php echo U('Admin/admin_add');?>";
//                }else{
//                    alert(data['info']);
//                    location.href="<?php echo U('Admin/admin_add');?>"
//                }
//            },"json")
//        })
//    })
</script>
</body>
</html>