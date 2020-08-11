<?php

include_once "../base.php";
?>
<h2>編輯次選單</h2>
<hr>
<form action="api/submenu.php" method="post">
<table>
  <tr>
    <td>次選單名稱</td>
    <td>次選單連結網址</td>
    <td>刪除</td>
  </tr>
  <?php

  $rows = $Menu->all(['parent'=>$_GET['id']]);
  foreach($rows as $row){
  ?>
  <tr>
    <td><input type="text" name="text[]" value="<?=$row['text']?>"></td>
    <td><input type="text" name="link[]" value="<?=$row['link']?>"></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    <input type="hidden" name="id[]" value="<?=$row['id']?>">
    <input type="hidden" name="parent[]" value="<?=$_GET['id']?>">
  </tr>
  <?php
  }
  ?>
</table>
<input type="submit" value="修改確定"><input type="reset" value="重置"><button type="button" onclick="more()">更多次選單</button>
</form>
<script>
  function more(){
    let str =  `
    <tr>
    <td><input type="text" name="text2[]"></td>
    <td><input type="text" name="link2[]"></td>
    <input type="hidden" name="parent" value="<?=$_GET['id']?>">
    </tr>   
    `;
    $("table").append(str);
  }

</script>