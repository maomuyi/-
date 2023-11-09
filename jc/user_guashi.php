<?php
session_start();
$name=$_SESSION['name'];
include ('mysqli_connect.php');

$sql = "select id from user_card where name='{$name}'";
$res = mysqli_query($dbc, $sql);
$result = mysqli_fetch_array($res);
$id = $result['id'];

$sql="select name from user_card where id={$id}";
$res=mysqli_query($dbc,$sql);
$result=mysqli_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户挂失</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <li><a href="user_info.php">个人信息</a></li>
                <li><a href="user_repass.php">密码修改</a></li>
                <li class="active"><a href="user_guashi.php">证件挂失</a></li>
                <li><a href="logout.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>用户，您好</h3><br/>
<h4 style="text-align: center">您当前证件状态为：<br/>
<?php


$sqla="select card_state from user_card where id={$id} ;";

$resa=mysqli_query($dbc,$sqla);
$resulta=mysqli_fetch_array($resa);
if($resulta['card_state']==0) echo "挂失<br/><br/><a href='user_guashi_do.php?id=$id' style='text-align: center'>点此取消挂失</a>";
else echo "正常<br/><br/><a href='user_guashi_do.php?id=$id' style='text-align: center'>点此挂失</a>";

?>
</h4>
</body>
</html>