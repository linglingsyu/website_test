<?php

include_once "../base.php";

$rows = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$_POST['session']]);
$seat = [];
foreach($rows as $row){
  $seat = array_merge($seat,unserialize($row['seat']));
}
for($i=1;$i<=20;$i++){
  if(in_array($i,$seat)){
    echo '<div class="seat yes">已售出</div>';
  }else{
    echo '<div class="seat no"><input type="checkbox" class="box" name="seat[]" value="'.$i.'">'.$i.'號</div>';
  }
}

?>
