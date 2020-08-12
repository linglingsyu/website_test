<h1>填寫資料</h1>
<?php
$mem = $Member->find(['acc'=>$_SESSION['mem']]);
?>
<talbe>
  <tr>
    <td>登入帳號</td>
    <td><?=$_SESSION['mem']?><br></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" value="<?=$mem['name']?>"><br></td>
  </tr>
  <tr>
    <td>電子信箱</td>
    <td><input type="text" name="email" value="<?=$mem['email']?>"><br></td>
  </tr>
  <tr>
    <td>郵寄地址</td>
    <td><input type="text" name="addr" value="<?=$mem['addr']?>"><br></td>
  </tr>
  <tr>
    <td>聯絡電話</td>
    <td><input type="text" name="tel" value="<?=$mem['tel']?>"><br></td>
  </tr>
</talbe>

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
  foreach($_SESSION['cart'] as $id =>$qt){
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
<button onclick="check()">確定送出</button><button onclick="location.href='?do=buycart'">返回修改訂單</button>

<script>
  function check(){
    let data = $("input").serialize();
    $.post("api/ord.php",data,function(res){
      alert("訂購成功\n感謝您的選購！")
      location.href="index.php";
    })
  }
</script>