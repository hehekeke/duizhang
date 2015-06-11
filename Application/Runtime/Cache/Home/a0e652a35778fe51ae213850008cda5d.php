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
            $('#role').combobox({
                url:'http://localhost/lunwen/index.php/home/system/role_type_data',
                valueField:'id',
                textField:'role_name'
            });
        });
    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>添加用户信息</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/system/user_add">
        <div style="margin-top: 10px;">
            <label >用户名:</label>
            <input  name="username"  class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >用户密码:</label>
            <input  name="password"  class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label  >用户所属部门:</label>
            <select  name="dept" class="easyui-combotree" style="width:200px;"
                     data-options="url:'http://localhost/lunwen/index.php/home/dept/dept_tree',required:true"></select>
        </div>
        <div style="margin-top: 10px;">
            <label for="" >用户角色:</label>
            <input id="role" name="role" value="" data-options="required:true,validType:'missingMessage'">
        </div>
        <div style="margin-top: 10px;">
            <label >真实姓名:</label>
            <input  name="realname"  class="easyui-validatebox" data-options="" />
        </div>
        <div style="margin-top: 10px;">
            <label >联系邮箱:</label>
            <input  name="email"  class="easyui-validatebox" data-options="" />
        </div>
        <div style="margin-top: 10px;">
            <label >联系电话:</label>
            <input  name="iphone"  class="easyui-validatebox" data-options="" />
        </div>


        <input type="submit" value="添加" style="">
    </form>

</div>
</body>
</html>