<?php
$row = $Que->find($_GET['id'])
?>


<fieldset>
  <legend>目前位置：首頁 > 問卷調查 > <?=$row['text']?></legend>
  <h2><?=$row['text']?></h2>
  <?php
    $rows = $Que->all(['parent'=>$_GET['id']]);
    $totalw = $Que->q("select sum(`count`) from `que` where `parent`='".$row['id']."'")[0][0];
    
    foreach($rows as $key=> $row){
      $width = round((($row['count']/$totalw)*100),2);
  ?>
  <div>
    <div style="display:inline-block;width:30%"><?=($key+1). "." . $row['text']?></div>
    <div style="display:inline-block;width:50%;height:10px;background:#ccc;">
      <div style="display:inline-block;width:<?=$width?>%;height:10px;background:blue;"></div>
    </div><span><?=$row['count']?>票(<?=$width?>%)</span>
  </div>
  <?php
    }
  ?>
<button onclick="location.href='?do=que'">返回</button>
</fieldset>


