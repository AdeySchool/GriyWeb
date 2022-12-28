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
    </style>
</head>
<body>
<main class="main" role="main">
    <div class="container">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form  method="post" class="form-container">
                    <br>
                    <h2 align="center"><font color='#4286F3'>A</font><font color='#EB4334'>d</font><font color="#FBBD06">e</font><font color="#35AA53">y</font> <font color='#4286F3'>R</font><font color='#EB4334'>e</font><font color="#FBBD06">g</font><font color="#35AA53">i</font><font color='#4286F3'>s</font><font color='#EB4334'>t</font><font color="#FBBD06">e</font><font color="#35AA53">r</font></h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">1️⃣用户:</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" maxlength="16" aria-describedby="emailHelp" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">2️⃣微信号：</label>
                        <input name="wxnumber" type="text" class="form-control"  id="exampleInputwxnumber" placeholder="请输入微信号码：">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">3️⃣QQ号:</label>
                        <input name="qqnumber" type="text" class="form-control"  maxlegth="13" id="exampleInputPassword1" placeholder="请输入QQ号: ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">4️⃣电话号码:</label>
                        <input name="phone" type="text" class="form-control" id="exampleInputPassword1" maxlength="16" placeholder="请输入电话号码：">                                 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">6️⃣密码:</label>
                        <input name="password" type="text" class="form-control" id="exampleInputPhone" maxlength="11" placeholder="请输入密码：">                                 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">7️⃣安全码:</label>
                        <input name="code" type="text" class="form-control" maxlegth="6" id="exampleInputcodenumber" placeholder="请输入安全码：">
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
                        echo "<div class='form-group'><label for='exampleInputip'>8️⃣IP地址:</label><input name='ip' type='text' disabled='disabled' class='form-control'  maxleggth='6' id='exampleInputip' placeholder='IP定位：$ip'></div> ";
                    }
                    ?>                 
                    <button name="submit" type="submit" class="btn btn-success btn-block">注册用户</button>
                </form>
                
            
            </div>
        </div>
    </div>
</main>
<?php
header('Content-type:text/html; charset=utf-8');

// 开启Session
require_once 'adminbot/dobut/config/config_mysql.php';
if (isset($_POST['submit'])) {
    $user=trim($_POST["username"]);
    $pass=trim($_POST["password"]);
    $code=trim($_POST["code"]);
    $wxnumber=trim($_POST['wxnumber']);
    $qqnumber=trim($_POST['qqnumber']);
    $sjnumber=trim($_POST['phone']); 
    if (($user == '') || ($pass == '') || ($code == '') || ($wxnumber == '') || ($qqnumber == '') || ($sjnumber == '')) {
        echo "<script>alert('表单不能为空！');</script>";
        exit;
    }
    $search_user="select * from $Mysql_table where user='$user';";
    $search_run=$connection->query($search_user);
    if ($search_run->num_rows >= 1 ){
        echo "<script>alert('$user 用户已存在!');</script>";
        exit;
    }else{
        $zc_sql="INSERT INTO $Mysql_table (user, pass,code,wechat,qqchat,phone) VALUES ('$user', '$pass','$code','$wxnumber','$qqnumber','$sjnumber');";
        $zc_run=$connection->query($zc_sql);
        if (!$zc_run){
            echo  "<script>alert('注册失败.请重试！');</script>";
        }else{
            echo "<script>alert('用户$user.注册成功!.');</script>";
            sleep(3);
            header("Location:index.php");
            exit;
        }  
    }
}
