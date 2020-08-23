<?php

include_once "../base.php";

  $ondate = date("Y-m-d",strtotime("-2 days"));
  $today = date("Y-m-d");
$rows = $Movie->all(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today' ");
foreach($rows as $row){
  if($_POST['id'] != 0){
    $chk = $_POST['id'] == $row['id'] ? "selected" : "";
  }
  echo '<option value="'.$row['name'].'" '.$chk.'>'.$row['name'].'</option>';
}

?>

