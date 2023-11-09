<?php
session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>增加用户</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">高校教材管理系统</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li ><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">教材管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">全部教材</a></li>
                        <li><a href="admin_book_add.php">增加教材</a></li>

                    </ul>
                </li>
                <li  class="active"  class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="admin_user.php">全部用户</a></li>
                        <li><a href="admin_user_add.php">增加用户</a></li>
                    </ul>
                </li>
                <li><a href="admin_borrow_info.php">出库记录</a></li>
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="login.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h1 style="text-align: center"><strong>增加用户</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_user_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">用户证号</span><input name="nid" type="text" placeholder="请输入用户证号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户姓名</span><input name="nname" type="text" placeholder="请输入用户姓名" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">性别</span><input name="nsex" type="text" placeholder="请输入用户性别" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户QQ</span><input name="naddress" type="text" placeholder="请输入用户QQ" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">用户电话</span><input name="ntel" type="text" placeholder="请输入用户电话" class="form-control"></div><br/>
            <input type="submit" value="添加" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
    $nsex = $_POST["nsex"];
    $naqq= $_POST["naqq"];
    $nema= $_POST["nema"];
    $nnte = $_POST["ntel"];


    $sqla="insert into user_info VALUES ($nnid ,'{$nnam}','{$nsex}','{$naqq}','{$nema}','{$nnte}')";
    $sqlb="insert into user_card (user_id,name) VALUES($nnid ,'{$nnam}');";
    $resa=mysqli_query($dbc,$sqla);
    $resb=mysqli_query($dbc,$sqlb);


    if($resa==1&&$resb==1)
    {

        echo "<script>alert('用户添加成功!初始密码为111111')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('添加失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>