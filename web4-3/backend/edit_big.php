
<form action="api/edit_big.php" method="post">
<?php
$row = $$Type->find($_GET['id']);

?>
<table>
  <tr>
    <td>修改大分類</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
    <td><input type="hidden" name="id" value="<?=$row['id']?>"></td>
  </tr>
</table>
<input type="submit" value="修改"><input type="reset" value="重置">
</form>