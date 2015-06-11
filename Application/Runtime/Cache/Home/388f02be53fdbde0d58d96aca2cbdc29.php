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
//        $(function(){
//            $(".del").click(function(){
//                return confirm("是否确认删除");
//            });
//        });
    </script>
</head>
<body>
<h1>系统参数设置</h1>
<a href="http://localhost/lunwen/index.php/Home/System/toRole_add">添加角色信息</a>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
        <td>角色名称</td><td>权限序号</td><td colspan="2" style="text-align: center;">角色操作</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td > <?php echo ($vo["role_name"]); ?> </td>
            <td > <?php echo ($vo["authority_id"]); ?> </td>
            <td > <a href="http://localhost/lunwen/index.php/Home/System/toRole_update/did/<?php echo ($vo["id"]); ?>">更新</a> </td>
            <td > <a href="http://localhost/lunwen/index.php/Home/System/toRole_del/did/<?php echo ($vo["id"]); ?>" class="del">删除</a> </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>