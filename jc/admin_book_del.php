<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>

</body>

</html>
<?php
session_start();
$id = $_SESSION['id'];
include('mysqli_connect.php');


$delid = $_GET['id'];
$sqla = "select number from book_info where book_id='{$delid}';";
$resa = mysqli_query($dbc, $sqla);
$resulta = mysqli_fetch_array($resa);

if ($resulta['number'] >= 1) {
    $sql = "delete  from book_info where book_id={$delid} ;";
    $res = mysqli_query($dbc, $sql);

    if ($res == 1) {
        echo "<script>alert('删除成功！')</script>";
        echo "<script>window.location.href='admin_book.php'</script>";
    } else {
        echo "删除失败！";
        echo "<script>window.location.href='admin_book.php'</script>";
    }
} else {
    echo "<script>alert('不能删除该教材！')</script>";
    echo "<script>window.location.href='admin_book.php'</script>";
}

?>