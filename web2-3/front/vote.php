<?php
$que = $Que->find($_GET['id']);
?>
<form action="api/vote.php" method="post">
<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?= $que['text'] ?></legend>
  <h3><?= $que['text'] ?></h3>
<?php
$rows = $Que->all(['parent'=>$_GET['id']]);
foreach($rows as $row){
?>
<input type="radio" name="opt" value="<?= $row['id']?>"><?= $row['text'] ?><br>
<?php
}
?>
<input type="submit" value="我要投票">
</fieldset>
</form>