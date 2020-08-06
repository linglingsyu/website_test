<h2 class="ct">編輯商品</h2>
<form action="api/edit_goods.php" method="post" enctype="multipart/form-data">

<?php

$row = $Goods->find($_GET['id']);

?>
<table class="all">
  <tr>
    <td class="tt">所屬大分類</td>
    <td class="pp"><select name="big" id="big"></select></td>
  </tr>
  <tr>
    <td class="tt">所屬中分類</td>
    <td class="pp"><select name="sec" id="sec"></select></td>
  </tr>
  <tr>
    <td class="tt">商品編號</td>
    <td class="pp"><?=$row['no']?></td>
  </tr>
  <tr>
    <td class="tt">商品名稱</td>
    <td class="pp"><input type="text" name="name" value="<?=$row['name']?>"></td>
  </tr>
  <tr>
    <td class="tt">商品價格</td>
    <td class="pp"><input type="text" name="price" value="<?=$row['price']?>"></td>
  </tr>
  <tr>
    <td class="tt">規格</td>
    <td class="pp"><input type="text" name="spec" value="<?=$row['spec']?>"></td>
  </tr>
  <tr>
    <td class="tt">庫存量</td>
    <td class="pp"><input type="text" name="stock" value="<?=$row['stock']?>"></td>
  </tr>
  <tr>
    <td class="tt">商品圖片</td>
    <td class="pp"><input type="file" name="img" ></td>
  </tr>
  <tr>
    <td class="tt">商品介紹</td>
    <td class="pp"><textarea name="intro" cols="30" rows="10"><?=$row['intro']?></textarea></td>
    <input type="hidden" name="id" value="<?=$row['id']?>">
  </tr>
</table>
<div class="ct"><input type="submit" value="編輯"><input type="reset" value="重置"></div>
</form>


<script>

getbig();
  function getbig(bigid){
    $.post("api/getbig.php",{},function(res){
      $("#big").html(res);
      $("#big option[value='<?=$_GET['big']?>']").prop("selected",true);
      $("#big").on("change",function(){
        getsec();
      }) 
      getsec();
    })
  }

  function getsec(){
     let big = $("#big").val();
       $.post("api/getsec.php",{big},function(res){
         $("#sec").html(res); 
         $("#sec option[value='<?=$_GET['sec']?>']").prop("selected",true);
       })
  }


</script>