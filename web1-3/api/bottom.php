<?php

include_once "../base.php";

  $data = $Bottom->find($_POST['id']);
  $data['bottom'] = $_POST['bottom'];

$Bottom->save($data);
to("../admin.php?do=bottom");

?>