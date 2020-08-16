<?php
include_once "../base.php";
$movie = $Movie->find($_POST['id']);
$today = strtotime(date("Y-m-d"));
$ondate = strtotime($movie['date']);

for ($i=0 ; $i<3 ;$i++){
  $chk = strtotime("+$i day",$ondate); 
  if($chk >= $today){
    echo '<option value="'. date("Y-m-d",$chk).'">'.date("Y-m-d",$chk).'</option>';
  }
}







?>