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
    <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/style.css" />
    <script type="text/javascript" src="/src/js/jquery.js"></script>
    <script type="text/javascript" src="/src/js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/src/js/bootstrap.js"></script>
    <script type="text/javascript" src="/src/js/ckform.js"></script>
    <script type="text/javascript" src="/src/js/common.js"></script>
    <style type="text/css">
        .page{
            width:520px;
            float:right;
            font-size:16px;
            margin-top:15px;
            margin-top:10px;

        }
        .current,.next,.end,.prev,.first{
            float: left;
            /*display: block;*/
        }
        .current{
            width: 28px;
            height: 18px;
            background-color: blue;
            border-radius: 2px;
            padding-top: 2px;
            line-height: 15px;
            text-align: center;
            border: 1px #ccc solid;
            color: #fff;
        }
        .num,.end,.first{
            display: block;
            float: left;
            width: 28px;
            height: 18px;
            background-color: #fff;
            border-radius: 2px;
            color:black;
            border: 1px #ccc solid;
            line-height: 15px;
            text-align: center;
            padding-top: 2px;

        }
    </style>
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

</body>
</html>
</head>
<body>
<form class="form-inline definewidth m20" action="index.html" method="get">    
    用户名称：
    <input type="text" name="username" id="username"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;  
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>ID</th>
        <th>登录账号</th>
        <th>姓名</th>
        <th>用户组群</th>
        <th>账号状态</th>
        <th>管理</th>
    </tr>
    </thead>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($m["u_id"]); ?></td>
                <td><?php echo ($m["u_name"]); ?></td>
                <td><?php echo ($m["u_mingzi"]); ?></td>
                <td>译员用户</td>
                <?php if(($m["u_kaitong"] == 1)): ?><td><span style="color:green">账号正常</span>|禁用</td>
                     <?php elseif($m["u_kaitong"] == 0): ?><td><span style="color:red">已被锁定</span>|恢复</td><?php endif; ?>

                <td>
                    <a href="/index.php/Home/Member/editMember?id=<?php echo ($m["u_id"]); ?>">编辑</a>|<a href="/index.php/Home/Member/deleteMember?id=<?php echo ($m["u_id"]); ?>">删除</a>                
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>	
</table>
<style type="text/css">
    .page{
        width:520px;
        float:right;
        font-size:16px;
        margin-top:15px;
        margin-top:10px;
     
    }
    .current,.next,.end,.prev,.first{
        float: left;
        /*display: block;*/
    }
    .current{
     width: 28px;
     height: 18px;
     background-color: blue;
     border-radius: 2px;
     padding-top: 2px;
     line-height: 15px;
     text-align: center;
     border: 1px #ccc solid;
     color: #fff;
    }
    .num,.end,.first{
        display: block;
        float: left;
        width: 28px;
        height: 18px;
        background-color: #fff;
        border-radius: 2px;
        color:black;
        border: 1px #ccc solid;
        line-height: 15px;
        text-align: center;
        padding-top: 2px;
     
    }
</style>
<div class="page">
    <?php echo ($page); ?>
</div>
</body>
</html>
<script>
    $(function () {
        

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