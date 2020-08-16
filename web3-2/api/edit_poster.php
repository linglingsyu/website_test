<?php
include_once "../base.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";

foreach($_POST['id'] as  $key => $id){
  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $Poster->del($id);
  }else{
    $row = $Poster->find($id);
    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $row['sh'] = 1;
    }else{
      $row['sh'] = 0;
    }
      $row['name'] = $_POST['name'][$key]; 
      $row['rank'] = $_POST['rank'][$key];
      $row['effect'] = $_POST['effect'][$key];
      $Poster->save($row);
  }
}

to("../admin.php?do=poster")







?>