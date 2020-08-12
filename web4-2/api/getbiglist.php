<?php

include_once "../base.php";
$rows = $Type->all(['parent'=>0]);
foreach($rows as $row){
  echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}

?>


