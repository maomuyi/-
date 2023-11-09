<?php
session_start();
$name=$_SESSION['name'];
include ('mysqli_connect.php');

$sql = "select id from user_card where name='{$name}'";
$res = mysqli_query($dbc, $sql);
$result = mysqli_fetch_array($res);
$id = $result['id'];
// echo $id;
$sql="select name from user_card where id={$id}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的信息</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("image/1619102390435.jpeg") no-repeat;
            background-size:cover;
            color: antiquewhite;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">用户管理</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="user_index.php">主页</a></li>
                <li><a href="user_querybook.php">教材查询</a></li>
                <li><a href="user_buhuo.php">出库查询</a></li>
                <li class="active"><a href="user_info.php">个人信息</a></li>
                <li><a href="user_repass.php">密码修改</a></li>
                <li><a href="user_guashi.php">证件挂失</a></li>
                <li><a href="logout.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
    <?php



    $sqla="select * from user_info where id={$id} ;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    ?>
<div class="col-xs-5 col-md-offset-3" style="position: relative;top: 25%">
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">我的信息</h3>
    </div>
    <div class="panel-body">
        <a href="#" class="list-group-item"><?php echo "<p>读者证号:{$resulta['id']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php  echo "<p>姓名:{$resulta['name']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>性别:{$resulta['sex']}</p><br/>"; ?></a>
        <a href="#" class="list-group-item"><?php echo "<p>qq:{$resulta['qq']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php     echo "<p>email:{$resulta['email']}</p><br/>";  ?></a>
        <a href="#" class="list-group-item"><?php    echo "<p>电话:{$resulta['phone']}</p><br/>"; ?></a>
        <?php echo "<a style='color: #AA0000;font-size: larger' href='user_info_edit.php'><strong>修改</strong></a>"; ?>
    </div>
</div>
</div>


</body>
</html>