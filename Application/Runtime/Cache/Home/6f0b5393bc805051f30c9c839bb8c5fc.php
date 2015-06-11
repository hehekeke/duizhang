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
            $("#tijiao").click(function(){
               var data = $('#cc').combotree('getValues');
                var t = $('#cc').combotree('tree');	// get the tree object
                var n = t.tree('getSelected');		// get selected node
                var dept_name = n.text
                $.post("http://localhost/lunwen/index.php/Home/ManagerMoney/money_search",{
                              "dept_id":data
                         },function(data){
                            $("#dept_name").html(dept_name);

                        }
                );
            });
        });
    </script>
</head>
<body>
<h1>查询科室固定资产财务数据</h1>

<div style="margin-top: 10px;margin-bottom: 30px;">
    <h3>查询条件</h3>
    <form name="form1"  method="post" action="http://localhost/lunwen/index.php/Home/ManagerMoney/money_search">
        <label>设备所属部门:</label>
        <input id="cc" name="dept" value="<?php echo ($dept); ?>">
        <input type="submit"  value="提交">
    </form>

</div>
<div>
    <span id="dept_name" style="color: blue;">该部门</span>的详细固定资产财务数据如下：
    <table style="border: 1px solid #000000"  cellpadding=3 cellspacing=5 border="1px solod red">
        <tr>
            <td  style="border: 1px solid #000000">物品名</td>
            <td  style="border: 1px solid #000000">购买数量</td>
            <td  style="border: 1px solid #000000">原购买单价(元)</td>
            <td  style="border: 1px solid #000000">已用年限(元)</td>
            <td  style="border: 1px solid #000000">折旧比率</td>
            <td  style="border: 1px solid #000000">现价值(元)</td>
            <td  style="border: 1px solid #000000">物品类别</td>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                <td > <?php echo ($vo["device_name"]); ?> </td>
                <td > <?php echo ($vo["num"]); ?> </td>
                <td > <?php echo ($vo["buy_money"]); ?> </td>
                <td > <?php echo ($vo["use_year"]); ?> </td>
                <td > <?php echo ($vo["zhejiulv"]); ?> </td>
                <td > <?php echo ($vo["now_money"]); ?> </td>
                <td > <?php echo ($vo["device_type"]); ?> </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</div>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>