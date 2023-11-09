
<?php
session_start();

// 从会话中删除所有变量
$_SESSION = array();


// 最后销毁会话
session_destroy();
header("location: login.php")
?>