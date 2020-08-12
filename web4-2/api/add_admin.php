<?php

include_once "../base.php";

    $row = $Admin->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'pr'=>serialize($_POST['pr'])]);
  to("../admin.php");

?>