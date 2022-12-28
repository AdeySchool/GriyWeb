<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="assets/img/an.ico" >
	<title>用户数据</title>

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
  echo "您还没有登录.</a>";
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
                    <a class="navbar-brand" href="">用户数据Show:</a>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">🔒用户数据🔒：</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            <?php
                            require_once 'config/config_mysql.php';
                            $sqlread="select * from dict;";
                            $adey=$connection->query($sqlread);
                            if($adey->num_rows > 0){ // num_rows是指记录的数量.  //$adey->num_rows等于4.
                                echo '<table class="table table-hover table-striped"><thead><th>用户ID</th><th>用户名</th><th>微信号</th><th>QQ号</th><th>用户密码</th><th>安全码</th></thead><tbody>';
                                while($row=$adey->fetch_assoc()){
                                    // echo "id:".$row["id"]."</br>"."webname:".$row["webname"]."</br>"."webemail:".$row["webemail"]."</br>";
                                    $userpass=$row["pass"];
                                    $user_name=$row["user"];
                                    $user_code=$row["code"];
                                    $user_id=$row["id"];
                                    $user_wx=$row["wechat"];
                                    $user_qq=$row['qqchat'];
                                    /*echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$userpass</td>"."<td>$user_code</td>"."<td>$user_wx</td>"."<td>$user_qq</td>"."</tr>";*/
                                    echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_wx</td>"."<td>$user_qq</td>"."<td>$userpass</td>"."<td>$user_code</td>"."</tr>";
                                }
                            }
                            $number=1+$adey->num_rows;
                            echo "</tbody>"."</table>";
                            ?>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <a href="javascript:location.reload(true)"><button type="submit" class="btn btn-info btn-fill pull-right">刷新数据</button></a>
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
