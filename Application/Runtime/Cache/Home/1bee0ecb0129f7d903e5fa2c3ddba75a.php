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
            $('#device_type').combobox({
                url:'http://localhost/lunwen/index.php/home/device/device_type_data',
                valueField:'id',
                textField:'device_type'
            });
            $('#cc').combotree({
                url: 'http://localhost/lunwen/index.php/home/dept/dept_tree',
                required: true
            });

        });
    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>更新固定资产</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/Fixedassets/fixed_update_data">
        <input  name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label for="" >设备所属部门:</label>
            <input id="cc" name="dept" value="<?php echo ($dept); ?>">
        </div>

        <div style="margin-top: 10px;">
            <label for="" >设备名:</label>
            <input id="" name="device_name" value="<?php echo ($data[0]["device_name"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label for="" >设备类型:</label>
            <input id="device_type" name="device_type" value="<?php echo ($data[0]["device_type"]); ?>" data-options="required:true,validType:'missingMessage'">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买设备时间:</label>
            <input  name="buy_time" onClick="WdatePicker()" class="Wdate"  value="<?php echo ($data[0]["buy_time"]); ?>" type="text">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买数量:</label>
            <input  name="num"   value="<?php echo ($data[0]["num"]); ?>" type="text">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买单价:</label>
            <input id="buy_money" name="buy_money" value="<?php echo ($data[0]["buy_money"]); ?>"  data-options="required:true,validType:'missingMessage'">
        </div>
        <input type="submit" value="更新" style="">
    </form>

</div>
</body>
</html>