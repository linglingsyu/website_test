<h1>編輯商品分類</h1>
<form action="api/edit_th.php" method="post">
<?php
$row = $Type->find($_GET['id']);
?>
<table>
  <tr>
    <td>分類名稱</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
    <input type="hidden" name="id" value="<?=$row['id']?>">
  </tr>
</table>
<input type="submit" value="編輯"><input type="reset" value="重置">
</form>