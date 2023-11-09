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
    <title>密码修改</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                <li ><a href="user_index.php">主页</a></li>
                <li><a href="user_querybook.php">教材查询</a></li>
                <li><a href="user_buhuo.php">订阅查询</a></li>
                <li><a href="user_info.php">个人信息</a></li>
                <li class="active"><a href="user_repass.php">密码修改</a></li>
                <li><a href="user_guashi.php">证件挂失</a></li>
                <li><a href="login.php">退出</a></li>
            </ul>
        </div>
    </div>
</nav>
<h3 style="text-align: center"><?php echo $result['name'];  ?>用户，您好</h3><br/>
<h4 style="text-align: center">修改密码：</h4><br/><br/><br/><br/><br/>
<form action="user_repass.php" method="post"  style="text-align: center">
    <label><br/><input type="password" name="pass1" placeholder="请输入新的密码" class="form-control"></label><br/><br/><br/>
    <label><br/><input type="password" name="pass2" placeholder="确认新的密码" class="form-control"></label><br/><br/>
    <input type="submit" value="提交" class="btn btn-default">
    <input type="reset" value="重置"  class="btn btn-default">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $passa = $_POST["pass1"];
    $passb = $_POST["pass2"];
    if($passa==$passb){
        $sql="update user_card set password='{$passa}' where id={$id}";
        $res=mysqli_query($dbc,$sql);
        if($res==1)
        {
            echo "<script>alert('密码修改成功！请重新登陆！')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }

    }
    else{
        echo "<script>alert('两次输入密码不同，请重新输入！')</script>";

    }

}


?>
</body>
</html>