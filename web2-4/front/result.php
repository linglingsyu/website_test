<style>
  .out{
    width:40%;
    height:10px;
    background-color: #999;
  }
  .text{
    width:40%;
  }

</style>
<?php
$row = $Que->find($_GET['id']);
?>
<form action="api/vote.php" method="post">
<fieldset>
<legend>目前位置：首頁 > 問卷調查 > <?=$row['text']?></legend>
<h2><?=$row['text']?></h2>
<?php
$rows = $Que->all(['parent'=>$_GET['id']]);
foreach($rows as $key=> $row){
  $count = $Que->q("select sum(count) from `que` where `parent`='".$_GET['id']."'");
  if($count[0][0] == 0){
    $count[0][0] = 1;
  }
  $width = round(($row['count']/$count[0][0])*100,2);
?>

<div style="display:flex;flex-wrap:wrap;">
 <div class="text"><?=($key+1) ." . " .$row['text']?></div>

<div class="out">
  <div class="in" style="width:<?=$width?>%;background:#ccc;height:10px;"></div><?=$row['count']?>票(<?=$width?>%)
</div>
</div>

<?php
}
?>
</fieldset>
</form>