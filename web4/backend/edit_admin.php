<h2 class="ct">修改管理員權限</h2>
<form action="api/add_admin.php" method="post">
<?php
$row = $Admin->find($_GET['id']);
$pr = unserialize($row['pr']);
?>
<table class="all">
  <tr>
    <td class="tt">帳號</td>
    <td class="pp"><input type="text" name="acc" value="<?= $row['acc']?>"></td>
  </tr>
  <tr>
    <td class="tt">密碼</td>
    <td class="pp"><input type="password" name="pw" value="<?= $row['pw']?>"></td>
  </tr>
  <tr>
    <td class="tt">權限</td>
    <td class="pp">
      <input type="checkbox" name="pr[]" value="1" <?= in_array(1,$pr)? "checked" : ""; ?>>商品分類與管理<br>
      <input type="checkbox" name="pr[]" value="2" <?= in_array(2,$pr)? "checked" : ""; ?>>訂單管理<br>
      <input type="checkbox" name="pr[]" value="3" <?= in_array(3,$pr)? "checked" : ""; ?>>會員管理<br>
      <input type="checkbox" name="pr[]" value="4" <?= in_array(4,$pr)? "checked" : ""; ?>>頁尾版權區管理<br>
      <input type="checkbox" name="pr[]" value="5" <?= in_array(5,$pr)? "checked" : ""; ?>>最新消息管理<br>
    </td>
  </tr>
</table>
<input type="hidden" name="id" value="<?= $row['id'] ?>">
<div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>

</form>