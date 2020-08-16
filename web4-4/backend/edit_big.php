<?php
$row = $Type->find($_GET['id']);
?>
<form action="api/edit_big.php" method="post">
<table>
  <tr>
    <td>大分類</td>
    <td><input type="text" name="name" value="<?=$row['name']?>"></td>
    <input type="hidden" name="id" value="<?=$row['id']?>" >
  </tr>
</table>
<input type="submit" value="修改">
</form>