<h1>修改商品</h1>
<?php
$row = $Goods->find($_GET['id']);
?>
<form action="api/addgoods.php" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <td>所屬大分類</td>
    <td>
      <select name="big" id="big"></select>
    </td>
  </tr>
  <tr>
    <td>所屬中分類</td>
    <td>
    <select name="mid" id="mid"></select>
    </td>
  </tr>
  <tr>
    <td>商品編號</td>
    <td><?=$row['no']?></td>
  </tr>
  <tr>
    <td>商品名稱</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
  </tr>
  <tr>
    <td>商品價格</td>
    <td><input type="text" name="price" value="<?=$row['price']?>"></td>
  </tr>
  <tr>
    <td>規格</td>
    <td><input type="text" name="spec" value="<?=$row['spec']?>"></td>
  </tr>
  <tr>
    <td>庫存量</td>
    <td><input type="text" name="stock" value="<?=$row['stock']?>"></td>
  </tr>
  <tr>
    <td>商品圖片</td>
    <td><input type="file" name="img" value=""></td>
  </tr>
  <tr>
    <td>商品介紹</td>
    <td><textarea name="intro" id="" cols="30" rows="10"><?=$row['intro']?></textarea></td>
  </tr>
  <input type="hidden" name="id" value="<?=$row['id']?>">
</table>
<input type="submit" value="修改"><input type="reset" value="重置"><button type="button" onclick="location.href='?do=th'">返回</button>
</form>

<script>
  getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",{},function(res){
        $("#big").html(res);
        $("#big option[value='<?=$row['big']?>']").prop("selected",true);
        $("#big").on("change",function(){
          getmidlist()
        })
        getmidlist()
    })
  }

  function getmidlist(){
    let big = $("#big").val();
    $.post("api/getmidlist.php",{big},function(res){
        $("#mid").html(res);
        $("#mid option[value='<?=$row['mid']?>']").prop("selected",true);
    })
  }
  
</script>