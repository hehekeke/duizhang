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
            $('#cc').combotree({
                url: 'http://localhost/lunwen/index.php/home/dept/dept_tree',
                required: true
            });
        });
    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>更新用户信息</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/system/user_update">
        <input  name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label  >用户姓名:</label>
            <input  name="username" value="<?php echo ($data[0]["username"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label  >用户密码:</label>
            <input  name="password" value="<?php echo ($data[0]["password"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label  >用户所属部门:</label>
            <input id="cc" name="dept" value="<?php echo ($data[0]["dept"]); ?>">
        </div>
        <div style="margin-top: 10px;">
            <label for="" >用户角色:</label>
            <input id="role" name="role" value="<?php echo ($data[0]["role"]); ?>" data-options="required:true,validType:'missingMessage'">
        </div>
        <div style="margin-top: 10px;">
            <label  >真实姓名:</label>
            <input  name="realname" value="<?php echo ($data[0]["realname"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label  >用户邮箱:</label>
            <input  name="email" value="<?php echo ($data[0]["email"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label  >联系方式:</label>
            <input  name="iphone" value="<?php echo ($data[0]["iphone"]); ?>" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>

        <input type="submit" value="更新" style="">
    </form>

</div>
</body>
</html>