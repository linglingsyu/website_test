<form action="api/edit_admin.php" method="post">
<?php
$row = $Admin->find($_GET['id']);
$pr = unserialize($row['pr']);
?>
<table>
  <tr>
    <td>帳號</td>
    <td><input type="text" name="acc" value="<?=$row['acc']?>"></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="pw" value="<?=$row['pw']?>"></td>
    <input type="hidden" name="id" value="<?=$row['id']?>">
  </tr>
  <tr>
    <td>權限</td>
    <td>
      <input type="checkbox" name="pr[]" <?=in_array("1",$pr) ? "checked": "" ?> value="1">商品分類與管理<br>
      <input type="checkbox" name="pr[]" <?=in_array("2",$pr) ? "checked": "" ?> value="2">訂單管理<br>
      <input type="checkbox" name="pr[]" <?=in_array("3",$pr) ? "checked": "" ?> value="3">會員管理<br>
      <input type="checkbox" name="pr[]" <?=in_array("4",$pr) ? "checked": "" ?> value="4">頁尾版權管理<br>
      <input type="checkbox" name="pr[]" <?=in_array("5",$pr) ? "checked": "" ?> value="5">最新消息管理<br>
    </td>
  </tr>
</table>
<input type="submit" value="修改"><input type="reset" value="重置">
</form>