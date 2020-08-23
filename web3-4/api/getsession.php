<?php

include_once "../base.php";


$row = $Movie->find(['name'=>$_POST['movie']]);
$date = strtotime($_POST['date']);
$today = strtotime(date("Y-m-d"));

$now = date("H");
if( $date == $today && $now >= 14 ){
  
  $sess = floor((($now/2)-1)%5);
  for($i= $sess ;$i < 5; $i++){
    $count = 0;
    $ss = $Ord->all(['name'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$session[$i]]);
      foreach($ss as $s){
        $count += count(unserialize($s['seat']));
      }
    echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位：'.(20-$count).'</option>';
  }

}else{

  for($i=0;$i < 5; $i++){
    $count = 0;
    $ss = $Ord->all(['name'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$session[$i]]);
    foreach($ss as $s){
      $count += count(unserialize($s['seat']));
    }
    echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位'.(20-$count).'</option>';
  }

}


?>



