<?php


include_once "../base.php";
$seat = [];
$ord = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$_POST['session']]);
foreach($ord as $o){
  $seat = array_merge($seat,unserialize($o['seat']));
}

for($i=1;$i<=20;$i++){
  if(in_array($i,$seat)){
    echo '<div class="seat yes">已售出</div>';
  }else{
    echo '<div class="seat no"><input type="checkbox" class="box" name="seat[]" value="'.$i.'">'.$i.'號</div>';
  }
}





?>

