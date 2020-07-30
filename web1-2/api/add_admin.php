<?php

include_once "../base.php";

$data = [];
if(!empty($_POST['acc']) && !empty($_POST['pw'])){
  $data['acc'] = $_POST['acc'];
  $data['pw'] = $_POST['pw'];
  $User->save($data);

}
 to("../admin.php?do=admin");

?>