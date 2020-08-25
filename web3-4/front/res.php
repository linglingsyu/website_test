<?php

$row = $Ord->find(['no'=>$_GET['no']]);
$seat = unserialize($row['seat']);
?>
<div>感謝您的訂購，您的訂單編號是：<?= $row['no'] ?></div>
<div>電影名稱:<?= $row['movie'] ?></div>
<div>日期：<?= $row['date'] ?></div>
<div>場次時間：<?= $row['session'] ?></div>
<div>座位：<br>

<?php
foreach($seat as $s){
  $r = floor($s/5)+1;
  $c = ($s%5);
  echo $r."排". $c . "號<br>";
}

?>
共<?=$row['qt']?>張電影票


</div>

<button onclick="location.href='index.php'">確認</button>