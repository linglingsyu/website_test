<?php
include_once "../base.php";
$maxid = $Ord->q("select max(`id`) from `ord`")[0][0]+1;
$data = [
 'name'=>$_POST['movie'],
 'date'=>$_POST['date'],
 'session'=>$_POST['session'],
 'seat'=>serialize($_POST['arr']),
  'qt'=>count($_POST['arr']),
  'no'=>date('Ymd').sprintf("%04d",$maxid)
];
$Ord->save($data);
echo  $data['no'];

?>