<?php

include_once "../base.php";
$db = new DB("menu");
$rows = $db->all(['parent'=>$_GET['id']]);

?>

<form action="api/submenu.php" method="post" >
<h1>編輯次選單</h1>
<hr>
<table id="aa">
  <tr>
  <td>次選單名稱</td>
  <td>選單連結網址</td>
  <td>刪除</td>
  </tr>
<?php

foreach($rows as $row){
?>
  <tr>
  <td><input type="text" name="name[]" value="<?= $row['name']; ?>"></td>
  <td><input type="text" name="link[]" value="<?= $row['link']; ?>"></td>
  <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>">></td>
  <input type="hidden" name="id[]" value="<?= $row['id']; ?>">>
  </tr>
  
<?php
}


?>
</table>


<br>
<input type="submit" value="修改確定"><input type="reset" value="重置"><input onclick="more()" type="button" value="更多次選單">

</form>

<script>

  function more(){
    let content = `
    <tr>
  <td><input type="text" name="text2[]"></td>
  <td><input type="text" name="link2[]"></td>
  <td></td>
  </tr>`;

  $("#aa").append(content);
  }




</script>