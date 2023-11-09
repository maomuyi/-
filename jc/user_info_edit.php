<?php
session_start();
$name=$_SESSION['name'];
include ('mysqli_connect.php');

$sql = "select id from user_card where name='{$name}'";
$res = mysqli_query($dbc, $sql);
$result = mysqli_fetch_array($res);
$id = $result['id'];


$sqlb="select * from user_info where id={$id} ;";
$resb=mysqli_query($dbc,$sqlb);
$resultb=mysqli_fetch_array($resb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>个人信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>个人信息修改</strong></h1>
<div style="padding: 10px 500px 10px;">
    <form  action="reader_info_edit.php" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
    <div id="login">
        <div class="input-group"><span  class="input-group-addon">姓名</span><input value="<?php echo $resultb['name']; ?>" name="name" type="text" placeholder="请输入修改的用户名" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">性别</span><input value="<?php echo $resultb['sex']; ?>" name="sex" type="text" placeholder="请输入修改的性别" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">QQ</span><input value="<?php echo $resultb['qq']; ?>"  name="qq" type="text" placeholder="请输入修改的QQ" class="form-control"></div><br/>
        <div class="input-group"><span  class="input-group-addon">邮箱</span><input value="<?php echo $resultb['email']; ?>" name="email" type="text" placeholder="请输入修改的邮箱" class="form-control" ></div><br/>
        <div class="input-group"><span  class="input-group-addon">电话</span><input  value="<?php echo $resultb['phone']; ?>" name="phone" type="text" placeholder="请输入新的电话" class="form-control"></div><br/>
        <label><input type="submit" value="确认" class="btn btn-default"></label>
        <label><input type="reset" value="重置" class="btn btn-default"></label>
    </div>
    </form>
</div>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{


    $nnam = $_POST["name"];
    $nsex = $_POST["sex"];
    $nqq = $_POST["qq"];
    $nem = $_POST["email"];
    $npho = $_POST["phone"];




    $sqla="update user_info set name='{$nnam}',sex='{$nsex}',qq='{$nqq}',
    email='{$nem}',phone='{$npho}' where id={$id};";
    $resa=mysqli_query($dbc,$sqla);

    $sqlc="update user_card set name='{$nnam}' where id={$id};";
    $resc=mysqli_query($dbc,$sqlc);
    if($resa==1&&$resc==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='reader_info.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
