<?php

include_once "../base.php";

$m = $Movie->find(['name'=>$_POST['movie']]);

$ondate = strtotime($m['date']);
$today = strtotime(date("Y-m-d"));

for($i=0;$i<3;$i++){
  $dd = strtotime("+$i days", $ondate);
  if($dd >= $today){
      echo '<option value="'.date("Y-m-d",$dd).'">'.date("Y-m-d",$dd).'</option>';
  }
}



?>

