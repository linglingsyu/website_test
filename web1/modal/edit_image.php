<?php

include_once "../base.php";
$db = new DB("image");
$row = $db->find($_GET['id']);

?>


<form action="api/addimage.php" method="post" enctype="multipart/form-data">
<h1>更新校園映像圖片</h1>
<hr>
校園映像圖片: <input type="file" name="img"><br>
<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<br>
<input type="submit" value="更新"><input type="reset" value="重置">
</form>