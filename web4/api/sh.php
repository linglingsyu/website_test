<?php
include_once "../base.php";
$row = $Goods->find($_POST['id']);
$row['sh'] = ($row['sh']+1)%2;
 $Goods->save($row);
?>