<?php
$ord = $Ord->find($_GET['id']);
?>

<h1>訂單編號<?=$ord['no']?>的詳細資料</h1>

<talbe>
  <tr>
    <td>登入帳號：</td>
    <td><?=$_SESSION['mem']?><br></td>
  </tr>
  <tr>
    <td>姓名：</td>
    <td><?=$ord['name']?><br></td>
  </tr>
  <tr>
    <td>電子信箱：</td>
    <td><?=$ord['email']?><br></td>
  </tr>
  <tr>
    <td>郵寄地址：</td>
    <td><?=$ord['addr']?><br></td>
  </tr>
  <tr>
    <td>聯絡電話：</td>
    <td><?=$ord['tel']?><br></td>
  </tr>
</talbe>

<table>
  <tr style="color:red">
    <td>商品名稱</td>
    <td>編號</td>
    <td>數量</td>
    <td>單價</td>
    <td>小計</td>
  </tr>
  <?php
  $g = unserialize($ord['goods']);
  $sum = 0;
  foreach($g as $id =>$qt){
    $goods = $Goods->find($id);
    $sum += $goods['price']*$qt;
  ?>
  <tr>
    <td><?=$goods['name']?></td>
    <td><?=$goods['no']?></td>
    <td><?=$qt?></td>
    <td><?=$goods['price']?></td>
    <td><?=$goods['price']*$qt?></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="5">總計：<?=$sum?></td>
  </tr>
</table>
<button onclick="location.href='?do=order'">返回</button>

<script>
  function check(){
    let data = $("input").serialize();
    $.post("api/ord.php",data,function(res){
      alert("訂購成功\n感謝您的選購！")
      location.href="index.php";
    })
  }
</script>