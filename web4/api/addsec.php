<?php

include_once "../base.php";

$Type->save(['name'=>$_POST['sec'],'parent'=>$_POST['big']]);

?>