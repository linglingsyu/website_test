<?php
$que = $Que->find($_GET['id']);
?>
<form action="api/vote.php" method="post">
<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?= $que['text'] ?></legend>
  <h3><?= $que['text'] ?></h3>
<?php
$rows = $Que->all(['parent'=>$_GET['id']]);
foreach($rows as $k => $row){
  $total = $Que->q("select sum(`count`) from `que` where parent='".$_GET['id']."' ")[0][0] ;
  if(empty($total)){
    $total = 1;
  }
  $per = round(($row['count']/$total)*100,2);
?>
<div style="display:inline-block;width:30%"><?= $k+1 ?>.<?= $row['text'] ?></div>
<div style="display:inline-block;width:50%;height:15px;"><div style="display:inline-block;width:<?=$per ?>%;height:15px;background:#ccc;"></div>
</div><?= $row['count'] ?>票(<?= $per ?>%)
<?php
}
?>
</fieldset>
</form>
<button type="button" onclick="location.href='index.php?do=que'">返回</button>