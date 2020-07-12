<?php

include_once "../base.php";
$db = new DB("title");
$row = $db->find($_GET['id']);

?>


<form action="api/addtitle.php" method="post" enctype="multipart/form-data">
<h1>更新標題區圖片</h1>
<hr>
標題區圖片: <input type="file" name="img"><br>
標題區替代文字：<input type="text" name="text" value="<?= $row['text'] ?>">
<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<br>
<input type="submit" value="更新"><input type="reset" value="重置">
</form>