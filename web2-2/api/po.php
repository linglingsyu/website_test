<?php

include_once "../base.php";

$rows = $News->all(['type'=>$_POST['type']]);
foreach($rows as $row){
  echo '<a class="lis" href="javascript:gettext('.$row['id'].')">'.$row['title'].'</a>'."<br>";
}

?>

