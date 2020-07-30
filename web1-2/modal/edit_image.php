<h1 class="cent">更新校園映像圖片</h1>
<hr>
<form action="api/add_image.php" method="post" enctype="multipart/form-data">
<div class="cent">
校園映像圖片：<input type="file" name="img"><br>
  <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<input type="submit" value="更新"><input type="reset" value="重置"></div>
</form>