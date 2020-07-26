
<form action="api/edit_news.php" method="post">
<table>
<tr>
  <td>編號</td>
  <td>標題</td>
  <td>顯示</td>
  <td>刪除</td>
</tr>
<?php
$div = 3;
$total = ceil(($News->count())/$div);
$nowpage = empty($_GET['page']) ? 1 : $_GET['page'];
$start = ($nowpage-1) * $div;
$rows = $News->all([]," limit $start,$div");
$count = 0;
foreach($rows as $row){
$chk = ($row['sh'])? "checked" : "";
$count++;
?>
<tr>
  <td><?= $count ?></td>
  <td><?= $row['title'] ?></td>
  <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?=$chk?> ></td>
  <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
  <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
</tr>
<?php
}
?>

</table>

<div class="ct">

<?php
if($nowpage > 1 ){
  echo '<a href="?do=news&page='.($nowpage-1).'"> < </a>';
}
for($i=1;$i<= $total ; $i++){
  $size = ($i == $nowpage) ? "24px" : "16px";
  echo '<a style="font-size:'.$size.'" href="?do=news&page='.$i.'">'.$i.'</a>';
}

if($nowpage < $total){
  echo '<a href="?do=news&page='.($nowpage+1).'"> > </a>';
}

?>

</div>


<div class="ct"><input type="submit" value="確定修改"></div>


</form>