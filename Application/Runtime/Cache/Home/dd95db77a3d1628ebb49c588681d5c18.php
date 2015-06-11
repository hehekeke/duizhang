<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/lunwen/Public/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="/lunwen/Public/easyui/themes/icon.css">



    <script type="text/javascript" src="/lunwen/Public/easyui/jquery.min.js"></script>
    <script type="text/javascript" src="/lunwen/Public/easyui/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="/lunwen/Public/My97DatePicker/WdatePicker.js"></script>
</head>
<body>

</body>
</html>

</head>
<body>
<h2>固定资产统计列表</h2>
<div style="margin-left: 20px;">
</div>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
       <td>设备名称</td><td>所属部门</td><td>设备类型</td><td>购买时间</td><td>购买数量</td><td>购买单价</td><td>使用年限</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["is_warning"] == 0 ): ?><tr style="">

                <td > <?php echo ($vo["device_name"]); ?></td>
                <td > <?php echo ($vo["dept"]); ?> </td>
                <td > <?php echo ($vo["device_type"]); ?> </td>
                <td > <?php echo ($vo["buy_time"]); ?> </td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["buy_money"]); ?> </td>
                <td > <?php echo ($vo["retirement_life"]); ?> </td>
            </tr>
            <?php else: ?>
            <tr style="color: #ff0000">
                <td > <?php echo ($vo["device_name"]); ?>(及时采购)</td>
                <td > <?php echo ($vo["dept"]); ?> </td>
                <td > <?php echo ($vo["device_type"]); ?> </td>
                <td > <?php echo ($vo["buy_time"]); ?> </td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["buy_money"]); ?> </td>
                <td > <?php echo ($vo["retirement_life"]); ?> </td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>