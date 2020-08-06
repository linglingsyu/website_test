<h2>編輯頁尾版權區</h2>
<form action="api/bottom.php" method="post">
<?php
$row = $Bottom->find(1);
?>
<table>
  <tr>
    <td>頁尾宣告內容</td>
    <td><input type="text" name="bottom" value="<?=$row['bottom'] ?>"></td>
  </tr>
</table>
<input type="submit" value="編輯"><input type="reset" value="重置">
</form>