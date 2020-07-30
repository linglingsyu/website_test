<?php

include_once "../base.php";
if(!empty($_POST['id'])){
  foreach($_POST['id'] as $key => $id){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $Menu->del($id);
    }else{
      $data = $Menu->find($id);
      $data['name'] = $_POST['name'][$key];
      $data['link'] = $_POST['link'][$key];
      $Menu->save($data);
    }  
  }  
}

  if(!empty($_POST['name2']) && !empty($_POST['link2'])){
    foreach($_POST['name2'] as $key => $name ){
      $data2 = [];
      $data2['name'] = $name;
      $data2['link'] = $_POST['link2'][$key];
      $data2['parent'] =  $_POST['parent'];
      $data2['sh'] = 1 ;
      //副選單都要設成可以顯示
      $Menu->save($data2);
    }
  }


to("../admin.php?do=menu");
