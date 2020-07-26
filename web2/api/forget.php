<?php

include_once "../base.php";
$row = $User->find(["email"=>$_GET['e']]);
if (!empty($row)){
  echo $row['pw'];
}else{
  echo 0; 
}

?>