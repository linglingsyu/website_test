<?php
include_once "../base.php";

$data = $Member->find($_POST['id']);

$data['name'] = $_POST['name'];

$Type->save($data);
to("../admin.php?do=th");
?>