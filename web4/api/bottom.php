<?php
include_once "../base.php";
$row = $Bottom->find(1);
if(!empty($_POST['bottom'])){
  $row['bottom'] = $_POST['bottom'];
}
$Bottom->save($row);
to("../admin.php?do=bottom");
?>