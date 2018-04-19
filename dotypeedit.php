<?php
/**
 * Created by PhpStorm.
 * User: 尽管如此世界依然美丽
 * Date: 2017/12/3/003
 * Time: 21:08
 */
require_once "tools.php";

$id = post('id');
$typename = post('typename');

$db = conn();

$sql = 'update qy_type set name=:name where id=:id';
$stmt = $db->prepare($sql);

$stmt->execute([':id'=>$id,':name'=>$typename]);

header("Location:/admin/typelist.php");