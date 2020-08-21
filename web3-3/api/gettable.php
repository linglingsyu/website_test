<?php

include_once "../base.php";
$seat = [];
$all = $Ord->all(['movie'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$_POST['session']]);
foreach($all as $al){
  $ss = unserialize($al['seat']);
  $seat = array_merge($seat,$ss);
}

for($i=1;$i<=20;$i++){
  if(in_array($i,$seat)){
    echo '<div class="seat null"></div>';
  }else{
    echo '<div class="seat ok"><input type="checkbox" class="chkbox" name="seat[]" value="'.$i.'"></div>';
  }
}

?>



