<form action="api/edit_poster.php" method="post" enctype="multipart/form-data">
<div id="mm">
<h2>預告片清單</h2>
<hr>
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
    $chk = ($row['sh'] == "1") ? "checked" : "";
  ?>
  <tr>
    <td><img style="width:50%" src="img/<?= $row['img'] ?>" alt=""></td>
    <td><input type="text" name="name[]" value="<?=$row['name'] ?>"></td>
    <td><input type="text" name="ord[]" value="<?= $row['ord'] ?>"></td>
    <td>
      顯示<input type="checkbox" name="sh[]" value="<?= $row['id']?>" <?= $chk ?>>
    刪除<input type="checkbox" name="del[]" value="<?=$row['id']?>"><br>
    請選擇效果
    <select name="effect[]" >
      <option value="1" <?= $row['effect'] == "1" ? "selected" : "" ?>>淡入</option>
      <option value="2" <?= $row['effect'] == "2" ? "selected" : "" ?>>縮放</option>
      <option value="3" <?= $row['effect'] == "3" ? "selected" : "" ?>>滑出</option>
    </select>
    <input type="hidden" name="id[]" value="<?=$row['id']?>">
  </td>
  </tr>
  <?php
    }
  ?>
</table>

<input type="submit" value="編輯確定"> <input type="reset" value="重置">
</div>
</form>


<hr>
<form action="api/addposter.php" method="post" enctype="multipart/form-data">
<div id="mm">
<h2>新增預告片海報</h2>
<hr>
預告片海報：<input type="file" name="img" id="img"> 預告片片名：<input type="text" name="name" id="name">
<br>
<input type="submit" value="新增"> <input type="reset" value="重置">
</div>
</form>