<?php
/**
 * Created by PhpStorm.
 * User: 尽管如此世界依然美丽
 * Date: 2017/12/5/005
 * Time: 17:33
 */
require_once "tools.php";

$db = conn();
$id = get("id");

$sql = "delete from qy_article where id=:id";

$stmt = $db->prepare($sql);

$stmt ->execute([':id'=>$id]);
header("location:/articlelist.php");