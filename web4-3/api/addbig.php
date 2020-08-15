<?php
include_once "../base.php";

$Type->save(['name'=>$_POST['big'],'parent'=>0]);
$row = $Type->find(['name'=>$_POST['big'],'parent'=>0]);
echo "<option value='".$row['id']."'>".$row['name']."</option>"

?>