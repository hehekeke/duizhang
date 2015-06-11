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
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>批量添加固定资产</h1>
    <form id="add_from"  method="post" enctype="multipart/form-data" action="http://localhost/lunwen/index.php/home/Fixedassets/piliang_add">
        <div style="margin-top: 10px;">
            <label>固定资产列表:</label>
            <input type="file" name="import"  />
        </div>


        <input type="submit" value="提交" style="">
    </form>

</div>
</body>
</html>