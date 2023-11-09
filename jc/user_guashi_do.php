    <?php

    session_start();
    $id=$_GET['id'];
    // $name=$_SESSION['name'];
    include ('mysqli_connect.php');

    $sql = "select card_state from user_card where id='{$id}'";
    $res = mysqli_query($dbc, $sql);
    $result = mysqli_fetch_array($res);
    $state = $result['card_state'];

    

    if($state==1){
        $sql="update user_card set card_state=0 where id={$id}";
        $res=mysqli_query($dbc,$sql);

        if($res==1)
        {
            echo"<script>alert('挂失成功！')</script>";
            echo "<script>window.location.href='user_guashi.php'</script>";
        }
        else
        {
            echo"<script>alert('挂失失败！')</script>";
            echo "<script>window.location.href='user_guashi.php'</script>";
        }

    }
    else{

        $sqla="update user_card set card_state=1 where id={$id}";
        $resa=mysqli_query($dbc,$sqla);

        if($resa==1)
        {
            echo"<script>alert('取消挂失成功！')</script>";
            echo "<script>window.location.href='user_guashi.php'</script>";
        }
        else
        {
            echo"<script>alert('取消挂失失败！')</script>";
            echo "<script>window.location.href='user_guashi.php'</script>";
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>

    </body>
    </html>
