<?php
include_once "../base.php";
$movie = $Movie->find($_POST['movie']);
$data['date'] = $_POST['date'];
$data['name'] = $movie['name'];
$data['session'] = $_POST['session'];
print_r($_POST['chk']);
$data['seat'] = serialize($_POST['chk']);
$aaa = explode("-",$_POST['date']);
$maxid = $Ord->q("select max(`id`) from `ord`");
$max = $maxid[0][0]+1;
$no = sprintf("%04d",$max);
$noo = $aaa[0].$aaa[1].$aaa[2].$no;
$data['no'] = $noo;
$data['qt'] = count($_POST['chk']);
$Ord->save($data);
$row = $Ord->find(['no'=> $noo]);
 to("../index.php?do=result&id=".$row['id']);


?>