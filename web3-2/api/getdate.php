<?php
include_once "../base.php";
$date = $Movie->find($_POST['movie']);
// print_r($date);
$today = strtotime(date("Y-m-d"));
$ondate = strtotime($date['date']);

for($i = 0; $i < 3; $i++){
  $chk = strtotime("+$i days",$ondate);
  if($chk >= $today){
    echo '<option value="'.date("Y-m-d",$chk).'">'.date("Y-m-d",$chk).'</option>';
  }
}
?>

