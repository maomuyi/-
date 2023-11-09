<?php
session_start();
include('mysqli_connect.php');
$name = $_SESSION['name'];


    if(isset($_POST["pass1"]) && isset($_POST["pass2"]) && $_POST["pass1"]== $_POST["pass2"]){
        
        $sql = "select id from card where name='{$name}'";
        $res = mysqli_query($dbc, $sql);
        $result = mysqli_fetch_array($res);

        $id = $result['id'];
        $pass = $_POST["pass1"];

        //echo $name.$id."+".$pass;

        $sql = "UPDATE card SET password='{$pass}' WHERE id = $id;";

        //echo $sql;
        
       mysqli_query($dbc, $sql);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>管理员密码修改</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            overflow: hidden;
            background: url("image/1619102396898.jpeg") no-repeat;
            background-size: cover;
            color: antiquewhite;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">高校教材管理系统</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="admin_index.php">主页</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">教材管理<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="admin_book.php">全部教材</a></li>
                            <li><a href="admin_book_add.php">增加教材</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户管理<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                        <li><a href="admin_user.php">全部用户</a></li>
                        <li><a href="admin_user_add.php">增加用户</a></li>
                        </ul>
                    </li>
                    <li><a href="admin_borrow_info.php">出库记录</a></li>
                    <li class="active"><a href="admin_repass.php">密码修改</a></li>
                    <li><a href="logout.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <h3 style="text-align: center">
        <?php echo $name; ?>管理员，您好
    </h3><br />
    <h4 style="text-align: center">修改您的密码：</h4><br /><br /><br /><br /><br />
    <form action="admin_repass.php" method="post" style="text-align: center">
        <label><input type="password" name="pass1" placeholder="请输入新的密码" class="form-control"></label><br /><br /><br />
        <label><input type="password" name="pass2" placeholder="确认新的密码" class="form-control"></label><br /><br />
        <input type="submit" value="提交" class="btn btn-default">
        <input type="reset" value="重置" class="btn btn-default">
    </form>

    <?php

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $passa = $_POST["pass1"];
    //     $passb = $_POST["pass2"];
    //     if ($passa == $passb) {
    //         $sql = "update admin set password='{$passa}' where id={$id}";
    //         $res = mysqli_query($dbc, $sql);
    //         if ($res == 1) {
    //             echo "<script>alert('密码修改成功！请重新登陆！')</script>";
    //             echo "<script>window.location.href='login.php'</script>";
    //         }

    //     } else {
    //         echo "<script>alert('两次输入密码不同，请重新输入！')</script>";

    //     }

    // }


    ?>
</body>

</html>