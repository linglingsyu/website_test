<?php

include_once "../base.php";
unset($_SESSION['member']);
to("../index.php?do=login");

?>