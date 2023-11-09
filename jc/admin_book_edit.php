<?php
session_start();
$id = $_SESSION['id'];
include('mysqli_connect.php');
$xgid = $_GET['id'];

$sqlb = "select name,author,publish,ISBN,introduction,price,pubdate,class_id,pressmark,number from book_info where book_id='{$xgid}'";
$resb = mysqli_query($dbc, $sqlb);
$resultb = mysqli_fetch_array($resb);
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
    <h1 style="text-align: center"><strong>图书信息修改</strong></h1>
    <div style="padding: 10px 500px 10px;">
        <form action="admin_book_edit.php?id=<?php echo $xgid; ?>" method="POST" style="text-align: center"
            class="bs-example bs-example-form" role="form">
            <div id="login">
                <div class="input-group"><span class="input-group-addon">教材名</span><input
                        value="<?php echo $resultb['name']; ?>" name="bname" type="text" placeholder="请输入修改的教材名"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">作者</span><input
                        value="<?php echo $resultb['author']; ?>" name="bauthor" type="text" placeholder="请输入修改的作者"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">出版社</span><input
                        value="<?php echo $resultb['publish']; ?>" name="bpublish" type="text" placeholder="请输入修改的出版社"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">ISBN</span><input
                        value="<?php echo $resultb['ISBN']; ?>" name="bISBN" type="text" placeholder="请输入修改的ISBN"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">简介</span><input
                        value="<?php echo $resultb['introduction']; ?>" name="bintroduction" type="text"
                        placeholder="请输入新的简介" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">价格</span><input
                        value="<?php echo $resultb['price']; ?>" name="bprice" type="text" placeholder="请输入修改的价格"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">出版日期</span><input
                        value="<?php echo $resultb['pubdate']; ?>" name="bpubdate" type="text" placeholder="请输入修改的出版日期"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">分类号</span><input
                        value="<?php echo $resultb['class_id']; ?>" name="bclass_id" type="text" placeholder="请输入修改的分类号"
                        class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">书架号</span><input
                        value="<?php echo $resultb['pressmark']; ?>" name="bpressmark" type="text"
                        placeholder="请输入修改的书架号" class="form-control"></div><br />
                <div class="input-group"><span class="input-group-addon">教材数量</span><input
                        value="<?php echo $resultb['state']; ?>" name="bnumber" type="text" placeholder="请输入修改的教材数量"
                        class="form-control"></div><br />
                <label><input type="submit" value="确认" class="btn btn-default"></label>
                <label><input type="reset" value="重置" class="btn btn-default"></label>
            </div>
        </form>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $bid = $_GET['id'];
        $bname = $_POST["bname"];
        $bauthor = $_POST["bauthor"];
        $bpublish = $_POST["bpublish"];
        $bISBN = $_POST["bISBN"];
        $bintroduction = $_POST["bintroduction"];
        $bprice = $_POST["bprice"];
        $bpubdate = $_POST["bpubdate"];
        $bclass_id = $_POST["bclass_id"];
        $bpressmark = $_POST["bpressmark"];
        $bnumber = $_POST["bnumber"];



        $sqla = "update book_info set name='{$bname}',author='{$bauthor}',publish='{$bpublish}',
        ISBN='{$bISBN}',introduction='{$bintroduction}',price='{$bprice}',pubdate='{$bpubdate}',
        class_id='{$bclass_id}',pressmark='{$bpressmark}',number='{$bnumber}' where book_id='{$bid}';";
        $resa = mysqli_query($dbc, $sqla);

        if ($resa == 1) {
            echo "<script>alert('修改成功！')</script>";
            echo "<script>window.location.href='admin_book.php'</script>";

        } else {
            echo "<script>alert('修改失败！请重新输入！');</script>";

        }

    } else {
        echo "false";
    }


    ?>
</body>

</html>