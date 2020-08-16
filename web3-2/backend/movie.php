<button onclick="location.href='?do=add_movie'">新增電影</button><hr>
<form action="api/edit_rank.php" method="post">
<table>
<?php
$rows = $Movie->all();
foreach($rows as $row){
  $chk = $row['sh'] ? "checked" : "";
?>

<tr>
    <td width="20%"><img src="img/<?=$row['img']?>" style="width:50%;">   </td>
    <td width="10%">分級: <img src="icon/<?=$row['class']?>.png" style="">    </td>
    <td width="60%">
    <div>片名：<?=$row['name']?>  片長：<?=$row['length']?>分  上映時間：<?=$row['date']?></div>
    <div style="text-align:right">
    
    顯示<input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>>
    刪除<input type="checkbox" name="del[]" value="<?=$row['id']?>">
    排序：<input type="text" name="rank[]" value="<?=$row['rank']?>"> <input type="hidden" name="id[]" value="<?=$row['id']?>"> 
    <button type="button" onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯電影</button></div>
    <div>劇情介紹：<?=$row['intro']?></div>
    <hr>
    </td>

</tr>

<?php
}
?>

</table>
<input type="submit" value="修改">
</form>