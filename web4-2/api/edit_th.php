<?php

include_once "../base.php";
    $row = $Type->find($_POST['id']);
    $row['name'] = $_POST['name'];
    $row = $Type->save($row);
  to("../admin.php?do=th");

?>