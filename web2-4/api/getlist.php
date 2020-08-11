<?php

include_once "../base.php";

$row = $News->all(['type'=>$_POST['type']]);
foreach($row as $r){
  echo '<a href="javascript:gettext('.$r['id'].')">'.$r['title'].'</a><br>';
}

?>