<h1 class="cent">更新動畫圖片</h1>
<hr>
<form action="api/add_mvim.php" method="post" enctype="multipart/form-data">
<div class="cent">
  動畫圖片：<input type="file" name="img"><br>
  <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
<input type="submit" value="更新"><input type="reset" value="重置"></div>
</form>