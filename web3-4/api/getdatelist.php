<?php

include_once "../base.php";


$row = $Movie->find(['name'=>$_POST['movie']]);

$ondate = strtotime($row['date']);
$today = strtotime(date("Y-m-d"));


for($i=0;$i < 3; $i++){
  $date = strtotime("+$i days",$ondate);
  print_r($date);
  if($date >= $today){   
    echo '<option value="'.date("Y-m-d",$date).'">'.date("Y-m-d",$date).'</option>';
  }
}

?>

