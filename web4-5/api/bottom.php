<?php

include_once "../base.php";

$row = $Bottom->find(1);
$row['bottom'] = $_POST['bottom'];
$Bottom->save($row);
to("../admin.php?do=bot")
?>