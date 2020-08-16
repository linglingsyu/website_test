<?php
include_once "../base.php";



    $data = $Movie->find($_POST['id']);
    if(!empty($_FILES['img']['tmp_name'])){
      $filename = $_FILES['img']['name'];
      move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
      $data['img'] = $filename;
    }

    if(!empty($_FILES['mv']['tmp_name'])){
      $file = $_FILES['mv']['name'];
      move_uploaded_file($_FILES['mv']['tmp_name'],"../img/".$file);
      $data['mv'] = $file;
    }

    $data['name'] = $_POST['name'];
    $data['class'] = $_POST['class'];
    $data['length'] = $_POST['length'];
    $data['date'] = $_POST['date'];
    $data['boss'] = $_POST['boss'];
    $data['director'] = $_POST['director'];
    $data['intro'] = $_POST['intro'];
    $Movie->save($data);

to("../admin.php?do=movie");

?>