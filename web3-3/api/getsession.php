<?php

include_once "../base.php";


$date = strtotime($_POST['date']);
$today = strtotime(date("Y-m-d"));
$now = date("H");
$qt=0;

if($date == $today && $now >= 14){
  $sess = floor(($now/2)%5)-1;
  for($i=$sess;$i<5;$i++){
    $all = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$session[$i]]);
    foreach($all as $al){
      $qt = $qt+=$al['qt'];
    }
    echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位：'.(20-$qt).'</option>';
  }
  
}else{
  for($i=0;$i<5;$i++){
    $all = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$session[$i]]);
    foreach($all as $al){
      $qt = $qt+=$al['qt'];
    }
    echo '<option value="'.$session[$i].'">'.$session[$i].'剩餘座位：'.(20-$qt).'</option>';
  }
}

?>



