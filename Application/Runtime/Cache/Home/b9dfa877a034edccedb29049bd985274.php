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
    <h1>更新品牌供货商</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/Agreement/Update_gonghuoshang">
        <input  name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">


        <div style="margin-top: 10px;">
            <label for="" >品牌:</label>
            <input id="" name="name" value="<?php echo ($data[0]["name"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label for="" >供货商:</label>
            <input  name="gonghuoshang" value="<?php echo ($data[0]["gonghuoshang"]); ?>" data-options="required:true,validType:'missingMessage'">
        </div>

        <input type="submit" value="更新" style="">
    </form>

</div>
</body>
</html>