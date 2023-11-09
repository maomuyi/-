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
    <title>出库申请</title>
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
    <?php
    // 处理用户订阅表单
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["booksubscribe"])) {
            $book_id = $_POST["booksubscribe"];
            $subscribeQuantity = $_POST["subscribequantity"];

            // 查询教材信息
            $sqlb = "SELECT book_id, number FROM book_info WHERE book_id='{$book_id}'";
            $resb = mysqli_query($dbc, $sqlb);
            $resultb = mysqli_fetch_array($resb);

            if (!$resultb) {
                echo "<script>alert('图书馆内暂无此书！');</script>";
            } else {
                $bookNumber = $resultb['number'];
                if ($subscribeQuantity > $number) {
                    echo "<script>alert('库存不足，请重新输入出库数量！');</script>";
                } else {
                    // 更新教材数量
                    $newNumber = $bookNumber - $subscribeQuantity;
                    $sqlc = "UPDATE book_info SET number={$newNumber} WHERE book_id='{$book_id}'";
                    mysqli_query($dbc, $sqlc);

                    // 插入订阅信息
                    date_default_timezone_set("Asia/Shanghai");
                    $subscribeDate = date("Y-m-d H:i:s");
                    $sqlc = "INSERT INTO list (book_id, user_id, date, number) VALUES ('{$book_id}', {$id}, '{$subscribeDate}', {$subscribeQuantity})";
                    mysqli_query($dbc, $sqlc);

                    echo "<script>alert('出库成功！');</script>";
                }
            }
        }
    }

    // 显示当前用户的订阅列表
    $sqld = "SELECT book_id, date, number FROM list WHERE id={$id}";
    $resd = mysqli_query($dbc, $sqld);

    ?>
    <div class="container">
        <h2>用户出库</h2>
        <hr>
        <!-- 订阅表单 -->
        <div style="text-align: center;">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <div id="subscribe" style="display: inline-block; text-align: left;">
                    <label><input name="booksubscribe" type="text" placeholder="请输入订阅的教材号" class="form-control"></label>
                    <label><input name="subscribequantity" type="number" min="1" placeholder="请输入订阅数量" class="form-control"></label>
                    <input type="submit" value="订阅" class="btn btn-default">
                </div>
            </form>
        </div>

        <!-- 订阅列表 -->
        <h3>您的出库列表</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>教材号</th>
                    <th>出库时间</th>
                    <th>数量</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($resultd = mysqli_fetch_array($resd)) {
                    echo "<tr>";
                    echo "<td>{$resultd['book_id']}</td>";
                    echo "<td>{$resultd['date']}</td>";
                    echo "<td>{$resultd['number']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <?php mysqli_close($dbc); ?>
</body>

</html>