<?php
include_once "../base.php";
$movie = $Movie->find($_POST['id']);
 $qt = $Ord->q("select sum(`qt`) from `ord` where `name`= '$movie[name]' && `date`='$_POST[date]' && `session` = '$_POST[session]'")[0][0];
if(empty($qt)){
  echo 20;
}else{
  echo 20-$qt;
}
?>