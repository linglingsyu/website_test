<?php
include_once "../base.php";
    $Big = $Type->all(['parent'=>0]);
    foreach($Big as $b){
      echo '<option value="'.$b['id'].'"  >'.$b['name'].'</option>';
  }
    ?>