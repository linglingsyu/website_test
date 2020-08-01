<?php
include_once "../base.php";

$list = $News->all(["type"=>$_GET['type']]);
foreach($list as $l){
  echo '<a href="javascript:getpost('.$l['id'].')">'.$l['title'].'</a>'.'<br>';
}

?>