<h2 class="ct">填寫資料</h2>
<?php
$mem = $Member->find(['acc'=>$_SESSION['mem']]);
?>
<table class="all ct">
  <tr>
    <td class="tt">登入帳號</td>
    <td class="pp"><?=$_SESSION['mem']?></td>
  </tr>
  <tr>
    <td class="tt">姓名</td>
    <td class="pp"><input type="text" name="name" id="name" value="<?=$mem['name'] ?>"></td>
  </tr>
  <tr>
    <td class="tt">電子信箱</td>
    <td class="pp"><input type="text" name="email" id="email" value="<?=$mem['email'] ?>"></td>
  </tr>
  <tr>
    <td class="tt">聯絡地址</td>
    <td class="pp"><input type="text" name="addr" id="addr" value="<?=$mem['addr'] ?>"></td>
  </tr>
  <tr>
    <td class="tt">聯絡電話</td>
    <td class="pp"><input type="text" name="tel" id="tel" value="<?=$mem['tel'] ?>"></td>
  </tr>
</table>
<table class="all ct">
  <tr>
    <td class="tt">商品名稱</td>
    <td class="tt">編號</td>
    <td class="tt">數量</td>
    <td class="tt">單價</td>
    <td class="tt">小計</td>
  </tr>
  <?php

$sum = 0;
  foreach($_SESSION['cart'] as $id => $qt){
  $g = $Goods->find($id);
  ?>
  <tr>
    <td class="pp"><?=$g['name']?></td>
    <td class="pp"><?=$g['no']?></td>
    <td class="pp"><?=$qt?></td>
    <td class="pp"><?=$g['price']?></td>
    <td class="pp"><?=$g['price'] * $qt ?></td>
  </tr>
  <tr>
<?php
$sum += ($g['price'] * $qt);
}
?>
  <td colspan="5" class="tt">總價:<?= $sum ?></td>
  </tr>
</table>

<div class="ct"><button onclick="check()">確定送出</button><button onclick="location.href='?do=cart'">返回修改訂單</button></div>


<script>
  function check(){
    let data = $("input").serialize();
    console.log(data);
    $.post("api/ord.php",data,function(){
      alert("訂購成功\n感謝您的訂購");
    })
  }
</script>