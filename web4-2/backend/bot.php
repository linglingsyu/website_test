<?php
$row = $Bottom->find(1);
?>
<form action="api/edit_bottom.php" method="post">
<table>
  <tr>
    <td>頁尾版權內容</td>
    <td><input type="text" name="bottom" value="<?=$row['bottom']?>"></td>
  </tr>
</table>
<input type="submit" value="編輯">
</form>
<button type="button" onclick="reset()">重置</button>

<script>
  function reset(){
    $("input[type='text']").val("");
  }
</script>