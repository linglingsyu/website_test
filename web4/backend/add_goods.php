<h2 class="ct">新增商品</h2>
<form action="api/add_goods.php" method="post" enctype="multipart/form-data">


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
    <td class="pp">完成新增後自動分配</td>
  </tr>
  <tr>
    <td class="tt">商品名稱</td>
    <td class="pp"><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td class="tt">商品價格</td>
    <td class="pp"><input type="text" name="price" id="price"></td>
  </tr>
  <tr>
    <td class="tt">規格</td>
    <td class="pp"><input type="text" name="spec" id="spec"></td>
  </tr>
  <tr>
    <td class="tt">庫存量</td>
    <td class="pp"><input type="text" name="stock" id="stock"></td>
  </tr>
  <tr>
    <td class="tt">商品圖片</td>
    <td class="pp"><input type="file" name="img" id="img"></td>
  </tr>
  <tr>
    <td class="tt">商品介紹</td>
    <td class="pp"><textarea name="intro" id="intro"  cols="30" rows="10"></textarea></td>
  </tr>
</table>
<div class="ct"><input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>


<script>
getbig();
  function getbig(){
    $.post("api/getbig.php",{},function(res){
      $("#big").html(res);
      $("#big").on("change",function(){
        getsec();
      }) 
      getsec();
    })
  }

  function getsec(){
     let big = $("#big").val();
       $.post("api/getsec.php",{big},function(res){
         console.log(res);
         $("#sec").html(res); 
       })
  }


</script>