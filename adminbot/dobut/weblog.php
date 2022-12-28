<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Web安全日志2</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="shortcut icon" href="assets/img/an.ico" >
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
        
                    <div class="col-md-12">
                        <div class="card card-plain">
                            <div class="header">
                                <h4 class="title">Web安全日志2.0</h4>
                                <p class="category">记录访问IP,限制IP访问</p>
                                <form method="post">
                                    <input name="submit" value="清空Web日志" type="submit"/>
                                </form>   
                                <?php
                                require_once 'config/config_mysql.php';
                                session_start();
                                if (isset($_POST['submit'])) {
                                    $clear_log_sql="truncate table ip_log;";
                                    $clear_log_run=$connection->query($clear_log_sql);
                                    if (!$clear_log_run){
                                        echo "<h6 align='center'>清空Web日志失败!</h6>";
                                    }else{
                                        echo "<h6 align='center'>清空数据成功！</h6>";
                                    }
                                }
                                ?>
                            
                            </div>
                            
                                       
                            
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead><th>访问ID</th><th>访问IP地址</th><th>访问时间</th></thead>
                                    <tbody>
                                       <?php
                                       require_once 'config/config_mysql.php';
                                       $sqlread="select * from ip_log;";
                                       $adey=$connection->query($sqlread);
                                       if($adey->num_rows > 0){ 
                                        while($row=$adey->fetch_assoc()){
                                            $fwid=$row['id'];
                                            $fwip=$row['ip'];
                                            $fwtime=$row['time'];
                                            echo "<tr>"."<td>$fwid</td>"."<td>$fwip</td>"."<td>$fwtime</td>"."</tr>";
                                        }
                                       }
                                       $number=1+$adey->num_rows;
                                       echo "</tbody>"."</table>";
                                       echo '';                     
                                       ?>
                                       

                                    </tbody>
                                </table>
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
