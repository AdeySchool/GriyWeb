<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
<link rel="shortcut icon" href="adminbot/dobut/assets/img/an.ico" >
<title>SearchST</title>
<style>


* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
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
</head>
<body>

<div align="center">
  <img src="adminbot/dobut/assets/img/Saerchst.png" width="300px">
</div>
<form method="post" class="example" style="margin:auto;max-width:600px">
  <input type="text" placeholder="搜索.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<?php
require_once 'adminbot/dobut/config/config_mysql.php';
if (trim($_POST['search']) != ''){
  $user=trim($_POST['search']);
  $search_sql="select * from dict where user='$user';";
  $search_run=$connection->query($search_sql);
  if ($search_run->num_rows > 0){
    while($row=$search_run->fetch_assoc()){
      $user=$row['user'];
      $qq=$row['qqchat'];
      $wx=$row['wechat'];
      $phone=$row['phone'];
      echo "<h5 align='center'>姓名：$user</h6>";
      echo "<h5 align='center'>QQ： $qq</h6>";
      echo "<h5 align='center'>微信：$wx</h6>";
      echo "<h5 align='center'>电话号码：$phone</h6>";
    }
  }
}
?>
</body>
</html>