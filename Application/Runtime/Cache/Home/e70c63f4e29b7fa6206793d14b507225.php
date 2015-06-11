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
<h1>采购明细</h1>
<div style="margin-left: 20px;">
</div>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
       <td>设备名</td><td>数量</td><td>供货商</td>><td>预计总金额</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="">
                <td > <?php echo ($vo["name"]); ?></td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["pqId"]); ?> </td>
                <td > <?php echo ($vo["yuji"]); ?> </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>