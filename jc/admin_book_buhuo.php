<?php
session_start();

$userid = $_SESSION['userid'];
include('mysqli_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookid = $_POST["bookid"];
    $buhuoNum = $_POST["buhuoNum"];

    // 查询教材信息
    $sql = "SELECT * FROM book_info WHERE book_id='$bookid'";
    $result = mysqli_query($dbc, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['number'] == 0) {
        // 补货数量大于0，进行补货操作
        if ($buhuoNum > 0) {
            $newNum = $row['number'] + $buhuoNum;
            $updateSql = "UPDATE book_info SET number=$newNum WHERE book_id='$bookid'";
            mysqli_query($dbc, $updateSql);
            echo "<script>alert('入库成功！');</script>";
        } else {
            echo "<script>alert('入库数量必须大于0！');</script>";
        }
    } else {
        echo "<script>alert('该教材不需要入库！');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教材管理</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            width: 100%;
            height: auto;
        }

        #buhuo-form {
            text-align: center;
        }
    </style>
</head>
<body>
<h1 style="text-align: center"><strong>教材入库</strong></h1>

<div id="buhuo-form">
    <form action="admin_book_buhuo.php" method="POST">
        <div id="buhuo-inputs">
            <label>教材号：<input name="bookid" type="text" placeholder="请输入教材号" class="form-control"></label>
            <label>入库数量：<input name="buhuoNum" type="text" placeholder="请输入入库数量" class="form-control"></label>
        </div>
        <input type="submit" value="确认入库" class="btn btn-default">
    </form>
    <a href="admin_book.php" id="return-btn" class="btn btn-default">返回</a>
</div>
</body>
</html>
