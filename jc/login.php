<!DOCTYPE html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["captcha"])) {
        $captcha = $_POST["captcha"];
        if ($captcha === $_SESSION["captcha"]) {
            // 验证码匹配，则进行其他操作（例如用户名和密码验证）
        } else {
            $error = "验证码错误！";
        }
    } else {
        $error = "请输入验证码！";
    }
}
?>
<html>
<head>
    <title>登录</title>
    <link rel="stylesheet" href="login.css">
    <meta name="content-type"; charset="UTF-8">
</head>
<body>
<div id="bigBox">
    <h1>登录页面</h1>

    <form id="loginform" action="loginaction.php" method="post">
        <div class="inputBox">
            <div class="inputText" style="display: inline-block">
                <label for="role_reader">
                    <input type="radio" id="user" name="role" value="user" checked>
                    <span>用户</span>
                </label>
            </div>
            <div class="inputText" style="display: inline-block">
                <label for="role_admin">
                    <input type="radio" id="admin" name="role" value="admin">
                    <span>管理员</span>
                </label>
            </div>
            <div class="inputText">
                <input type="text" id="name" name="name" placeholder="Name" >
            </div>
            <div class="inputText">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="inputText">
                <input type="text" id="captcha" name="captcha" required="required" placeholder="Captcha"><br>
                <br><img  id="capt" src="captcha.php" alt="captcha" onmouseup="refreshimage()" >
            </div>
            <br >
            <div style="color: white;font-size: 12px" >
                <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "用户名或密码错误！";
                        break;

                    case 2:
                        echo "用户名或密码不能为空！";
                        break;
                } ?>
            </div>
            <div class="register">
                <a href="register.php" style="color: white">注册账号</a>
            </div>
            <div class="fgtpwd">
                <a href="#" style="color: white">忘记密码</a>
            </div>
        </div>
        <div>
            <input type="submit" id="login" name="login" value="登录" class="loginButton m-left">
            <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
        </div>
    </form>
</div>
</body>
</html>
<script language="javascript" type="text/javascript">
    function refreshimage(){
        document.getElementById("capt").src="captcha.php?"+Math.random();

    }
</script>