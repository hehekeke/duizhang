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
<h1>组织部门信息维护</h1>
<a href="http://localhost/lunwen/index.php/Home/System/todept_add">添加部门信息</a>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
        <td>部门名称</td><td colspan="2" style="text-align: center;">部门操作</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td > <?php echo ($vo["text"]); ?> </td>
            <td > <a href="http://localhost/lunwen/index.php/Home/System/todept_update/did/<?php echo ($vo["id"]); ?>">更新</a> </td>
            <td > <a href="http://localhost/lunwen/index.php/Home/System/todept_del/did/<?php echo ($vo["id"]); ?>" class="del">删除</a> </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>