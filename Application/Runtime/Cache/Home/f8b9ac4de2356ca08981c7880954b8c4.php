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
            $(".del").click(function(){
                return confirm("是否确认删除");
            });
        });
    </script>
</head>
<body>
<h1>固定资产合同列表</h1>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
        <td>设备名称</td><td>所属部门</td><td>设备类型</td><td>合同文件</td>><td colspan= 2 style="text-align: center;">合同操作</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td > <?php echo ($vo["device_name"]); ?> </td>
            <td > <?php echo ($vo["dept"]); ?> </td>
            <td > <?php echo ($vo["device_type"]); ?> </td>
            <td>
                <?php if($vo["agreement"] == 'null' ): ?>无合同
                    <?php else: ?>
                    <a href="http://localhost/lunwen/index.php/home/Agreement/download/fid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["agreement"]); ?></a><?php endif; ?>

            </td>
            <td ><a href="http://localhost/lunwen/index.php/home/Agreement/toAdd_agree/fid/<?php echo ($vo["id"]); ?>"> 添加/更新</a> </td>
            <td ><a href="http://localhost/lunwen/index.php/home/Agreement/todel_agree/fid/<?php echo ($vo["id"]); ?>" class="del" > 删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>