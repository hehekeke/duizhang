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
    <script  language="javascript">
        $(function(){
            $('#device_type').combobox({
                url:'http://localhost/lunwen/index.php/home/device/device_type_data',
                valueField:'id',
                textField:'device_type'
            });
            $('#cc').combotree({
                url: 'http://localhost/lunwen/index.php/home/dept/dept_tree',
                required: true
            });
            $("#tijiao2").click(function(){
                document.getElementById('formid').action="http://localhost/lunwen/index.php/home/Fixedassets/shengchengbaobiao";
            });

            $("#tijiao2").click(function(){
                document.getElementById('formid').action="http://localhost/lunwen/index.php/home/Fixedassets/shengchengbaobiao";
            });
        });
        function chaxun(){
            document.getElementById('formid').action="http://localhost/lunwen/index.php/home/Fixedassets/fix_lookfor";
            document.getElementById('formid').submit();
        }
        function chaxun2(){
            document.getElementById('formid').action="http://localhost/lunwen/index.php/home/Fixedassets/shengchengbaobiao";
            document.getElementById('formid').submit();
        }
    </script>
</head>
<body>
<div style="margin-left: 20px;">
    <h3>查询条件</h3>
    <form name="form1" id="formid" method="post" action="">
        设备所属部门:  <input id="cc" name="dept" value="<?php echo ($dept); ?>">
        时间：<input  name="buy_time_start" value="<?php echo ($buy_time_start); ?>" onClick="WdatePicker()" class="Wdate"  type="text">
                 -
              <input  name="buy_time_end" value="<?php echo ($buy_time_end); ?>" onClick="WdatePicker()" class="Wdate"  type="text"><br/>
        设备类型：<input id="device_type"  style="width:60px;" name="device_type" value="" data-options="required:true,validType:'missingMessage'">
        购买金额：<input type="text" name="money_low" style="width:60px;" value="<?php echo ($money_low); ?>">  - <input value="<?php echo ($money_high); ?>" type="text" name="money_high" style="width:60px;">

         <input id="tijao1" type="button" onclick="chaxun()" value="查询">
        <input id="tijiao2" type="button" onclick="chaxun2()" value="查询并生成报表">

    </form>


</div>
<table cellpadding=3 cellspacing=5 border="1px solod red">
    <tr>
       <td>设备名称</td><td>所属部门</td><td>设备类型</td><td>购买时间</td><td>购买数量</td><td>购买单价</td><td>使用年限</td>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

            <td > <?php echo ($vo["device_name"]); ?> </td>
            <td > <?php echo ($vo["dept"]); ?> </td>
            <td > <?php echo ($vo["device_type"]); ?> </td>
            <td > <?php echo ($vo["buy_time"]); ?> </td>
            <td > <?php echo ($vo["num"]); ?> </td>
            <td > <?php echo ($vo["buy_money"]); ?> </td>
            <td > <?php echo ($vo["retirement_life"]); ?> </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
    </tr>
</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>