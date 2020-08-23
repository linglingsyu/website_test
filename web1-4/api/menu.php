<?php

include_once "../base.php";

$Menu->save(['text'=>$_POST['text'],'parent'=>0,'link'=>$_POST['link']]);
to("../admin.php?do=menu");
?>