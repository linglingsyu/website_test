<?php
include_once "../base.php";
$data['no'] = date("Ymd").rand(111111,999999);
$data['acc'] = $_SESSION['mem'];
$data['total'] = 0;
foreach($_SESSION['cart'] as $id =>$qt){
  $g = $Goods->find($id);
  $data['total'] += $g['price']*$qt;
}
$data['goods'] = serialize($_SESSION['cart']);
$data = array_merge($data,$_POST);
$Ord->save($data);


?>