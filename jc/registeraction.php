<?php
header("Content-Type: text/html;charset=utf-8");
$id = isset($_POST['id']) ? $_POST['id'] : "";
$name = isset($_POST['name']) ? $_POST['name'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
$qq = isset($_POST['qq']) ? $_POST['qq'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$permission = isset($_POST['permission']) ? $_POST['permission'] : "";

if ($password == $re_password) {
    $conn = mysqli_connect("localhost", "root", "root", "mys");
    if (!$conn) {
        die("连接数据库失败：" . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");

    $sql_select = "SELECT name FROM card WHERE name = '$name'";
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret);

    if ($name == $row['name']) {
        header("Location:register.php?err=1");
    } else {
        if ($permission == "admin") {
            // 如果权限为admin，则插入数据到card表和user_info表
            $sql_insert_card = "INSERT INTO card (id, name, password, permission) 
                                VALUES ($id, '$name', '$password', '$permission')";
            if (mysqli_query($conn, $sql_insert_card)) {
                $sql_insert_user_info = "INSERT INTO user_info (id, name, sex, qq, email, phone) 
                                         VALUES ($id, '$name', '$sex', '$qq', '$email', '$phone')";
                if (mysqli_query($conn, $sql_insert_user_info)) {
                    header("Location:register.php?err=3");
                } else {
                    header("Location:register.php?err=4");
                }
            } else {
                header("Location:register.php?err=4");
            }
        } elseif ($permission == "user") {
            // 如果权限为user，则插入数据到user_card表和user_info表
            $sql_insert_user_card = "INSERT INTO user_card (id, name, password, permission) 
                                     VALUES ($id, '$name', '$password', '$permission')";
            if (mysqli_query($conn, $sql_insert_user_card)) {
                $sql_insert_user_info = "INSERT INTO user_info (id, name, sex, qq, email, phone) 
                                         VALUES ($id, '$name', '$sex', '$qq', '$email', '$phone')";
                if (mysqli_query($conn, $sql_insert_user_info)) {
                    header("Location:register.php?err=3");
                } else {
                    header("Location:register.php?err=4");
                }
            } else {
                header("Location:register.php?err=4");
            }
        } else {
            // 其他权限错误处理
            header("Location:register.php?err=5");
        }
    }
} else {
    header("Location:register.php?err=2");
}