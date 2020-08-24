<form action="api/edit_mem.php" method="post">
<h1>編輯會員資料</h1>
<?php
$row = $Member->find($_GET['id']);
?>
<table>
  <tr>
    <td>帳號</td>
    <td><?=$row['acc']?></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><?=$row['pw']?></td>
  </tr>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
  </tr>
  <tr>
    <td>電子信箱</td>
    <td><input type="text" name="email" value="<?=$row['email']?>"></td>
  </tr>
  <tr>
    <td>地址</td>
    <td><input type="text" name="addr" value="<?=$row['addr']?>"></td>
  </tr>
  <tr>
    <td>電話</td>
    <td><input type="text" name="tel" value="<?=$row['tel']?>"></td>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
  </tr>
</table>
<input type="submit" value="編輯"><input type="reset" value="重置"><a href="?do=mem">取消</a>
</form>

