

<?php
$row = $Ord->find($_GET['id']);
?>
<h1>訂單編號<?=$row['no']?>的詳細資料</h1>
<table>
  <tr>
    <td>會員帳號</td>
    <td><?=$_SESSION['member']?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
  </tr>
  <tr>
    <td>電子郵件</td>
    <td><input type="text" name="email" value="<?=$row['email']?>"></td>
  </tr>
  <tr>
    <td>住址</td>
    <td><input type="text" name="addr" value="<?=$row['addr']?>"></td>
  </tr>
  <tr>
    <td>電話</td>
    <td><input type="text" name="tel" value="<?=$row['tel']?>"></td>
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
     $goods = unserialize($row['goods']);
  foreach($goods as $id =>$qt){
    $g = $Goods->find($id);
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
    <td colspan="5">總計：<?=$row['total']?></td>
  </tr>
</table>

<button onclick="location.href='?do=order'">返回</button>

<script>
  function check(){
    let data  = $("input").serialize();
    $.post("api/check.php",data,function(res){
        alert("訂購成功");
    })
  }
</script>