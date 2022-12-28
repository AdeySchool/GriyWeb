<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>数据后台管理</title>
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">        
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                            <h4>IP白名单：</h4>
                        </li>
                    </ul>

            </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">🔰新增白名单IP🔰：</h4>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>IP：</label>
                                                <input name="xzip" type="text" class="form-control" placeholder="请输入IP：">
                                            </div>
                                            <button name="cjyh" type="submit" class="btn btn-info btn-fill pull-right">提交</button>
                                        </div>
                                    </div>                
                                    <div class="clearfix"></div>
                                    <?php
                                    require_once 'config/config_mysql.php';
                                    if (isset($_POST['cjyh'])) {
                                        $ip=trim($_POST["xzip"]);
                                        $zc_sql="INSERT INTO iptable (ip) VALUES ('$ip');"; 
                                        if ($ip == '') {
                                            echo "<h6 align='center'>IP不能为空！</h6>";
                                        }else{
                                            $search_user="select * from $Mysql_table where ip='$ip'";
                                            $search_run=$connection->query($search_user);
                                            if ($search_run->num_rows >= 1 ){
                                                echo "<h5 align='center'>此IP已存在!</h5>";
                                            }else{
                                                $zc_run=$connection->query($zc_sql);
                                                if (!$zc_run){
                                                    echo  "<h6 align='center'>IP白名单创建失败！</h6><br><br>";
                                                }else{
                                                    echo "<h6 align='center'>IP白名单创建成功！</h6><br><br>";
                                                }
                                            }
                                            
                                        } 
                                    }
                                    ?> 
                                    <br>
                                    <br>
                                </form>
                            </div>
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
