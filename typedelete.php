<?php
/**
 * Created by PhpStorm.
 * User: 尽管如此世界依然美丽
 * Date: 2017/12/3/003
 * Time: 20:40
 */
require_once "tools.php";
echo $id = get('id');

$db= conn();
$sql = "delete from qy_type where id=:id";

$stmt= $db->prepare($sql);

$stmt ->execute([':id'=>$id]);

header("location:/admin/typelist.php");