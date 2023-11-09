<?php
session_start();
$num1 = rand(0,9);
$num2 = rand(0,9);
$operators = array('+', '-', '*');
$operator = $operators[rand(0,2)];
if($num1 < $num2 && $operator == '-') {
    // 如果减法结果为负数，则交换 num1 和 num2 的值，使结果为正数
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
}
switch($operator) {
    case '+': $result = $num1 + $num2; break;
    case '-': $result = $num1 - $num2; break;
    case '*': $result = $num1 * $num2; break;
}
$_SESSION["captcha"] = $result;
$img = imagecreatetruecolor(60, 30);
$bg_color = imagecolorallocate($img, 255, 255, 255);
$font_color = imagecolorallocate($img, 0, 0, 0);
imagefill($img, 0, 0, $bg_color);
imagettftext($img, 16, 0, 10, 20, $font_color, __DIR__ . "/arial.ttf", "$num1 $operator $num2 = ?");
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>