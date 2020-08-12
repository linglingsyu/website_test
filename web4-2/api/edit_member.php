<?php

include_once "../base.php";
    $row = $Member->find($_POST['id']);
    $row['acc'] = $_POST['acc'];
    $row['pw'] = $_POST['pw'];
    $row['email'] = $_POST['email'];
    $row['tel'] = $_POST['tel'];
    $row['name'] = $_POST['name'];
    $row['addr'] = $_POST['addr'];
    $row = $Member->save($row);
  to("../admin.php?do=mem");

?>