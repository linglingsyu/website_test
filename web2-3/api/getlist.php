<?php
include_once "../base.php";
$rows = $News->all(['type'=>$_POST['type']]);
foreach($rows as $row){
  echo '<a href="#" onclick="getpost('.$row['id'].')">'.$row['title'].'</a>'."<br>";
}


?>