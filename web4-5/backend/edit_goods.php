<?php
$row = $Goods->find($_GET['id']);
?>
<form action="api/edit_goods.php" method="post">
<table>
  <tr>
    <td>所屬大分類</td>
    <td><select name="big" id="big"></select></td>
  </tr>
  <tr>
    <td>所屬中分類</td>
    <td><select name="mid" id="mid"></select></td>
  </tr>
  <tr>
    <td>商品編號</td>
    <td>新增商品後自動分配</td>
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
    <td>商匹圖片</td>
    <td><input type="file" name="img" value="img"></td>
  </tr>
  <tr>
    <td>商品介紹</td>
    <td><textarea name="intro" value="intro" cols="30" rows="10"><?=$row['intro']?></textarea></td>
  </tr>
<input type="hidden" name="id" value="<?=$row['id']?>">
</table>

<input type="submit" value="編輯"><input type="reset" value="重置"><button type="button" onclick="location.href='?do=th'">返回</button>
</form>

<script>

getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",function(res){
      $("#big").html(res);
      $("#big [option='<?=$row['big']?>']").prop("selected",true);
      getmidlist();
      $("#big").on("change",function(){
        getmidlist();
      })
    })
  }

  function getmidlist(){
    let big = $("#big").val();
    $.post("api/getmidlist.php",{big},function(res){
      $("#mid").html(res);
      $("#mid [option='<?=$row['mid']?>']").prop("selected",true);
    })
  }



</script>