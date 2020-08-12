<h1>編輯管理者帳號</h1>
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
    <input type="checkbox" value="1" <?= in_array("1",$pr)?"checked":""; ?> name="pr[]">商品分類與管理<br>
    <input type="checkbox" value="2" <?= in_array("2",$pr)?"checked":""; ?> name="pr[]">訂單管理<br>
    <input type="checkbox" value="3" <?= in_array("3",$pr)?"checked":""; ?> name="pr[]">會員管理<br>
    <input type="checkbox" value="4" <?= in_array("4",$pr)?"checked":""; ?> name="pr[]">頁尾版權區管理<br>
    <input type="checkbox" value="5" <?= in_array("5",$pr)?"checked":""; ?> name="pr[]">最新消息管理<br>
    <input type="hidden" name="id" value="<?=$row['id']?>">
    </td>
  </tr>
</table>
<input type="submit" value="編輯"><input type="reset" value="重置">
</form>