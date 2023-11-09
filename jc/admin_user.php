<?php
session_start();
$id=$_SESSION['id'];
include ('mysqli_connect.php');

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
            height:auto;

        }
        #query{
            text-align: center;
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
                <li ><a href="admin_index.php">主页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">教材管理<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="admin_book.php">全部教材</a></li>
                        <li><a href="admin_book_add.php">增加教材</a></li>
                    </ul>
                </li>
                <li class="active" class="dropdown">
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
<h1 style="text-align: center"><strong>全部用户</strong></h1>
<form  id="query" action="admin_user.php" method="POST">
    <div id="query">
        <label ><input  name="readerquery" type="text" placeholder="请输入用户姓名或用户号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<table  width='100%' class="table table-hover">
    <tr>
        <th>用户号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>QQ</th>
        <th>邮箱</th>
        <th>电话</th>
        <th>读者状态</th>
        <th>操作</th>
        <th>操作</th>
    </tr>
    <?php



    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $gjc = $_POST["readerquery"];

        $sql="select user_info.id, user_info.name,sex,qq,email,phone,card_state from user_info,user_card 
        where user_info.id=user_card.id and (name like '%{$gjc}%' or id like '%{$gjc}%') ;";

    }
    else{
        $sql="select user_info.id, user_info.name, sex, qq, email, phone, card_state
        from user_info, user_card where user_info.id = user_card.id";
    }


    $res=mysqli_query($dbc,$sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['qq']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['phone']}</td>";
        if($row['card_state']==1) echo "<td>正常</td>"; else echo "<td>挂失</td>";
        echo "<td><a href='admin_user_edit.php?id={$row['id']}'>修改</a></td>";
        echo "<td><a href='admin_user_del.php?id={$row['id']}'>删除</a></td>";
        echo "</tr>";
    };
    ?>
</table>
</body>
</html>