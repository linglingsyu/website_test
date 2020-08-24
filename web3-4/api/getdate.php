<?php

include_once "../base.php";

$m = $Movie->find(['name'=>$_POST['movie']]);

$ondate = strtotime($m['date']);
$today = strtotime(date("Y-m-d"));

for($i=0;$i<3;$i++){
  $chk = strtotime("+$i days", $ondate);
  if($chk>=$today){
    echo '<option value="'.date("Y-m-d",$chk).'">'.date("Y-m-d",$chk).'</option>';
  }
}

?>

