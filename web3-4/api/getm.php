<?php

include_once "../base.php";
$ondate = date("Y-m-d",strtotime("-2 days"));
$today = date("Y-m-d");
$rows = $Movie->all(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today' ");
foreach($rows as $row){
  $chk =  $row['id'] == $_POST['id'] ?  "selected" : "";
  echo '<option value="'.$row['name'].'" ' . $chk .'>'. $row['name'].'</option>';
}

?>

