<?php

include_once "../base.php";

foreach($_POST['id'] as $key => $id){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
      $Movie->del($id);
    }else{
      $data = $Movie->find($id);
      if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
          $data['sh']=1;
      }else{
          $data['sh']=0;
      }
      $data['rank'] = $_POST['rank'][$key];
      $Movie->save($data);
    }


}

 to("../admin.php?do=movie");

?>