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
    <script>
        $(function(){
            $(".del").click(function(){
                return confirm("是否确认删除");
            });
        });
    </script>
</head>
<body>
<h1>固定资产列表</h1>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
        <td>设备名称</td><td>所属部门</td><td>设备类型</td><td>购买时间</td><td>购买数量</td><td>购买单价</td><td>使用年限</td><td colspan= 2 style="text-align: center;">操作</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td > <?php echo ($vo["device_name"]); ?> </td>
            <td > <?php echo ($vo["dept"]); ?> </td>
            <td > <?php echo ($vo["device_type"]); ?> </td>
            <td > <?php echo ($vo["buy_time"]); ?> </td>
            <td > <?php echo ($vo["num"]); ?> </td>
            <td > <?php echo ($vo["buy_money"]); ?> </td>
            <td > <?php echo ($vo["retirement_life"]); ?> </td>
            <td ><a href="http://localhost/lunwen/index.php/home/fixedassets/fixed_update/fid/<?php echo ($vo["id"]); ?>"> 更新</a> </td>
            <td ><a href="http://localhost/lunwen/index.php/home/fixedassets/fixedassets_delete/fid/<?php echo ($vo["id"]); ?>" class="del" > 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>