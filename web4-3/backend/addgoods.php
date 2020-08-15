<h1>新增商品</h1>
<form action="api/addgoods.php" method="post">
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
    <td><input type="text" name="name" id=""></td>
  </tr>
  <tr>
    <td>商品價格</td>
    <td><input type="text" name="price" id=""></td>
  </tr>
  <tr>
    <td>規格</td>
    <td><input type="text" name="spec" id=""></td>
  </tr>
  <tr>
    <td>庫存量</td>
    <td><input type="text" name="stock" id=""></td>
  </tr>
  <tr>
    <td>商品圖片</td>
    <td><input type="file" name="img" id=""></td>
  </tr>
  <tr>
    <td>商品介紹</td>
    <td><textarea name="intro" id="intro" cols="30" rows="10"></textarea></td>
  </tr>
</table>

<input type="submit" value="新增">
<input type="reset" value="重置">
<button type="button" onclick="location.href='?do=th'">返回</button>
</form>
<script>


getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",function(res){
        $("#big").html(res);
        getmidlist()
        $("#big").on("change",function(){
           getmidlist()
        })
    })
  }

  function getmidlist(){
    let big =  $("#big").val();
    $.post("api/getmidlist.php",{big},function(res){
        $("#mid").html(res);
    })
  }



</script>