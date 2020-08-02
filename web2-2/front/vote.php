<?php
$row = $Que->find($_GET['id']);
?>

<form action="api/vote.php" method="post">
<fieldset>
  <legend>首頁　> 問券調查 > <?= $row['text'] ?></legend>
  <h3><?= $row['text'] ?></h3>
  <?php
  $rows = $Que->all(['parent'=>$_GET['id']]);
  foreach($rows as $key => $row){
  ?>
  <input type="radio" name="opt" value="<?= $row['id'] ?>"><?= $row['text']?><br>
  <?php
}
  ?>
  <input type="submit" value="我要投票">
</fieldset>
</form>
