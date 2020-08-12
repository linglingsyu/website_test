<?php

include_once "../base.php";
$rows = $Type->all(['parent'=>$_POST['big']]);
foreach($rows as $row){
  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>


