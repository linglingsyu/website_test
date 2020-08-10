
<?php
if(empty($_SESSION['mem'])){
  to("?do=login");
}

//判斷有沒有帶ID來，有的話加入購物車session
if(!empty($_GET['id'])){
  $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}


if(empty($_SESSION['cart'])){
  echo "<h2>請選擇商品</h2>";
  exit();
}else{
  echo "<h2>".$_SESSION['mem']."的購物車</h2>";
}

?>

<table class="all">
  <tr>
    <td class="tt">編號</td>
    <td class="tt">商品名稱</td>
    <td class="tt">數量</td>
    <td class="tt">庫存量</td>
    <td class="tt">單價</td> 
    <td class="tt">小計</td>
    <td class="tt">刪除</td>
  </tr>
  
  <?php
foreach($_SESSION['cart'] as $id => $qt){
  $goods = $Goods->find($id);
  ?>

  <tr>
    <td class="pp"><?=$goods['no']?></td>
    <td class="pp"><?=$goods['name']?></td>
    <td class="pp"><?= $qt ?></td>
    <td class="pp"><?=$goods['stock']?></td>
    <td class="pp"><?=$goods['price']?></td> 
    <td class="pp"><?= $goods['price']*$qt ?></td>
    <td class="pp"><a href="api/delcart.php?id=<?=$id?>"><img src="icon/0415.jpg" alt=""></a></td>
  </tr>

  <?php
}
  ?>
</table>
<a href="?do=main"><img src="icon/0411.jpg" alt=""></a>  <a href="?do=buy"><img src="icon/0412.jpg" alt=""></a>
<script>



</script>


