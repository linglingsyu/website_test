<?php

include_once "../base.php";

echo $User->count(['acc'=>$_GET['acc']]);


?>