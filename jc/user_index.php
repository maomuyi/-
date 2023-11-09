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
date_default_timezone_set("PRC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
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
        #gonggao{
            position: absolute;
            left: 40%;
            top: 50%;
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
                <li class="active"><a href="user_index.php">主页</a></li>
                <li><a href="user_querybook.php">教材查询</a></li>
                <li><a href="user_buhuo.php">出库查询</a></li>
                <li><a href="user_info.php">个人信息</a></li>
                <li><a href="user_repass.php">密码修改</a></li>
                <li><a href="user_guashi.php">证件挂失</a></li>
                <li><a href="logout.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<br/><br/><h3 style="text-align: center"><?php echo $result['name'];  ?>用户，您好</h3><br/>
<h4 style="text-align: center"><?php
    $sqla="select count(*) a from list where id={$id} ;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    echo "您目前共订阅{$resulta['a']}本书。";
    ?>
</h4>

<div id="gonggao">
    <a href="a.html" style="font-style: italic;color: white;text-decoration:replace-underline">馆内资讯：扬中华之美德 行传统毕业礼</a><br>
    <a href="a.html" style="font-style: italic;color: white">通知公告：读者借阅规则</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：《朗读者》第一期、第二期最全书单：你读过几本？</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：5年内经得起时间考验的经典好书榜</a><br>
    <a href="a.html" style="font-style: italic;color: white">书单推荐：第十一届文津图书奖获奖图书</a><br>

</div>

</body>
</html>
