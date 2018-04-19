<?php
/**
 * Created by PhpStorm.
 * User: 尽管如此世界依然美丽
 * Date: 2017/12/3/003
 * Time: 0:29
 */
require_once "tools.php";

$typename = post('typename');
$db = conn();

$sql = 'insert into qy_type(name) VALUES (:name)';

$stmt= $db->prepare($sql);

$stmt->execute([':name'=>$typename]);
//判断是否插入成功，也就是获取最后插入的id，如果>0表示成功
if($db->lastInsertId()>0){
    header("Location:/admin/typelist.php");
} else {
    echo "error";
}
