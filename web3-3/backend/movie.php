<button onclick="location.href='?do=add_movie'">新增電影</button>
<form action="api/edit_m2.php" method="post">
<table>
<?php
$rows = $Movie->all();
foreach($rows as $row){
  $chk = $row['sh'] ? "checked" : "";
?>
  <tr>
    <td width="30%"><img src="img/<?=$row['img']?>" style="width:50%"></td>
    <td width="5%">分級<img src="icon/<?=$row['class']?>.png" alt=""></td>
    <td width="65%">
      <div>片名：<?=$row['name']?>      片長:<?=$row['length']?>分     上映時間:<?=$row['date']?> </div>
      <div>
        <button  type="button"onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯電影</button>
        <button type="button" onclick="del('movie',<?=$row['id']?>)">刪除電影</button>
        排序<input type="text" name="rank[]" value="<?=$row['rank']?>">顯示<input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>>
        <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </div>
      <div>劇情介紹:<?=$row['intro']?></div>
      <hr>
    </td>
  </tr>
<?php
}
?>
</table>
<input type="submit" value="修改">
</form>
