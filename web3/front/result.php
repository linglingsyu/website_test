<?php
$ord= $Ord->find($_GET['id']);
?>
感謝您的訂購，您的訂單編號是：<?= $ord['no'] ?>
<p>電影名稱:<?= $ord['name'] ?></p>
<p>日期：<?= $ord['date'] ?></p>
<p>場次時間：<?= $session[$ord['session']] ?></p>
<p>座位：<br>
<?php 
$seat = unserialize($ord['seat']);
for($i=0;$i<count($seat);$i++){
  $a = floor(($seat[$i]-1)/5)+1;
  $b = (($seat[$i]-1)%5)+1;
  echo $a."排".$b."號"."<br>";
}
?>
</p>
<p>共<?= $ord['qt'] ?>張電影票</p>
<button onclick="location.href='index.php'">確認</button>