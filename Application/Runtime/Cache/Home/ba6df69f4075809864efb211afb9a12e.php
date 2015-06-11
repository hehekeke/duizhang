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
            $('#device_type').combobox({
                url:'http://localhost/lunwen/index.php/home/device/device_type_data',
                valueField:'id',
                textField:'device_type'
            });
        });
    </script>
</head>
<body>
<div style="margin-top: 20px;margin-left: 50px;">
    <h1>固定资产采购申请</h1>
    <form id="add_from"  method="post" action="http://localhost/lunwen/index.php/home/Purchase/fixed_purchase">
        <div style="margin-top: 10px;">
            <label>设备名:</label>
            <input  name="name" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >数量:</label>
            <input  name="num" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >预计采购总价:</label>
            <input  name="yuji" class="easyui-validatebox" data-options="required:true,validType:'missingMessage'" />
        </div>
        <div style="margin-top: 10px;">
            <label >供货商选择:</label>
           <div>
               <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                       <label><input name="pqID" type="radio" value="<?php echo ($vo["gonghuoshang"]); ?>" /> <?php echo ($vo["gonghuoshang"]); ?> </label>
                   </tr><?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
        </div>
            <input type="submit" value="提交" style="">
    </form>

</div>


</body>
</html>