<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $Mvim->del($id);
  }else{
    $row = $Mvim->find($id);
    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $row['sh'] = 1;
    }else{
      $row['sh'] = 0;
    }
    $Mvim->save($row);
  }

}

to("../admin.php?do=mvim");

?>