<h1 class="cent">新增標題區圖片</h1>
<hr>
<form action="api/add_title.php" method="post" enctype="multipart/form-data">
<div class="cent">
  標題區圖片：<input type="file" name="img"><br>
  標題區替代文字：<input type="text" name="text"><br>
  <input type="hidden" name="table" value="title">
<input type="submit" value="新增"><input type="reset" value="重置"></div>
</form>