<?php

include_once "../base.php";

$data['no'] = date("Ymd").rand(111111,999999);
$data['goods'] = serialize($_SESSION['cart']);
$data['total'] = 0;
$data['acc'] = $_SESSION['member'];
foreach($_SESSION['cart'] as $id => $qt){
  $g = $Goods->find($id);
  $data['total'] = $g['price']*$qt;
}
$tt = array_merge($data,$_POST);
$Ord->save($tt);


?>