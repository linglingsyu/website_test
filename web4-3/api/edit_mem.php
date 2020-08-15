<?php
include_once "../base.php";

$data = $Member->find($_POST['id']);

$data['email'] = $_POST['email'];
$data['tel'] = $_POST['tel'];
$data['addr'] = $_POST['addr'];
$data['name'] = $_POST['name'];
$Member->save($data);
to("../admin.php?do=mem");
?>