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

    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>更新组织部门信息</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/system/dept_update">
        <input  name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label for="" >部门名称:</label>
            <input id="" name="device_name" value="<?php echo ($data[0]["text"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>

        <input type="submit" value="更新" style="">
    </form>

</div>
</body>
</html>