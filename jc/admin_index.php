<?php
session_start();
include ('mysqli_connect.php');
$name = $_SESSION['name'];



        
        $sql = "select id from card where name='{$name}'";
        $res = mysqli_query($dbc, $sql);
        $result = mysqli_fetch_array($res);

        $id = $result['id'];
        $pass = $_POST["pass1"];

        //echo $name.$id."+".$pass;

        $sql = "UPDATE card SET password='{$pass}' WHERE id = $id;";

        //echo $sql;
        
       mysqli_query($dbc, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教材管理系统</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body{
            width: 100%;
            overflow: hidden;
            background: url("image/1619102396898.jpeg") no-repeat;
            background-size:cover;
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
                <li class="active"><a href="admin_index.php">主页</a></li>
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
                <li><a href="admin_repass.php">密码修改</a></li>
                <li><a href="logout.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>


<h3 style="text-align: center"><?php echo $name;  ?>管理员，您好</h3>
<br/><br/><br/>
<h4 style="text-align: center"><?php
    $sql="select count(*) a from book_info;";

    $res=mysqli_query($dbc,$sql);
    $result=mysqli_fetch_array($res);
    echo "当前共有教材{$result['a']}本。";
    ?>
</h4>
<h4 style="text-align: center">
    <?php
    $sqla="select count(*) b from user_info;";

    $resa=mysqli_query($dbc,$sqla);
    $resulta=mysqli_fetch_array($resa);
    echo "共有用户{$resulta['b']}个。";

    ?>
</h4>

    <div id="bot" style="text-align: center;font-size:40px;position:absolute;left:20%;bottom:30px "><i style="text-align: center">书 籍 是 人 类 进 步 的 阶 梯 ———— 高 尔 基 </i></div>


</body>
</html>