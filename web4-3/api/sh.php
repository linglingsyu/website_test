<?php

include_once "../base.php";

print_r($_POST);
$g = $Goods->find($_POST['id']);
switch($_POST['type']){
  case "1":
    $g['sh']  = 1;
  break;
  case "2":
    $g['sh'] = 0;
  break;
}

$Goods->save($g);

?>