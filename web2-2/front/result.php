<?php
$row = $Que->find($_GET['id']);
?>


<fieldset>
  <legend>首頁　> 問券調查 > <?= $row['text'] ?></legend>
  <h3><?= $row['text'] ?></h3>
  <?php
  $rows = $Que->all(['parent'=>$_GET['id']]);
  foreach($rows as $key => $row){
    $total = $Que->q("select sum(`count`) from `que` where `parent` = '".$_GET['id']."'")[0][0];
    $num = round(($row['count']/$total)*100,2);
  ?>
<div style="width:30%;display:inline-block;">  <?=$key+1?>.<?= $row['text']?></div><div style="width:<?= $num ?>%;height:10px;background:#000;display:inline-block;"> </div><?= $row['count'] ?>票( <?= $num ?>  %)<br>
  <?php
}
  ?>
</fieldset>

