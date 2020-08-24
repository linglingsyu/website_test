<h1>填寫資料</h1>
<?php
$m = $Member->find(['acc'=>$_SESSION['mem']]);
?>
<table>
  <tr>
    <td>登入帳號</td>
    <td><?=$_SESSION['mem']?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" value="<?=$m['name']?>"></td>
  </tr>
  <tr>
    <td>電子信箱</td>
    <td><input type="text" name="email" value="<?=$m['email']?>"></td>
  </tr>
  <tr>
    <td>住址</td>
    <td><input type="text" name="addr" value="<?=$m['addr']?>"></td>
  </tr>
  <tr>
    <td>聯絡電話</td>
    <td><input type="text" name="tel" value="<?=$m['tel']?>"></td>
  </tr>
</table>

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
foreach($_SESSION['cart'] as $id => $qt){
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
<button onclick="check()">確定送出</button><button onclick="location.href='?do=cart'">返回修改訂單</button>

<script>
  function check(){
    let data = $("input").serialize();
    $.post("api/check.php",data,function(res){
      console.log(res);
      alert("訂購成功");
    })
  }


</script>