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

if(empty($_SESSION['mem'])){
  echo "<script>location.href='?do=login'</script>";
}

if(!empty($_GET['id'])){
  $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}

if(empty($_SESSION['cart'])){
  echo "<h1>請選擇商品</h1>";
}else{
  echo "<h1>".$_SESSION['mem']."的購物車</h1>";
  foreach($_SESSION['cart'] as $id =>$qt){
    $g = $Goods->find($id);
?>
    <tr>
      <td><?=$g['no']?></td>
      <td><?=$g['name']?></td>
      <td><?=$qt?></td>
      <td><?=$g['stock']?></td>
      <td><?=$g['price']?></td>
      <td><?=$g['price']*$qt?></td>
      <td><a href="api/del_cart.php?id=<?=$id?>"><img src="icon/0415.jpg" alt=""></a></td>
    </tr>

    <?php
  }
}

?>
</table>

<a href="index.php"><img src="icon/0411.jpg" alt=""></a><a href="?do=order"><img src="icon/0412.jpg" alt=""></a>