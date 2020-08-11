<?php

include_once "../base.php";

  $data = $Total->find($_POST['id']);
  $data['total'] = $_POST['total'];

$Total->save($data);
to("../admin.php?do=total");

?>