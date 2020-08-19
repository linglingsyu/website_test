<?php
$ord = $Ord->find(['no'=>$_GET['no']]);
?>
<div>感謝您的訂購：您的訂單編號是：<?=$ord['no']?></div>
<div>電影名稱：<?=$ord['name']?></div>
<div>日期：<?=$ord['date']?></div>
<div>場次時間：<?=$ord['session']?></div>
<div>
  座位：<br>
  <?php
    $seat = unserialize($ord['seat']);
    foreach($seat as $s){
      $r = floor($s / 5) + 1;
      $c = ($s % 5) + 1;
       echo  $r . '排' . $c . '號<br>';
    }
  ?>
</div>
<button onclick="location.href='index.php'">確認</button>