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
            $('#cc').combotree({
                url: 'http://localhost/lunwen/index.php/home/dept/dept_tree',
                required: true
            });
            $('#device_type').combobox({
                url:'http://localhost/lunwen/index.php/home/device/device_type_data',
                valueField:'id',
                textField:'device_type'
            });
        });
    </script>

</head>
<body>
<h2>固定资产使用状态</h2>
<div style="margin-left: 20px;">
    <h3>查询条件</h3>
    <form name="form1"  method="post" action="http://localhost/lunwen/index.php/home/tongji/is_used">
        设备所属部门:  <input id="cc" name="dept" value="<?php echo ($dept); ?>">

        设备类型：<input id="device_type" name="device_type" value="<?php echo ($device_type); ?>">

        <input id="tijao1" type="submit"  value="查询">

    </form>


</div>
<div style="margin-left: 20px;">
</div>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
       <td>设备名称</td><td>所属部门</td><td>设备类型</td><td>设备数量</td><td>总使用年限</td><td>已使用年限</td><td>折旧评估</td><td>是否闲置</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["is_warning"] == 0 ): ?><tr style="">

                <td > <?php echo ($vo["device_name"]); ?></td>
                <td > <?php echo ($vo["dept"]); ?> </td>
                <td > <?php echo ($vo["device_type"]); ?> </td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["retirement_life"]); ?> </td>
                <td > <?php echo ($vo["use_year"]); ?> </td>
                <td > <?php echo ($vo["zhejiulv"]); ?> </td>
                <td >
                    <?php if($vo["is_used"] == 0 ): ?>闲置中
                    <?php else: ?>
                            使用中<?php endif; ?>
                </td>
            </tr>

            <?php else: ?>
            <tr style="color: #ff0000">
                <td > <?php echo ($vo["device_name"]); ?>(及时购买)</td>
                <td > <?php echo ($vo["dept"]); ?> </td>
                <td > <?php echo ($vo["device_type"]); ?> </td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["retirement_life"]); ?> </td>

                <td > <?php echo ($vo["use_year"]); ?> </td>
                <td > <?php echo ($vo["zhejiulv"]); ?> </td>
                <td >
                    <?php if($vo["is_used"] == 0 ): ?>闲置中
                        <?php else: ?>
                        使用中<?php endif; ?>
                </td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>