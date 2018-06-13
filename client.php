<?php
/**
 * Created by PhpStorm.
 * User: 程龙飞
 * Date: 2018/4/29
 * Time: 10:09
 */

//创建链接  最长链接时间是10S
$fp = fsockopen('localhost',80,$errno,$errstr,10);
if (!$fp){
    //链接失败
    echo "$errstr ($errno)<br />\n";
}
//拼接http 请求报文
$http = '';
//请求报文由三部分组成 请求行 请求头  请求体
$url = "/http/sevcer.php";
//请求头包括三部分 : 请求类型 请求地址  HTTP协议版本
$http .= "GET $url HTTP/1.1\r\n"; //必须加\r\n
//请求头信息
$http .= "Host: localhost\r\n";
$http .= "Connection: close\r\n\r\n";
//请求体  无

//发送请求
fwrite($fp, $http);
$res = '';
//获取结果
while(!feof($fp)){
    $res .= fgets($fp);
}
//输出内容
echo $res;
//关闭资源链接
fclose($fp);



