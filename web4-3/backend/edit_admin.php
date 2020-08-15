<h1>修改管理員權限</h1>
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
    <td><input type="password" name="pw" value="<?=$row['pw']?>"></td>
  </tr>
  <tr>
    <td>權限</td>
    <td>
        <input type="checkbox" name="pr[]" value="1" <?=in_array("1",$pr)? "checked" : "" ?>>商品分類與管理<br>
        <input type="checkbox" name="pr[]" value="2" <?=in_array("2",$pr)? "checked" : "" ?>>訂單管理<br>
        <input type="checkbox" name="pr[]" value="3" <?=in_array("3",$pr)? "checked" : "" ?>>會員管理<br>
        <input type="checkbox" name="pr[]" value="4" <?=in_array("4",$pr)? "checked" : "" ?>>頁尾版權區管理<br>
        <input type="checkbox" name="pr[]" value="5" <?=in_array("5",$pr)? "checked" : "" ?>>最新消息管理<br>
        <input type="hidden" name="id" value="<?=$row['id']?>">
    </td>
  </tr>
</table>

<input type="submit" value="修改"><input type="reset" value="重置">
</form>