<?php 
  $title = $Que->find($_GET['id']);
  $rows = $Que->all(['parent'=>$_GET['id']]);
?>
<fieldset>
  <legend>目前位置：首頁 > 問券調查 > <?= $title['text'] ?> </legend>
  <table>
<h2><?= $title['text'] ?></h2>
<?php
  $c =  $Que->q("select sum(`count`) from `que` where `parent`='".$_GET['id']."'");
  foreach($rows as $key => $row){
?>

<tr>
  <td><?= $key+1 ?></td>
  <td width="30%"><?= $row['text'] ?></td>
  <td width="60%"><div style="width:<?= round((($row['count']) / ($c[0][0]))*100,2) ?>%;background:#ccc;height:10px;display:inline-block"></div>(<?= $row['count'] ?>票)(<?= round((($row['count']) / ($c[0][0]))*100,2) ?>%)</td>

 <?php  
  }
 ?>
  </table>
<a href="?do=que">返回</a>
</fieldset>

