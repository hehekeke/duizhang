<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/src/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/src/css/style.css" />
    <script type="text/javascript" src="/src/js/jquery.js"></script>
    <script type="text/javascript" src="/src/js/jquery.sorted.js"></script>
    <script type="text/javascript" src="/src/js/bootstrap.js"></script>
    <script type="text/javascript" src="/src/js/ckform.js"></script>
    <script type="text/javascript" src="/src/js/common.js"></script>

 

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
<form action="/index.php/Home/Member/submitEditMember" method="post" class="definewidth m20">
<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><input type="hidden" name="id" value="<?php echo ($user["u_id"]); ?>" />
    <table class="table table-bordered table-hover definewidth m10">
        <tr>
            <td width="10%" class="tableleft">登录账号</td>
            <td><input type="text" name="username" value="<?php echo ($user["u_name"]); ?>"/></td>
        </tr>
        <tr>
            <td class="tableleft">密码</td>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <td class="tableleft">姓名</td>
            <td><input type="text" name="realname" value="<?php echo ($user["u_mingzi"]); ?>"/></td>
        </tr>
        
        <tr>
            <td class="tableleft">账号状态</td>
            <td>
                <input type="radio" name="status" value="1"
                    <?php if(($user["u_kaitong"]) == "1"): ?>checked<?php endif; ?> /> 正常
              <input type="radio" name="status" value="0"
                    <?php if(($user["u_kaitong"]) == "0"): ?>checked<?php endif; ?> /> 禁用
            </td>
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary" type="button">保存</button>				 &nbsp;&nbsp;
                <button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table><?php endforeach; endif; else: echo "" ;endif; ?>
</form>
</body>
</html>
<script>
    $(function () {       
		$('#backid').click(function(){
				window.location.href="<?php echo U('User/index');?>";
		 });

    });
</script>