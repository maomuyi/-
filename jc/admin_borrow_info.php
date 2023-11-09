<?php
session_start();
include ('mysqli_connect.php');
$name = $_SESSION['name'];

// 更新密码
if(isset($_POST["pass1"])){
    $sql = "select id from card where name='{$name}'";
    $res = mysqli_query($dbc, $sql);
    $result = mysqli_fetch_array($res);

    $id = $result['id'];
    $pass = $_POST["pass1"];

    $sql = "UPDATE card SET password='{$pass}' WHERE id = $id;";
    mysqli_query($dbc, $sql);
}

// 查询出库记录
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$pageSize = 5; // 每页显示的记录数
$offset = ($page - 1) * $pageSize;

$sql = "SELECT * FROM list LIMIT $offset, $pageSize";
$res = mysqli_query($dbc, $sql);

// 查询总记录数
$countSql = "SELECT COUNT(*) as count FROM list";
$countRes = mysqli_query($dbc, $countSql);
$rowCount = mysqli_fetch_assoc($countRes)['count'];
$totalPages = ceil($rowCount / $pageSize);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>高校教材管理系统</title>
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

<div class="container-fluid">
    <h2>出库记录</h2>
    <hr>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>出库ID</th>
                <th>教材号</th>
                <th>用户ID</th>
                <th>订阅时间</th>
                <th>数量</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($result = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>{$result['list']}</td>";
                echo "<td>{$result['book_id']}</td>";
                echo "<td>{$result['id']}</td>";
                echo "<td>{$result['date']}</td>";
                echo "<td>{$result['number']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="text-center">
        <ul class="pagination">
            <?php
            // 上一页按钮
            if ($page > 1) {
                echo '<li><a href="admin_borrow_info.php?page=' . ($page - 1) . '">&laquo;</a></li>';
            }

            // 中间页码按钮
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li' . ($i == $page ? ' class="active"' : '') . '><a href="admin_borrow_info.php?page=' . $i . '">' . $i . '</a></li>';
            }

            // 下一页按钮
            if ($page < $totalPages) {
                echo '<li><a href="admin_borrow_info.php?page=' . ($page + 1) . '">&raquo;</a></li>';
            }
            ?>
        </ul>
    </div>
</div>

</body>
</html>
