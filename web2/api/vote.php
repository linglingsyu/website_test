<?php

include_once "../base.php";

$row= $Que->find(['id'=>$_POST['opt']]);
$row['count']++;
$Que->save($row);

to("../index.php?do=que");

?>