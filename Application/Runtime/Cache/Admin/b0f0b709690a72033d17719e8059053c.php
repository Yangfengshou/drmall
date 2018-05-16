<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台首页</title>
<link href="/drmall/Public/admin/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/drmall/Public/admin/js/jquery.js"></script>
    <script src="/drmall/Public/admin/highchart/highcharts.js"></script>
    <script src="/drmall/Public/admin/highchart/modules/exporting.js"></script>
    <style>
        tspan{font-size:20px;font-weight:900;}
    </style>
</head>
<body>
	<div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="<?php echo U('Index/main');?>">首页</a></li>
        </ul>
    </div>

    <div class="mainindex">
    <div class="welinfo">
        <span><img src="/drmall/Public/admin/images/sun.png" alt="天气" /></span>
        <b><?php echo ($_SESSION[aname]); ?>早上好，欢迎使用后台管理系统</b>
    </div>
    
    <div class="welinfo">
        <span><img src="/drmall/Public/admin/images/time.png" alt="时间" /></span>
        <i>您上次登录的时间：<strong><?php echo (date('Y年m月d日 H时s分i秒,',$_SESSION[lastTime])); ?></strong></i><i>您上次登录IP：<strong><?php echo ($_SESSION[lastIp]); ?>,</strong></i><strong style="color:red;">如非本人操作，请及时更改密码</strong>
    </div>
    
    <div class="xline"></div>
    
 <!--    <ul class="iconlist">

    <li><img src="/drmall/Public/admin/images/ico01.png" /><p><a href="#">管理设置</a></p></li>
    <li><img src="/drmall/Public/admin/images/ico02.png" /><p><a href="#">发布文章</a></p></li>
    <li><img src="/drmall/Public/admin/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
    <li><img src="/drmall/Public/admin/images/ico04.png" /><p><a href="#">文件上传</a></p></li>
    <li><img src="/drmall/Public/admin/images/ico05.png" /><p><a href="#">目录管理</a></p></li>
    <li><img src="/drmall/Public/admin/images/ico06.png" /><p><a href="#">查询</a></p></li>

 </ul>
 
   
 
 <div class="xline"></div>
    <div class="box"></div>
    
    <div class="welinfo">
        <span><img src="/drmall/Public/admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>
    
    <ul class="infolist">
    <li><span>服务器软件：Apache</span></li>
    <li><span>开发语言：PHP</span></li>
    <li><span>数据库:Mysql</span></li>
    </ul>

    <div class="xline"></div>
    <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egoods.com" target="_blank">www.egoods.com</a>)</div>
    -->
    </div>
    <div id="container" style="min-width:400px;height:400px"></div>
    <script>
        $.post("<?php echo U('Index/all_price_2017');?>",function(data){
             console.log( data[0]['data']);
    var chart = new Highcharts.Chart('container', {
        title: {
            text: '宅客易购商城2017年度销售额',
            x: -20
        },
        subtitle: {
            text: '数据来源:drmall.applinzi.com',
            x: -20
        },
        xAxis: {
            categories: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
        },
        yAxis: {
            title: {
                text: '销售额 (元)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '元'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series:
                [{
                    name:'月销售额',
                    data:data[0]['data']
                }]
    })
        })
    </script>
</body>
</html>