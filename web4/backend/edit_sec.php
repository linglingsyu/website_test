<h2 class="ct">編輯大分類</h2>
<form action="api/edit_sec.php" method="post">
<?php
$row = $Type->find($_GET['id']);
?>
<table class="all">
  <tr>
    <td class="tt">中分類名稱</td>
    <td class="pp"><input type="text" name="sec" value="<?= $row['name']?>"></td>
    <input type="hidden" name="id" value="<?=$row['id']?>">
  </tr>
</table>

<div class="ct"><input type="submit" value="修改"><input type="reset" value="重置"></div>

</form>