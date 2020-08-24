<?php
$row = $Bottom->find(1);
?>
<form action="api/bottom.php" method="post">
頁尾版權：<input type="text" name="bottom"  id="bottom" value="<?=$row['bottom']?>">
<input type="submit" value="修改">
</form>
<button type="button" onclick="reset()">重置</button>

<script>
  function reset(){
    console.log("123");
    $("#bottom").val("");
  }
</script>