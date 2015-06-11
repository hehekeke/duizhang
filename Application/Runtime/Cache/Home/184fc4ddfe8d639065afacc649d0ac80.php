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
           init_tree();

            setTimeout(function(){
                var s = '<?php echo ($data[0]["authority_id"]); ?>';
                ss = s.split(",");


                for(var i=0;i<ss.length;i++){
                    var node = $('#tt').tree('find',ss[i]);

                    $('#tt').tree('check', node.target);
                }
            },2000);

            $("#tijiao").click(function(){
                var IdArray = new Array();
                var node = $('#tt').tree('getChecked');
                for(var i = 0;i<node.length;i++){
                    IdArray.push(node[i].id);
                    if(node[i].fid != 0 || node[i].fid != null){
                        IdArray.push(node[i].fid);
                    }

                }

                var username = $("#username").val();
                var id =$("#role_id").val();
                if(username == null){
                    alert("请输入角色名称");
                    return false;
                }

                $.post("http://localhost/lunwen/index.php/home/system/role_update",{
                    'username':username,
                    "IdArray":IdArray,
                    "id":id
                },function(data){
                    if(data == 1){
                        alert("更新成功");
                        window.location.href = "http://localhost/lunwen/index.php/home/system/xitongcanshu";
                    }
                })
            });

        });
        function init_tree(){
            $('#tt').tree({
                url:'http://localhost/lunwen/index.php/home/dept/auth_tree',
                checkbox:true,//出现复选框
                cascadeCheck:true
            });

        }


    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>更新角色信息</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/Fixedassets/fixed_update_data">
        <input id="role_id" name="id" value="<?php echo ($data[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label >角色名称:</label>

            <input id="username" value="<?php echo ($data[0]["role_name"]); ?>" name="username"  class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >选择角色权限:</label>

            <div style="margin-left: 30px;">
                <ul id="tt" class="easyui-tree" data-options="url:''"></ul>
            </div>
        </div>
        <input type="button" id="tijiao" value="更新" style="">
    </form>

</div>
</body>
</html>