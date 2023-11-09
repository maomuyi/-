<?php
session_start();
$id=$_SESSION['id'];
include ('mysqli_connect.php');
$readerid=$_GET['id'];

$sqlb="select * from user_info where id={$id}";
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
    <title>教材信息修改</title>
</head>
<body>
<h1 style="text-align: center"><strong>用户信息修改</strong></h1><br/><br/><br/>
<div style="padding: 10px 500px 10px;">
    <form  action="admin_user_edit.php?id=<?php echo $readerid; ?>" method="POST" style="text-align: center" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group"><span class="input-group-addon">用户号</span><input name="nid" value="<?php echo $resultb['reader_id'] ;?>" type="text" placeholder="请输入修改的用户号" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">姓名</span><input name="nname" value="<?php echo $resultb['name'] ;?>" type="text" placeholder="请输入修改的名字" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">性别</span><input name="nsex" value="<?php echo $resultb['sex'] ;?>" type="text" placeholder="请输入修改的性别" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">QQ</span><input name="nbirth" value="<?php echo $resultb['qq'] ;?>" type="text" placeholder="请输入修改的QQ" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">邮箱</span><input name="naddress" value="<?php echo $resultb['email'] ;?>" type="text" placeholder="请输入修改的email" class="form-control"></div><br/>
            <div class="input-group"><span class="input-group-addon">电话</span><input name="ntel" value="<?php echo $resultb['phone'] ;?>" type="text" placeholder="请输入修改的电话" class="form-control"></div><br/>
            <input type="submit" value="确认" class="btn btn-default">
            <input type="reset" value="重置" class="btn btn-default">
        </div>
    </form>
</div>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    $readid=$_GET['id'];
    $nnid = $_POST["nid"];
    $nnam= $_POST["nname"];
    $nsex = $_POST["nsex"];
    $nqq= $_POST["nqq"];
    $nem= $_POST["nemail"];
    $npho = $_POST["npho"];



    $sqla="update user_info set user_id={$nnid},name='{$nnam}',sex='{$nsex}',
    qq='{$nqq}',nem='{$nem}',phone='{$npho}' where id=$id;";
    $resa=mysqli_query($dbc,$sqla);
    $sqlc="update user_card set name='{$nnam}' where id=$id;";
    $resc=mysqli_query($dbc,$sqlc);

    if($resa==1)
    {

        echo "<script>alert('修改成功！')</script>";
        echo "<script>window.location.href='admin_reader.php'</script>";

    }
    else
    {
        echo "<script>alert('修改失败！请重新输入！');</script>";

    }

}


?>
</body>
</html>
