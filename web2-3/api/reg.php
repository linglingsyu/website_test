<?php
include_once "../base.php";

 echo $User->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);

?>