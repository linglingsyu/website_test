<?php
include_once "../base.php";
$date = strtotime($_POST['date']);
$today = strtotime(date("Y-m-d"));
$now = date("H");
$s = floor(($now/2)%5)-1;
if($date == $today ){
  for($i=$s; $i<5; $i++){
    echo '<option value="'.$session[$i].'">'.$session[$i].'</option>';
  }
}else{
  for($i=0; $i<5; $i++){
    echo '<option value="'.$session[$i].'">'.$session[$i].'</option>';
  }
}

?>
