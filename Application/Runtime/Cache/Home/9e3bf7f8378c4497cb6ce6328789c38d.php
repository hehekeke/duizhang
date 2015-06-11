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
        });
    </script>
</head>
<body>
<div  style="margin-top: 20px;margin-left: 50px;">
    <h1>添加固定资产</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/Fixedassets/fixed_add">
        <div style="margin-top: 10px;">
            <label for="" >设备所属部门:</label>
            <select  name="dept" class="easyui-combotree" style="width:200px;"
                    data-options="url:'http://localhost/lunwen/index.php/home/dept/dept_tree',required:true"></select>
        </div>

        <div style="margin-top: 10px;">
            <label for="" >设备名:</label>
            <input id="" name="device_name" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label for="" >设备类型:</label>
            <input id="device_type" name="device_type" value="" data-options="required:true,validType:'missingMessage'">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买设备时间:</label>
            <input  name="buy_time" onClick="WdatePicker()" class="Wdate"  type="text">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买数量:</label>
            <input  name="num" value="1"   type="text">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >购买单价:</label>
            <input id="buy_money" name="buy_money"  data-options="required:true,validType:'missingMessage'">
        </div>
            <input type="submit" value="提交" style="">
    </form>

</div>


</body>
</html>