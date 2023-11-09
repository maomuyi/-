<?php
session_start();
$userid = $_SESSION['userid'];
include('mysqli_connect.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title> 增加教材</title>
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
                    <li class="active" class="dropdown">
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
                    <li><a href="login.php">退出</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <h1 style="text-align: center"><strong>增加教材</strong></h1>
    <div style="padding: 10px 500px 10px;">
        <form action="admin_book_add.php" method="POST" style="text-align: center" class="bs-example bs-example-form"
            role="form">
            <div id="login">
                <div class="input-group"><span class="input-group-addon">教材名</span><input name="bname" type="text"
                        placeholder="请输入教材名" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">作者</span><input name="bauthor" type="text"
                        placeholder="请输入作者" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">出版社</span><input name="bpublish" type="text"
                        placeholder="请输入出版社" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">ISBN</span><input name="bISBN" type="text"
                        placeholder="请输入ISBN" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">简介</span><input name="bintroduction"
                        type="text" placeholder="请输入简介" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">价格</span><input name="bprice" type="text"
                        placeholder="请输入价格" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">出版日期</span><input name="bpubdate" type="text"
                        placeholder="请输入出版日期" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">分类号</span><input name="bclass_id" type="text"
                        placeholder="请输入分类号" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">书架号</span><input name="bpressmark" type="text"
                        placeholder="请输入书架号" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">教材数量</span><input name="bnumber" type="text"
                        placeholder="请输入教材数量" class="form-control"></div><br />
                <label><input type="submit" value="添加" class="btn btn-default"></label>
                <label><input type="reset" value="重置" class="btn btn-default"></label>
            </div>
        </form>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bname = $_POST["bname"];
        $bauthor = $_POST["bauthor"];
        $bpublish = $_POST["bpublish"];
        $bISBN = $_POST["bISBN"];
        $bintroduction = $_POST["bintroduction"];
        $bprice = $_POST["bprice"];
        $bpubdate = $_POST["bpubdate"];
        $bclass_id = $_POST["bclass_id"];
        $bpressmark = $_POST["bpressmark"];
        $bnumber = $_POST["bnumber"];



        $sqla = "insert into book_info VALUES (NULL ,'{$bname}','{$bauthor}','{$bpublish}','{$bISBN}','{$bintroduction}','{$bprice}','{$bpubdate}',{$bclass_id},{$bpressmark},{$bnumber} )";
        $resa = mysqli_query($dbc, $sqla);


        if ($resa == 1) {

            echo "<script>alert('添加成功！')</script>";
            echo "<script>window.location.href='admin_book.php'</script>";

        } else {
            echo "<script>alert('添加失败！请重新输入！');</script>";

        }

    }

    ?>
</body>

</html>