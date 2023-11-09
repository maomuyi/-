<!DOCTYPE html>
<html>
<head>
    <title>注册</title>
    <link rel="stylesheet" href="register.css">
    <meta name="content-type"; charset="UTF-8">
</head>
<body>
<div id="bigBox">
        <h1>注册页面</h1>

        <form action="registeraction.php" method="post">
            <div class="inputBox">
                <div class="inputText">
                <input type="text" id="id" name="id" required="required" placeholder="Id">
                </div>
                <div class="inputText">
                <input type="text" id="name" name="name" required="required" placeholder="name">
                </div>
                <div class="inputText">
                <input type="password" id="password" name="password" required="required" placeholder="Password">
                </div>
                <div class="inputText">
                <input type="password" id="re_password" name="re_password" required="required" placeholder="PasswordAgain">
                </div>
                <div class="inputText m-plc" style="color: white;opacity: 70%">
                    性别：
                <input type="radio" id="sex" name="sex" value="mam" style="color: white">男
                <input type="radio" id="sex" name="sex" value="woman" style="color: white">女
                </div>
                <div class="inputText">
                <input type="text" id="qq" name="qq" required="required" placeholder="QQ">
                </div>
                <div class="inputText">
                <input type="email" id="email" name="email" required="required" placeholder="Email">
                </div>
                <div class="inputText">
                <input type="text" id="phone" name="phone" required="required" placeholder="Phone">
                </div>
                <div class="inputText m-plc" style="color: white;opacity: 70%">
                    权限:
                <input type="radio" id="permission" name="permission" value="user" style="color: white">用户
                <input type="radio" id="permission" name="permission" value="admin" style="color: white">管理员
                </div>
                <br>
                <div style="color: white;font-size: 12px" >
                <!--提示信息-->
                <?php
                $err = isset($_GET["err"]) ? $_GET["err"] : "";
                switch ($err) {
                    case 1:
                        echo "用户名已存在！";
                        break;

                    case 2:
                        echo "密码与重复密码不一致！";
                        break;

                    case 3:
                        echo "注册成功！";
                        break;
                }
                ?>
                </div>
            </div>
            <div>
                <input type="submit" id="register" name="register" value="注册" class="loginButton m-left">
                <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
            </div>

            <div class="register">
            <a href="login.php" style="color: white">已有账号，去登录</a>
            </div>
        </form>
</div>
</body>
</html>
