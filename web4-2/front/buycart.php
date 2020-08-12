


<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>數量</td>
    <td>庫存量</td>
    <td>單價</td>
    <td>小計</td>
    <td>刪除</td>
  </tr>
<?php

if(!empty($_GET['id'])){
  $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if(empty($_SESSION['mem'])){
  to("?do=login");
}



if(!empty($_SESSION['cart'])){
  echo "<h2>".$_SESSION['mem']."的購物車</h2>";
  $sum = 0;
  foreach($_SESSION['cart'] as $id =>$qt){
    $goods = $Goods->find($id);
    $sum += $goods['price']*$qt;
?>

  <tr>
    <td><?=$goods['no']?></td>
    <td><?=$goods['name']?></td>
    <td><?=$qt?></td>
    <td><?=$goods['stock']?></td>
    <td><?=$goods['price']?></td>
    <td><?=$goods['price']*$qt?></td>
    <td><a href="api/del_cart.php?id=<?=$id?>"><img src="icon/0415.jpg" alt=""></a></td>
  </tr>

<?php
  }
}else{
  echo "<h2>請選擇商品</h2>";
}
?>
</table>
<a href="index.php"><img src="icon/0411.jpg" alt=""></a><a href="?do=ord"><img src="icon/0412.jpg" alt=""></a>

