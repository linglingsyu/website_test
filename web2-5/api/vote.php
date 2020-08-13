<?php

include_once "../base.php";
$row = $Que->find($_POST['text']);
$row['count']++;
$Que->save($row);
to("../index.php?do=que");
?>