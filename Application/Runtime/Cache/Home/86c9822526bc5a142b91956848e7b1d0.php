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
                       var id = $(this).attr("id");
                        $.post(
                                "http://localhost/lunwen/index.php/Home/System/office_del",{
                                   "fid":id
                                },function(data){
                                    var data=eval("("+data+")");
                                    if(data.status == 0){
                                        alert(data.msg);
                                    }else if(data.status == 1){
                                        window.location.href = "http://localhost/lunwen/index.php/Home/System/office_list";
                                    }
                                }
                        )
                    });
                });
    </script>
</head>
<body>

<div style="float: left;">
    <h1>科室信息维护</h1>
    <a href="http://localhost/lunwen/index.php/Home/System/tooffice_add">添加科室信息</a>
    <table cellpadding=3 cellspacing=5 border="1px solod red">
        <tr>
            <td>科室名称</td><td>科室所属部门</td><td colspan="2" style="text-align: center;">部门操作</td>
        </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td > <?php echo ($vo["text"]); ?> </td>
                <td > <?php echo ($vo["parent"]); ?> </td>
                <td > <a href="http://localhost/lunwen/index.php/Home/System/tooffice_update/did/<?php echo ($vo["id"]); ?>">更新</a> </td>
                <td  > <input type="button" id="<?php echo ($vo["id"]); ?>" value="删除" class="del"/></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
        </tr>
    </table>
    <div class="result page"><?php echo ($page); ?></div>
</div>
<div style="float: left;margin-left: 60px;margin-top: 100px;">
    <ul class="easyui-tree" data-options="url:'http://localhost/lunwen/index.php/home/dept/dept_tree'"></ul>
</div>


</body>
</html>