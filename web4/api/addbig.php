<?php
include_once "../base.php";
if(!empty($_POST['id'])){
  $row = $Type->find($_POST['id']);
}
if(!empty($_POST['big'])){
  $row['name'] = $_POST['big'];
  $row['parent'] = 0;
  $Type->save($row);
}
$big = $Type->all(['parent'=>0]);
foreach($big as $b){
  echo "<option value='".$b['id']."'>".$b['name']."</option>";
}


?>