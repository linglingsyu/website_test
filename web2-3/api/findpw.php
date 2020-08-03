<?php
include_once "../base.php";
$row = $User->find(['email'=>$_POST['email']]);
if(!empty($row)){
  echo $row['pw'];
}else{
  echo 0;
}
?>