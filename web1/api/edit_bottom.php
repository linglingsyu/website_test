<?php
include_once "../base.php";

$db = new DB("bottom");
$db->save($_POST);
to("../admin.php?do=bottom");




