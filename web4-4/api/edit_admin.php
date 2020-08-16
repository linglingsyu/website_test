<?php

include_once "../base.php";
$row = $Admin->find($_POST['id']);
$row['pr'] = serialize($_POST['pr']);
$row['acc'] = $_POST['acc'];
$row['pw'] = $_POST['pw'];
$Admin->save($row);
to("../admin.php?do=admin");
?>

