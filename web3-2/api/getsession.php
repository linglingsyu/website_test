<?php
include_once "../base.php";
  $movie = $Movie->find($_POST['m_id']);
  $today = date("Y-m-d");
  if($today == $_POST['date']){
    $now = date("H");
    $se = floor((($now/2)-1)%5);
    for($i = $se ; $i < 5 ; $i++){
      $qt = $Ord->q("select sum(`qt`) from `ord` where `name`='". $movie['name']."' && `date`='".$_POST['date']."' && `session` = '".$session[$i]."'")[0][0];
      echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位：'.(20-$qt).'</option>';
    }
  }else{

    for($i=0; $i < 4 ; $i++){
      $qt = $Ord->q("select sum(`qt`) from `ord` where `name`='". $movie['name']."' && `date`='".$_POST['date']."' && `session` = '".$session[$i]."'")[0][0];
      echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位：'.(20-$qt).'</option>';
    }

  }
?>

