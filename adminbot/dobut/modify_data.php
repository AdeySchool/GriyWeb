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
                    后台管理</h5>
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
                            <h4>用户密码数据：</h4>

                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                               
                            </a>
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
                                <h4 class="title">🔰新增修改数据🔰：</h4>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名字：</label>
                                                <input name="szuser" type="text" class="form-control" placeholder="请输入用户名字：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户密码：</label>
                                                <input name="szpassword" type="text" class="form-control" placeholder="请输入用户密码：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户安全码：</label>
                                                <input name="szcode" type="text" class="form-control" placeholder="请输入用户安全密码：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户微信：</label>
                                                <input name="szwx" type="text" class="form-control" placeholder="请输入用户微信：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户QQ</label>
                                                <input name="szqq" type="text" class="form-control" placeholder="请输入用户QQ:">
                                            </div>
                                            <div class="form-group">
                                                <label>用户手机号：</label>
                                                <input name="szsj" type="text" class="form-control" placeholder="请输入用户手机号：">
                                            </div>
                                            <button name="cjyh" type="submit" class="btn btn-info btn-fill pull-right">提交</button>
                                        </div>
                                    </div>                
                                    <div class="clearfix"></div>
                                    <?php
                                    require_once 'config/config_mysql.php';
                                    if (isset($_POST['cjyh'])) {
                                        $user=trim($_POST["szuser"]);
                                        $pass=trim($_POST["szpassword"]);
                                        $code=trim($_POST["szcode"]);
                                        $wxnumber=trim($_POST['szwx']);
                                        $qqnumber=trim($_POST['szqq']);
                                        $sjnumber=trim($_POST['szsj']);
                                        $zc_sql="INSERT INTO $Mysql_table (user, pass,code,wechat,qqchat,phone) VALUES ('$user', '$pass','$code','$wxnumber','$qqnumber','$sjnumber');"; 
                                        if (($user == '') || ($pass == '') || ($code == '') || ($wxnumber == '') || ($qqnumber == '') || ($sjnumber == '')) {
                                            echo "<h6 align='center'>表单不能为空！</h6>";
                                        }else{
                                            $search_user="select * from $Mysql_table where user='$user'";
                                            $search_run=$connection->query($search_user);
                                            if ($search_run->num_rows >= 1 ){
                                                echo "<h5 align='center'>$user 用户已存在!</h5>";
                                            }else{
                                                $zc_run=$connection->query($zc_sql);
                                                if (!$zc_run){
                                                    echo  "<h6 align='center'>创建失败！</h6>";
                                                }else{
                                                    echo "<h6 align='center'>创建成功！</h6>";
                                                }
                                            }
                                            
                                        } 
                                    }
                                    ?> 
                                
                                </form>
                                
                                
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="header">
                                <h4 class="title">🔰修改用户数据🔰：</h4>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名字：</label>
                                                <input name="username" type="text" class="form-control" placeholder="请输入用户名字：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户密码：</label>
                                                <input name="password" type="text" class="form-control" placeholder="请输入用户密码：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户安全码：</label>
                                                <input name="code" type="text" class="form-control" placeholder="请输入用户安全码：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户微信：</label>
                                                <input name="xgwx" type="text" class="form-control" placeholder="请输入修改内容：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户QQ：</label>
                                                <input name="xgqq" type="text" class="form-control" placeholder="请输入修改内容：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户手机号：</label>
                                                <input name="xgnumber" type="text" class="form-control" placeholder="请输入修改内容：">
                                            </div>
                                            <div class="form-group">
                                                <label>修改内容：</label>
                                                <input name="xgname" type="text" class="form-control" placeholder="请输入修改内容：">
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" name="box" id="1" value="user">修改用户名 &emsp;&emsp;
                                                <input type="radio" name="box" id="2" value="pass">修改用户密码 &emsp;&emsp;
                                                <input type="radio" name="box" id="3" value="code">修改用户安全码 &emsp;&emsp;
                                                <input type="radio" name="box" id="4" value="wx">修改用户微信号 &emsp;&emsp;
                                                <input type="radio" name="box" id="5" value="qq">修改用户QQ &emsp;&emsp;
                                                <input type="radio" name="box" id="6" value="sj">修改用户微信号 &emsp;&emsp;
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="xgsj" class="btn btn-info btn-fill pull-right">修改数据</button>
                                    <div class="clearfix"></div>
                                    <?php
                                    require_once 'config/config_mysql.php';
                                    if (isset($_POST['xgsj'])) {
                                        $user=trim($_POST["username"]);
                                        $pass=trim($_POST["password"]);
                                        $code=trim($_POST["code"]);
                                        $qqnumber=trim($_POST['xgqq']);
                                        $wxnumber=trim($_POST['xgwx']);
                                        $sjnumber=trim($_POST['xgnumber']);
                                        $xg=trim($_POST['xgname']);
                                        $box_list=trim($_POST['box']);
                                        if (($user == '') || ($pass == '') || ($code == '')) {
                                            echo "<h6 align='center'>用户名/密码/安全码不能为空！</h6>";
                                            exit;
                                        }
                                        if ($box_list == "user"){
                                            $xg_user="update $Mysql_table set user='$xg' where pass='$pass' and code='$code';";
                                            $zc_run=$connection->query($xg_user);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where pass='$pass' and code='$code';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>UserID</th><th>UserName</th><th>Password</th><th>Code</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                exit;
                                            }
                                        }elseif($box_list == "pass"){
                                            $xg_pass="update $Mysql_table set pass='$xg' where user='$user' and code='$code';";
                                            $zc_run=$connection->query($xg_pass);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where user='$user' and code='$code';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>UserID</th><th>UserName</th><th>Password</th><th>Code</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                
                                                exit;
                                            }
                                        }elseif($box_list == "code"){ 
                                            $xg_code="update $Mysql_table set code='$xg' where user='$user' and pass='$pass';";
                                            $zc_run=$connection->query($xg_code);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where user='$user' and pass='$pass';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>UserID</th><th>UserName</th><th>Password</th><th>Code</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                exit;
                                            }
                                        }elseif ($box_list == "wx"){
                                            $xg_wx="update $Mysql_table set wxchat='$xg' where user='$user' and pass='$pass' and code='$code' and qqchat='$qqnumber';";
                                            $zc_run=$connection->query($xg_wx);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where user='$user' and pass='$pass' and code='$code' and qqchat='$qqnumber';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>用户ID</th><th>用户名</th><th>用户微信</th><th>用户QQ</th><th>用户密码</th><th>用户安全码</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                $user_wx=$row['wechat'];
                                                $user_qq=$row['qqchat'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_wx</td>"."<td>$user_qq</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                exit;
                                            }
                                            
                                        }elseif ($box_list == "qq"){
                                            $xg_qq="update $Mysql_table set qqchat='$xg' where user='$user' and pass='$pass' and code='$code' and wxchat='$wxnumber';";
                                            $zc_run=$connection->query($xg_qq);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where user='$user' and pass='$pass' and code='$code' and wxchat='$wxnumber';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>用户ID</th><th>用户名</th><th>用户微信</th><th>用户QQ</th><th>用户密码</th><th>用户安全码</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                $user_wx=$row['wechat'];
                                                $user_qq=$row['qqchat'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_wx</td>"."<td>$user_qq</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                exit;
                                            }  
                                        }elseif ($box_list == "sj"){
                                            $xg_qq="update $Mysql_table set phone='$xg' where user='$user' and pass='$pass' and code='$code' and wxchat='$wxnumber' and qqchat='$qqnumber';";
                                            $zc_run=$connection->query($xg_qq);
                                            if (!$zc_run){
                                                echo  "<h6 align='center'>修改数据失败！请检查用户名/密码/安全码</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>修改数据成功！</h6>";
                                                $read_sql="select * from  $Mysql_table where user='$user' and pass='$pass' and code='$code' and wxchat='$wxnumber';";
                                                $adey=$connection->query($read_sql);
                                                $row=$adey->fetch_assoc();
                                                echo '<table class="table table-hover table-striped"><thead><th>用户ID</th><th>用户名</th><th>用户微信</th><th>用户QQ</th><th>用户密码</th><th>用户安全码</th></thead><tbody>';
                                                $user_id=$row['id'];
                                                $user_name=$row['user'];
                                                $user_pass=$row['pass'];
                                                $user_code=$row['code'];
                                                $user_wx=$row['wechat'];
                                                $user_qq=$row['qqchat'];
                                                echo "<tr>"."<td>$user_id</td>"."<td>$user_name</td>"."<td>$user_wx</td>"."<td>$user_qq</td>"."<td>$user_pass</td>"."<td>$user_code</td>"."</tr>";
                                                exit;
                                            }  
                                        }
                                    }
                                    ?>       
                    
                                </form>
                                
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div class="header">
                                <h4 class="title">🔰删除用户数据：</h4>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名字：</label>
                                                <input name="scname" type="text" class="form-control" placeholder="请输入用户名字：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户密码：</label>
                                                <input name="scpass" type="text" class="form-control" placeholder="请输入用户密码：">
                                            </div>
                                            <div class="form-group">
                                                <label>用户安全码：</label>
                                                <input name="sccode" type="text" class="form-control" placeholder="请输入用户安全码：">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="scsj" class="btn btn-info btn-fill pull-right">删除数据</button>
                                    <div class="clearfix"></div>
                                    <?php
                                    require_once 'config/config_mysql.php';
                                    if (isset($_POST['scsj'])) {
                                        $user=trim($_POST["scname"]);
                                        $pass=trim($_POST["scpass"]);
                                        $code=trim($_POST["sccode"]);
                                        if (($user == '') || ($pass == '') || ($code == '')) {
                                            echo "<h6 align='center'>用户名/密码/安全码不能为空！</h6>";
                                            exit;
                                        }else{
                                            $sc_sql_sj="delete from $Mysql_table where user='$user' and pass='$pass' and code='$code';";
                                            $sc_run_sj_sql=$connection->query($sc_sql_sj);
                                            if (!$sc_run_sj_sql){
                                                echo "<h6 align='center'>删除数据失败！请检查用户名/密码/安全码 在重试！</h6>";
                                                exit;
                                            }else{
                                                echo "<h6 align='center'>删除数据成功！</h6>";
                                                exit;
                                            }
                                        }
                                    }
                                    ?>       
                    
                                </form>
                                
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/520.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="https://api.vvhan.com/api/avatar?class=nan" alt="..."/>

                                      <h4 class="title">AdeyCode<br/></h4>
                                    </a>
                                </div>
                                <br>
                                <p class="description text-center"> Emai：adeylove@qq.com <br>
                                                    语录： 你将不再是道具，而是人如其名的人.<br>
                                </p>
                            </div>  
                            <hr>
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
