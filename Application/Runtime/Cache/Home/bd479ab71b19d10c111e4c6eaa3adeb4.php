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
    <h1>删除组织部门信息</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/system/dept_del">
        <input  name="id" value="<?php echo ($data1[0]["id"]); ?>"  type="hidden">
        <div style="margin-top: 10px;">
            <label for="" >部门名称:<?php echo ($data1[0]["text"]); ?></label><br/>
            <?php if($data == '' ): ?>该部门下面没有科室，你可以删除该部门<br/>
                <input type="submit" value="删除" style="">
                <?php else: ?>
                该部门下面有如下科室:<br/>


                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="color: #ff0000">
                            <td ><?php echo ($vo["text"]); ?></td><br/>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             <span style="color: #ff0000">请先去科室信息维护处理这个科室信息</span><?php endif; ?>

        </div>
    </form>

</div>
</body>
</html>