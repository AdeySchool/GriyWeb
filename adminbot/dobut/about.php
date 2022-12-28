<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<title>关于作者</title>
    <link rel="shortcut icon" href="assets/img/an.ico" >
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<?php
header('Content-type:text/html; charset=utf-8');
session_start();

if (isset($_COOKIE['username'])) {
  $_SESSION['username'] = $_COOKIE['username'];
  $_SESSION['islogin'] = 1;
}

if (isset($_SESSION['islogin'])) {
    echo "";
} else {
  echo "您还没有登录!";
  exit;
}

?>
<div class="wrapper">
<div class="sidebar"  data-image="assets/img/hh.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
            <h5 class="simple-text">
                    数据后台管理</h5>
            </div>

            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>后台首页</p>
                    </a>
                </li>
                <li>
                    <a href=" modify_data.php ">
                        <i class="pe-7s-user"></i>
                        <p>修改数据</p>
                    </a>
                </li>
                <li>
                    <a href="weblog.php">
                        <i class="pe-7s-note2"></i>
                        <p>网站日志</p>
                    </a>
                </li>
                <li>
                    <a href="whitelist.php">
                        <i class="pe-7s-paperclip"></i>
                        <p>IP白名单</p>
                    </a>
                </li>

                <li>
                    <a href="about.php">
                        <i class="pe-7s-bell"></i>
                        <p>关于作者</p>
                    </a>
                </li>
                

				<li class="active-pro">
                        <i class="pe-7s-rocket"></i>
                        <p>火箭开发中..</p>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">About 作者</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title" >作者简介：</h4>
                    </div>
                    <div class="content">
                    <p align="center">作者：Griy</p>
                    <p align="center">作者语录：Give it your best shot every time.</p>
                    <p align="center">关于作者：初中生一名.学习PHP开发1个月.会Python编程.会一下网络安全.</p>
                    <p align="center"><a href='https://github.com/AdeySchool'>作者Github</a>&emsp;&emsp;&emsp;&emsp;<a href='https://github.com/AdeySchool/GriyWeb'>Github项目地址</a></p>
                    <p align="center">
                        
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>
</html>
