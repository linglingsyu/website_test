<?php
include_once "../base.php";
    $sec = $Type->all(['parent'=>$_POST['big']]);
    foreach($sec as $b){
      echo '<option value="'.$b['id'].'">'.$b['name'].'</option>';
  }
    ?>