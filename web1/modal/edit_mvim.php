<?php

include_once "../base.php";
$db = new DB("mvim");
$row = $db->find($_GET['id']);

?>


<form action="api/addmvim.php" method="post" enctype="multipart/form-data">
<h1>更新動畫圖片</h1>
<hr>
動畫圖片: <input type="file" name="img"><br>
<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<br>
<input type="submit" value="更新"><input type="reset" value="重置">
</form>