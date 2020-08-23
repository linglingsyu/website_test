<?php

include_once "../base.php";

$Total->save(['id'=>1,'total'=>$_POST['total']]);
to("../admin.php?do=total");
?>