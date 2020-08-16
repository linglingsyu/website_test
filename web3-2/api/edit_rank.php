<?php
include_once "../base.php";
foreach($_POST['id'] as $key=> $id){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Movie->del($id);
    }else{
        $row = $Movie->find($id);
        if(!empty($_POST['sh']) && in_array($id,$_POST['sh'])){
            $row['sh'] = 1;
        }else{
            $row['sh'] = 0;
        }
        $row['rank'] = $_POST['rank'][$key];
        $Movie->save($row);
    }

} 
to("../admin.php?do=movie")

?>