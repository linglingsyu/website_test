<h2>預告片清單</h2>
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
  $chk = $row['sh'] ? "checked" : "" ;
?>
  <tr>
    <td><img src="img/<?=$row['img']?>" style="width:50%"></td>
    <td><?=$row['name']?></td>
    <td><input type="text" name="rank" value="<?=$row['rank']?>"></td>
    <td>
      <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>>顯示
      <input type="checkbox" name="del[]" value="<?=$row['id']?>">刪除
      <br>動畫:<select name="ani[]" id="">
        <option value="1">淡進淡出</option>
        <option value="2">縮放</option>
        <option value="3">滑入滑出</option>
      </select>
      <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </td>
  </tr>
<?php
}
?>
</table>



<form action="api/add_poster.php" method="post" enctype="multipart/form-data">
<h2>新增預告片海報</h2>
預告片海報：<input type="file" name="img" >預告片片名：<input type="text" name="name" >
<input type="submit" value="新增"><input type="reset" value="重置">
</form>
