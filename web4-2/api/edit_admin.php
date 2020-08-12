<?php

include_once "../base.php";
    $row = $Admin->find($_POST['id']);
    $row['acc'] = $_POST['acc'];
    $row['pw'] = $_POST['pw'];
    $row['pr'] = serialize($_POST['pr']);
    $row = $Admin->save($row);
  to("../admin.php");

?>