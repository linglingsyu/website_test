<?php
include_once "../base.php";

$rows = $Ord->all(['name'=>$_POST['movie'],'date'=>$_POST['date'],'session'=>$_POST['session']]);
$seat = [];
foreach($rows as $row){
  $seat = array_merge($seat,unserialize($row['seat']));
}

for ($i = 0; $i < 20; $i++) {
  $r = floor($i / 5) + 1;
  $c = ($i % 5) + 1;
  if(in_array($i,$seat)){
    echo "<div class = 'item null'>已售出</div>";
  }else{
    echo '<div class="item checked">' . $r . '排' . $c . '號<input type="checkbox" class="checkbox" name="seat[]" value="' . $i . '"></div>';
  }
}


?>