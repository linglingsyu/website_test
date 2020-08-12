<?php
include_once "../base.php";

$g = $Goods->find($_POST['id']);
switch($_POST['type']){
  case 1: $g['sh'] = 1;
  break;
  case 2: $g['sh'] =0;
  break;
}
$Goods->save($g);

?>