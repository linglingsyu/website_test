<?php
$ord = $Ord->find($_GET['id']);
?>
<h2 class="ct">訂單編號<?=$ord['no']?>的詳細資料</h2>
<table class="all ct">
  <tr>
    <td class="tt">會員帳號</td>
    <td class="pp"><?=$ord['acc']?></td>
  </tr>
  <tr>
    <td class="tt">姓名</td>
    <td class="pp"><?=$ord['name'] ?></td>
  </tr>
  <tr>
    <td class="tt">電子信箱</td>
    <td class="pp"><?=$ord['email'] ?></td>
  </tr>
  <tr>
    <td class="tt">聯絡地址</td>
    <td class="pp"><?=$ord['addr'] ?></td>
  </tr>
  <tr>
    <td class="tt">聯絡電話</td>
    <td class="pp"><?=$ord['tel'] ?></td>
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

$goods = unserialize($ord['goods']);
  foreach($goods as $id => $qt){
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

<div class="ct"><button onclick="location.href='?do=order'">返回</button></div>


<script>
  function check(){
    let data = $("input").serialize();
    console.log(data);
    $.post("api/ord.php",data,function(){
      alert("訂購成功\n感謝您的訂購");
    })
  }
</script>