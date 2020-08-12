<?php

include_once "../base.php";

$data['no'] = date("Ymd").rand(111111,999999);
$total = 0;
foreach($_SESSION['cart'] as $id=>$qt){
  $goods = $Goods->find($id);
  $total += $goods['price']*$qt;
}
$data['total'] = $total;
$data = array_merge($_POST,$data);
$data['acc'] = $_SESSION['mem'];
$data['goods'] = serialize($_SESSION['cart']);
$Ord->save($data);

?>