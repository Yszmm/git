<?php
/**
 * Created by PhpStorm.
 * User: 尽管如此世界依然美丽
 * Date: 2017/12/3/003
 * Time: 0:19
 */
function get($name){
    return isset($_GET[$name])?$_GET[$name]:"";
}
function post($name){
    return isset($_POST[$name])?$_POST[$name]:"";
}
function conn(){
// 数据库驱动类型:host=主机名;dbname=数据库名
    $dns = "mysql:host=localhost;dbname=qy";
//连接字符串，账号，密码
    $db  = new PDO($dns, "root", "yszm");
    $db->exec("set names utf8");
    return $db;
}