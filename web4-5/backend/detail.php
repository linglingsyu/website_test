<?php
$ord = $Ord->find($_GET['id']);
?>
<h1>訂單編號<?=$ord['no']?>的詳細資料</h1>
<table>
  <tr>
    <td>會員帳號</td>
    <td><?=$ord['acc']?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><?=$ord['name']?></td>
  </tr>
  <tr>
    <td>電子信箱</td>
    <td><?=$ord['email']?></td>
  </tr>
  <tr>
    <td>住址</td>
    <td><?=$ord['addr']?></td>
  </tr>
  <tr>
    <td>聯絡電話</td>
    <td><?=$ord['tel']?></td>
  </tr>
</table>
<?php
$goods = unserialize($ord['goods']);
?>
<table>
  <tr>
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $sum = 0;
foreach($goods as $id => $qt){
  $g = $Goods->find($id);
  $sum+= $g['price']*$qt;
  ?>
  <tr>
    <td><?=$g['name']?></td>
    <td><?=$g['no']?></td>
    <td><?=$qt?></td>
    <td><?=$g['price']?></td>
    <td><?=$g['price']*$qt?></td>
  </tr>
<?php
}
?>
  <tr>
    <td colspan="5">總計：<?=$sum?></td>
  </tr>
</table>
<button onclick="location.href='?do=order'">返回</button>
