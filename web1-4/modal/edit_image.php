<h1>更新校園映像圖片</h1>
<hr>
<form action="api/image.php" method="post" enctype="multipart/form-data">
校園映像圖片：<input type="file" name="img" id=""><br>
<input type="hidden" name="id" value="<?=$_GET['id']?>">
<input type="submit" value="新增"><input type="reset" value="重置">
</form>