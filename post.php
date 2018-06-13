<?php
/**
 * Created by PhpStorm.
 * User: 程龙飞
 * Date: 2018/4/29
 * Time: 10:53
 */
//创建链接
$fp = fsockopen('localhost',80,$errno,$errstr,10);
//判断
if(!$fp){
    echo $errstr; die("程序出现错误");
}
$http = '';
//请求报文由三部分组成 请求行 请求头  请求体
$url = "/http/sevcer.php";
//请求头包括三部分 : 请求类型 请求地址  HTTP协议版本
$http .= "POST $url HTTP/1.1\r\n"; //必须加\r\n
//请求头信息
$http .= "Host: localhost\r\n";
$http .= "Connection: close\r\n";
$http .= "Cookie: username=admin;uid=200\r\n";
$http .= "User-agent: firefox-chrome-safari-ios-android\r\n";
$http .= "Content-type: application/x-www-form-urlencoded\r\n";
$str = strlen("email=xiaohigh@163.com&username=admin");
$http .= "Content-length: {$str}\r\n\r\n";

//请求体
$http .= "{$str}\r\n";
//发送
fwrite($fp, $http);
$res = '';
//获取结果集
while(!feof($fp)){
    $res .= fgets($fp);
}
//输出内容
echo $res;
//关闭资源链接
fclose($fp);