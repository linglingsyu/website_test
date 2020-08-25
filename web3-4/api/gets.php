<?php
include_once "../base.php";



$now = date("H");
$today = strtotime(date("Y-m-d"));
$date = strtotime($_POST['date']);

$count = 0;

if( $today == $date){
    $s = floor(($now/2)%5)-1;
  for ($i = $s ; $i < 5; $i++) {
     $od = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$session[$i]]);
     foreach($od as $o){
        $count+= count(unserialize($o['seat']));
     }
    echo '<option value="' . $session[$i] . '">' . $session[$i] . ' 剩餘座位：'.(20-$count).'</option>';
  }

}else{

  $od = $Ord->all(['movie' => $_POST['movie'], 'date' => $_POST['date'], 'session' => $session[$i]]);
  foreach ($od as $o) {
    $count += count(unserialize($o['seat']));
  }
  for ($i = 0; $i < 5; $i++) {
    $od = $Ord->all(['movie' => $_POST['movie'], 'date' => $_POST['date'], 'session' => $session[$i]]);
    echo '<option value="' . $session[$i] . '">' . $session[$i] . ' 剩餘座位：' .(20-$count).'</option>';
  }

}





?>
