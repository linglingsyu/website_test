<h1>填寫資料</h1>

<?php
$mem = $Member->find(['acc'=>$_SESSION['member']]);
?>
<table>
  <tr>
    <td>登入帳號</td>
    <td><?=$_SESSION['member']?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" value="<?=$mem['name']?>"></td>
  </tr>
  <tr>
    <td>電子郵件</td>
    <td><input type="text" name="email" value="<?=$mem['email']?>"></td>
  </tr>
  <tr>
    <td>住址</td>
    <td><input type="text" name="addr" value="<?=$mem['addr']?>"></td>
  </tr>
  <tr>
    <td>電話</td>
    <td><input type="text" name="tel" value="<?=$mem['tel']?>"></td>
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
    $sum += $g['price']*$qt;
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
    let data  = $("input").serialize();
    $.post("api/check.php",data,function(res){
        alert("訂購成功");
    })
  }
</script>