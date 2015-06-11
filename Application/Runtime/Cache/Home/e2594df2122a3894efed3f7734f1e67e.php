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
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>添加/更新固定资产合同</h1>
    <form id="add_from"  method="post" enctype="multipart/form-data" action="http://localhost/lunwen/index.php/Home/Agreement/upload">
        <input  name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label  >设备名:</label>
            <input disabled="disabled" name="device_name" value="<?php echo ($data[0]["device_name"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >合同文件:</label>
            <input type="file" name="file" /><br />
        </div>



        <input type="submit" value="更新" style="">
    </form>

</div>
</body>
</html>