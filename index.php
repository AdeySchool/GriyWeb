
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="adminbot/dobut/assets/img/an.ico" >
    <title>Adey-Login</title>
    <style>
        body{
            background: url('');
            background-repeat:no-repeat;
            background-size:100%;
        }
        label{
            color:#00a2ff;
        }
        a:hover {
			color:"#FFFFF";
			text-decoration:none;
		}
    </style>
</head>
<body>
<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form  method="post" class="form-container">
                    <br>
                    <h2 align="center">Adey-Login</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户:</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" maxlength="16" aria-describedby="emailHelp" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密码:</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" maxlength="16" placeholder="请输入密码：">                                 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">安全码:</label>
                        <input name="codenumber" type="text" class="form-control"  maxleggth="6" id="exampleInputPassword1" placeholder="请输入安全码：">
                    </div>
                    <?php
                    require_once 'adminbot/dobut/config/config_mysql.php';
                    function get_onlineip() {
                        return $_SERVER['REMOTE_ADDR'];
                    }
                    $ip=get_onlineip();
                    $time_now=date("Y-m-d H:i:s");
                    $ip_sql="INSERT INTO ip_log  (ip,time) VALUES ('$ip','$time_now');";
                    $ip_log_run=$connection->query($ip_sql);
                    if (!$ip_log_run){
                        echo '';
                    }else{
                        echo "<div class='form-group'><label for='exampleInputip'>IP地址:</label><input name='ip' type='text' disabled='disabled' class='form-control'  maxleggth='6' id='exampleInputip' placeholder='IP定位：$ip'></div> ";
                    }
                    ?>                 
                    <div class="form-group">
                    <input type="checkbox" name="remember" class="" value="yes">自动登录
                    </div> 
                    <button name="submit" type="submit" class="btn btn-success btn-block">登录</button>
                    <br>
                    <button name="zcyh" type="submit" class="btn btn-success btn-block">注册用户</button>
                    <?php
                    if (isset($_POST["zcyh"])){
                        header("Location:register.php");
                    }
                    ?>
                    </form>
                
            
            </div>
        </div>
    </div>
</main>
<?php
header('Content-type:text/html; charset=utf-8');

// 开启Session
require_once 'adminbot/dobut/config/config_mysql.php';
session_start();
if (isset($_POST['submit'])) {
    $user=trim($_POST["username"]);
    $pass=trim($_POST["password"]);
    $code=trim($_POST["codenumber"]);
    if (($user == '') || ($pass == '') || ($code == '')) {
        echo "<script>alert('用户名和密码和安全码不能为空');</script>";
        exit;
    }else{
        $sql="select * from $Mysql_table where user='$user' and pass='$pass' and code='$code';";
        $run=$connection->query($sql);
        if ($run->num_rows > 0){
            echo "<script>alert('登录成功');</script>";
            $_SESSION['username'] = $user;
            $_SESSION['islogin'] = 1;
            sleep(3);
            header("Location:search.php");
            exit;
        }else{
            echo  "<script>alert('登录失败');</script>";
        }        
    }
    if ($_POST['remember'] == "yes") {
           setcookie('username', $user, time()+7*24*60*60);
           setcookie('code', sha1(base64_encode(md5($user.md5($pass)))), time()+7*24*60*60);
        } 
        $connection->close();
}
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>