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
    <td width="20%"><img src="img/<?=$row['img']?>" style="width:40%"></td>
    <td><input type="text" name="name[]" value="<?=$row['name']?>"></td>
    <td><input type="text" name="rank[]" value="<?=$row['rank']?>"></td>
    <td>
      <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk ?>>顯示
      <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
      <select name="effect[]" id="">
        <option value="1" <?=$row['effect']=="1" ? "selected" : "" ; ?>>淡入淡出</option>
        <option value="2" <?=$row['effect']=="2" ? "selected" : "" ; ?>>縮放</option>
        <option value="3" <?=$row['effect']=="3" ? "selected" : "" ; ?>>滑入滑出</option>
      </select>
      <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </td>
  </tr>

  <?php
}
?>
</table>
<input type="submit" value="編輯確定"><input type="reset" value="重置">
</form>


<h1>新增預告片海報</h1>
<form action="api/add_poster.php" method="post">
預告片海報：<input type="file" name="img" id="img"> 預告片片名: <input type="text" name="name" id="name"><bt>
<input type="submit" value="新增"><input type="reset" value="重置">
</form>