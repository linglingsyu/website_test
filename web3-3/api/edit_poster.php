<?php

include_once "../base.php";


foreach($_POST['id'] as $key => $id){
 if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
   $Poster->del($id);
 }else{
  $data = $Poster->find($id);
  if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
    $data['sh'] = 1;
  }else{
    $data['sh'] = 0;
  }
  $data['ani'] = $_POST['ani'][$key];
  $data['rank'] = $_POST['rank'][$key];
  $Poster->save($data);
 }
}

to("../admin.php?do=poster");


?>