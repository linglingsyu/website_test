<?php
include_once "../base.php";
  $movie = $Movie->find($_POST['m_id']);
  $today = date("Y-m-d");
  if($today == $_POST['date']){
    $now = date("H");
    $se = floor((($now/2)-1)%5);
    for($i = $se ; $i < 5 ; $i++){
      echo '<option value="'.$session[$i].'">'.$session[$i].'</option>';
    }
  }else{

    for($i=0; $i < 4 ; $i++){
      echo '<option value="'.$session[$i].'">'.$session[$i].'</option>';
    }

  }
?>

