<?php

include_once "../base.php";
$no = $Ord->q("select max(`id`) from `ord`")[0][0]+1;
$data['no'] = date("Ymd").sprintf("%04d",$no);
$data['seat'] = serialize($_POST['seat']);
$data['movie'] = $_POST['movie'];
$data['date'] = $_POST['date'];
$data['session'] = $_POST['session'];
$data['qt'] = count($_POST['seat']);
// print_r($data);
$Ord->save($data);
echo $data['no'];

?>