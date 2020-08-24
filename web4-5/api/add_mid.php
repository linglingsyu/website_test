<?php

include_once "../base.php";

$Type->save(['name'=>$_POST['mid'],'parent'=>$_POST['big']]);

?>