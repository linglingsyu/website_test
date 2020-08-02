
<form action="api/edit_news.php" method="post">
<table>
<tr>
  <td>編號</td>
  <td>標題</td>
  <td>顯示</td>
  <td>刪除</td>
</tr>
<?php
$div = 3 ;
$nowpage = !empty($_GET['p']) ? $_GET['p'] : 1 ;
$totalpage = ceil(($News->count())/$div);
$start = ($nowpage-1)*$div;
$rows = $News->all([]," limit $start,$div");
foreach($rows as $key => $row){
$chk = ($row['sh']) ? "checked" : "";
?>
<tr>
  <td><?= $key+1 ?></td>
  <td><?= $row['title'] ?></td>
  <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $chk ?>></td>
  <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
  <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
</tr>

<?php
}
?>

</table>
<div>
<?php

if($nowpage > 1){
  echo '<a href="?do=news&p='.($nowpage-1).'"> < </a>'; 
}

for($i = 1 ; $i <= $totalpage; $i++){
  $size = ($i == $nowpage) ? "24px" : "16px";
  echo '<a style="font-size:'.$size.'" href="?do=news&p='.$i.'">'.$i.'</a>'; 
}

if($nowpage < $totalpage){
  echo '<a href="?do=news&p='.($nowpage+1).'"> > </a>'; 
}
?>
</div>
<input type="submit" value="確定修改">

</form>


