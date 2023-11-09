<?php
session_start();
$id = $_SESSION['id'];
include('mysqli_connect.php');

$bookid = $_GET['id'];

// 获取书籍信息
$sql = "SELECT * FROM book_info WHERE book_id = $bookid";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>教材出库</title>
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>
<body>
<div style="padding: 180px 550px 10px;text-align: center">
    <form action="admin_book.php?tsid=<?php echo $bookid; ?>" method="POST" class="bs-example bs-example-form" role="form">
        <div id="login">
            <div class="input-group">
                <span class="input-group-addon">出库人</span>
                <input name="borrower" type="text" placeholder="请输入订购人证号" class="form-control">
            </div><br><br>
            <div class="input-group">
                <span class="input-group-addon">出库数量</span>
                <input name="quantity" type="number" min="1" max="<?php echo $row['number']; ?>" value="1" class="form-control">
            </div><br><br>
            <input type="submit" value="订购" class="btn btn-default">
        </div>
    </form>
</div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jctsid = $_GET['tsid'];
    $reid = $_POST['borrower'];
    $quantity = $_POST['quantity'];

    $sqlc = "SELECT card_state FROM reader_card WHERE reader_id = {$reid}";
    $resc = mysqli_query($dbc, $sqlc);
    $resultc = mysqli_fetch_array($resc);

    if ($resultc['card_state'] == 1) {
        // 检查库存是否足够
        if ($row['number'] >= $quantity) {
            // 更新订购数量和图书状态
            $sqla = "INSERT INTO lend_list(book_id, reader_id, lend_date, quantity) VALUES ({$jctsid}, {$reid}, NOW(), {$quantity});";
            $sqlb = "UPDATE book_info SET state = 0, number = number - {$quantity} WHERE book_id = {$jctsid};";
            $resa = mysqli_query($dbc, $sqla);
            $resb = mysqli_query($dbc, $sqlb);

            if ($resa == 1 && $resb == 1) {
                echo "<script>alert('出库成功！');window.location.href='admin_book.php';</script>";
            } else {
                echo "<script>alert('出库失败！');window.location.href='admin_book.php';</script>";
            }
        } else {
            echo "<script>alert('库存不足，请重新选择出库数量！');</script>";
        }
    } else {
        echo "<script>alert('该账号已挂失，无法出库！');</script>";
    }
}
?>
