<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>后台管理系统</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</head>
<body>

</body>
</html>
 </head>
 <body>

  <div class="header">
    
      <div class="dl-title">
       <!--<img src="/chinapost/Public/assets/img/top.png">-->
      </div>

    <div class="dl-log">欢迎您，<span class="dl-log-user">root</span><a href="/chinapost/index.php?m=Public&a=logout" title="退出系统" class="dl-log-quit">[退出]</a>
    </div>
  </div>
   <div class="content">
    <div class="dl-main-nav">
      <div class="dl-inform"><div class="dl-inform-title"><s class="dl-inform-icon dl-up"></s></div></div>
      <ul id="J_Nav"  class="nav-list ks-clear">
        		<li class="nav-item dl-selected"><div class="nav-item-inner nav-home">系统管理</div></li>		<li class="nav-item dl-selected"><div class="nav-item-inner nav-order">业务管理</div></li>       

      </ul>
    </div>
    <ul id="J_NavContent" class="dl-tab-conten">

    </ul>
   </div>
  <script>
    BUI.use('common/main',function(){
      var config = [{id:'1',menu:[
          {text:'系统管理',items:[

              {id:'1',text:'译员管理',href:'/index.php/Home/Member/yiyuan_list'},
              {id:'2',text:'管理员列表',href:'Role/index.html'},
              {id:'3',text:'账单列表',href:'/index.php/home/Bill/Bill_list'},
              {id:'4',text:'译员反馈',href:''}
          ]
          },
          {text:'译员中心',items:[
              {id:'5',text:'资料维护',href:'/index.php/home/'},
              {id:'6',text:'角色管理',href:'Role/index.html'},
              {id:'7',text:'账单列表',href:'http://localhost/index.php/home/Bill/Bill_list'},
              {id:'8',text:'菜单管理',href:'Menu/index.html'}
          ]
          }
          ,]},
          {id:'7',homePage : '9',menu:[{text:'业务管理',items:[{id:'9',text:'查询业务',href:'Node/index.html'}]}]}];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });
  </script>

 </body>
</html>