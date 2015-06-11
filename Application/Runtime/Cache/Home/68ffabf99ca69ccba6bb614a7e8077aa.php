<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="/src/assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="/src/assets/css/main-min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/src/assets/js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="/src/assets/js/bui-min.js"></script>
    <script type="text/javascript" src="/src/assets/js/common/main-min.js"></script>
    <script type="text/javascript" src="/src/assets/js/config-min.js"></script>
</head>
<body>

</body>
</html>



    <style type="text/css">
        body {
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">
    导入日期：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>导入日期</th>
        <th>项目编号</th>
        <th>译员</th>
        <th>稿件类型</th>
        <th>接稿日期</th>
        <th>交稿日期</th>
        <th>字数</th>
        <th>单价</th>
        <th>金额</th>
        <th>文件名</th>
        <th>承接范围</th>
        <th>状态说明</th>
        <th>确定状态说明</th>
        <th>操作说明</th>
    </tr>
    </thead>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo['xm_yuefen']); ?></td>

            <td style="max-width: 70px;"><?php echo ($vo['xm_id']); ?></td>
            <td>王宇奇</td>
            <td>稿件类型</td>
            <td><?php echo ($vo['xm_cjsj']); ?></td>
            <td><?php echo (msubstr($vo['xm_tjsj'],0,10)); ?></td>
            <td><?php echo ($vo['xm_zs']); ?></td>
            <td><?php echo ($vo['xm_dj']); ?></td>
            <td><?php echo ($vo['xm_je']); ?></td>
            <td style="max-width: 100px;"><?php echo ($vo['xm_fyfx']); ?></td>
            <td style="max-width: 100px;" ><?php echo ($vo['xm_cjfw']); ?></td>
            <td></td>
            <td>
                <?php if($vo['xm_fkzt'] == 3): ?><span style="color: green">已经确定</span>

                    <?php else: ?>输出的内容3<?php endif; ?>
            </td>
            <td>
                <a href="edit.html">修改</a>
                <a class="del" id="<?php echo ($vo['id']); ?>" href="">删除</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<div class="result page"><?php echo ($page); ?></div>
</body>
</html>
<script>
    $(function () {
        $(".del").click(function(){
            var id= $(this).attr("id");
            $.post("http://localhost/index.php/home/Bill/Bill_del",{id:id},function(data){
                if(data == 0){
                    alert("删除成功");
                    window.location.reload();

                }else if(data == 1){
                    alert("删除失败");
                }
            });
            return false;
        });

        $('#addnew').click(function(){

            window.location.href="add.html";
        });


    });

    function del(id)
    {


        if(confirm("确定要删除吗？"))
        {

            var url = "index.html";

            window.location.href=url;

        }




    }
</script>