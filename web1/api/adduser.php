<?php
include_once "../base.php";

$db = new DB("user");

$db->save($_POST);
to("../admin.php?do=user");


