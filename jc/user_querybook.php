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
    <title>教材查询</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        #resbook{
            top:50%;

        }
        #query{

            text-align: center;
        }
        body{
            width: 100%;

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
                <li class="active"><a href="user_querybook.php">教材查询</a></li>
                <li><a href="user_buhuo.php">出库查询</a></li>
                <li><a href="user_info.php">个人信息</a></li>
                <li><a href="user_repass.php">密码修改</a></li>
                <li><a href="user_guashi.php">证件挂失</a></li>
                <li><a href="logout.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>用户，您好</h3><br/>
<h4 style="text-align: center">教材查询：</h4>


<form  action="user_querybook.php" method="POST">
    <div id="query">
        <label ><input  name="bookquery" type="text" placeholder="请输入教材名或教材号" class="form-control"></label>
        <input type="submit" value="查询" class="btn btn-default">
    </div>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $gjc = $_POST["bookquery"];
    if($gjc=="") echo "<script>alert('查询词不能为空！')</script>";
    else{
        $sqla="select book_id,name,author,publish,ISBN,introduction,price,pubdate,book_info.class_id,class_name,pressmark,number from book_info,class_info where book_info.class_id=class_info.class_id and ( name like '%{$gjc}%' or book_id like '%{$gjc}%')  ;";

        $resa=mysqli_query($dbc,$sqla);
        $jgs=mysqli_num_rows($resa);

        if($jgs==0)  echo "<script>alert('图书馆内暂无此书！')</script>";
        else{
            echo "<table   id='resbook' class='table'>
    <tr>
        <th>图书号</th>
        <th>图书名</th>
        <th>作者</th>
        <th>出版社</th>
        <th>ISBN</th>
        <th>简介</th>
        <th>价格</th>
        <th>出版日期</th>
        <th>分类</th>
        <th>书架号</th>
        <th>数量</th>
        <th>状态</th>
    </tr>";
            foreach ($resa as $row){
                echo "<tr>";
                echo "<td>{$row['book_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['publish']}</td>";
                echo "<td>{$row['ISBN']}</td>";
                echo "<td>{$row['introduction']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['pubdate']}</td>";
                echo "<td>{$row['class_name']}</td>";
                echo "<td>{$row['pressmark']}</td>";
                echo "<td>{$row['number']}</td>";
                if($row['number']!=0) echo "<td>在馆</td>"; else if($row['state']==0) echo "<td>缺货</td>";else  echo "<td>无状态信息</td>";
                echo "</tr>";
            };
        };



        echo "</table>";



    }

}
?>
</body>
</html>