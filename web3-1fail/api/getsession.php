<?php
include_once "../base.php";

if($_POST['date'] == date("Y-m-d")){
  $now = date("H");

  if($now> 12){
    $time =  floor(($now-14)/2);
    for($i = $time+1; $i<5; $i++){
      echo '<option value="'.$i.'">'.$session[$i].'</option>';
    }
  }else{

    for($i = 0 ; $i < 5 ; $i++){
      echo '<option value="'.$i.'">'.$session[$i].'</option>';
    }

  }

}else{
  for($i = 0 ; $i < 5 ; $i++){
    echo '<option value="'.$i.'">'.$session[$i].'</option>';
  }
}


?>