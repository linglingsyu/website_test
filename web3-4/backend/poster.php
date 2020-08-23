<h1>預告片清單</h1>
<form action="api/edit_poster.php" method="post">
<table>
  <tr>
    <td>預告片海報</td>
    <td>預告片片名</td>
    <td>預告片排序</td>
    <td>操作</td>
  </tr>

  <?php
  $rows = $Poster->all();
  foreach($rows as $row){
    $chk = $row['sh'] ? "checked" : "";
  ?>
  <tr>
    <td><img src="img/<?=$row['img']?>" style="width:50%"></td>
    <td><input type="text" name="name[]" value="<?=$row['name']?>"></td>
    <td><input type="text" name="rank[]" value="<?=$row['rank']?>"></td>
    <td>
    <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>>顯示
    <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
    <input type="hidden" name="id[]" value="<?=$row['id']?>">
    <select name="ani[]" id="">
      <option value="1" <?=$row['ani']=="1" ? "selected" : ""?>>淡入淡出</option>
      <option value="2" <?=$row['ani']=="2" ? "selected" : ""?>>縮放</option>
      <option value="3" <?=$row['ani']=="3" ? "selected" : ""?>>滑進滑出</option>
    </select>
  </td>
  </tr>
  <?php
    }
  ?>
</table>
<input type="submit" value="編輯">
</form>




<h1>新增預告片海報</h1>
<hr>
<form action="api/add_poster.php" method="post" enctype="multipart/form-data">
預告片海報: <input type="file" name="img" id=""> 預告片片名：　<input type="text" name="name" id=""><br>
<input type="submit" value="送出">
<input type="reset" value="重置">
</form>