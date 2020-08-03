<?php
include_once "../base.php";

foreach($_POST['id'] as $key => $id){

  if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
    $Poster->del($id);
  }else{
    $data = $Poster->find($id);
    if(!empty($_FILES['img']['tmp_name'])){
      $filename = $_FILES['img']['name'];
      move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
      $data['img'] = $filename;
    }

    if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
      $data['sh']= 1;
    }else{
      $data['sh'] = 0;
    }
    if( !empty($_POST['name'])  ){
      $data['name'] = $_POST['name'][$key];
    }
    if( !empty($_POST['ord'])  ){
      $data['ord'] = $_POST['ord'][$key];
    }
    if( !empty($_POST['effect']) ){
      $data['effect'] = $_POST['effect'][$key];
    }

    $Poster->save($data);

  }

}


to("../admin.php?do=poster");

?>