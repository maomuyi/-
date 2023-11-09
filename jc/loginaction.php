<?php
header("Content-Type: text/html;charset=utf-8");
// $Id:$ //声明变量
$name = isset($_POST['name']) ? $_POST['name'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; // 判断用户名和密码是否为空
// $permissions = isset($_POST['permissions']) ? sanitizeInput($_POST['permissions']) : '';
$role = $_POST['role'];

if($role == 'admin'){
    if (!empty($name) && !empty($password)) { 
        //建立连接
        $conn = mysqli_connect('localhost', 'root', 'root', 'mys'); 
        //准备SQL语句
        $sql_select = "SELECT name,password,permission FROM card WHERE name = '$name' AND password = '$password'";
        //执行SQL语句
        $ret = mysqli_query($conn, $sql_select);  
        $row = mysqli_fetch_array($ret); 
        
        //判断用户名或密码是否正确
        if ($row['name'] == $name && $row['password'] == $password) { 
            // 选中“记住我”
            if ($remember == "on") { 
                // 创建cookie
                setcookie("name_cookie", $name, time() + 7 * 24 * 3600);
            }
            
            // 开启session
            session_start();
            // 创建session
            $_SESSION['name'] = $_POST['name'];
            
            // 根据用户权限进行跳转
            if ($row['permission'] == "user") {
                header("Location: user_index.php"); 
            } elseif ($row['permission'] == "admin") {
                header("Location: admin_index.php"); 
            }
            
            // 关闭数据库连接
            mysqli_close($conn);
        } else {
            // 用户名或密码错误
            header("Location: login.php?err=1");
        }
    } else { //用户名或密码为空，赋值err为2
        header("Location:login.php?err=2");
        exit();
    }
}else{
    if (!empty($name) && !empty($password)) { 
        //建立连接
        $conn = mysqli_connect('localhost', 'root', 'root', 'mys'); 
        //准备SQL语句
        $sql_select = "SELECT name,password,permission FROM user_card WHERE name = '$name' AND password = '$password'";
        //执行SQL语句
        $ret = mysqli_query($conn, $sql_select);  
        $row = mysqli_fetch_array($ret); 
        
        //判断用户名或密码是否正确
        if ($row['name'] == $name && $row['password'] == $password) { 
            // 选中“记住我”
            if ($remember == "on") { 
                // 创建cookie
                setcookie("name_cookie", $name, time() + 7 * 24 * 3600);
            }
            
            // 开启session
            session_start();
            // 创建session
            $_SESSION['name'] = $_POST['name'];
            
            // 根据用户权限进行跳转
            if ($row['permission'] == "user") {
                header("Location: user_index.php"); 
            } elseif ($row['permission'] == "admin") {
                header("Location: admin_index.php"); 
            }
            
            // 关闭数据库连接
            mysqli_close($conn);
        } else {
            // 用户名或密码错误
            header("Location: login.php?err=1");
        }
    } else { //用户名或密码为空，赋值err为2
        header("Location:login.php?err=2");
        exit();
    }
}

