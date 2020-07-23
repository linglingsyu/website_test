<?php
include_once "../base.php";

$db = new DB("total");
$db->save($_POST);
to("../admin.php?do=total");




