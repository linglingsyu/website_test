<?php
include_once "../base.php";

$db = new DB("menu");
$db->save($_POST);
to("../admin.php?do=menu");


