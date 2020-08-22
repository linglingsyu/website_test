<?php
$row = $Ord->find(['no'=>$_GET['no']]);
$seat = unserialize($row['seat']);
?>

<div>感謝您的訂購，您的單號是：<?=$row['no']?></div>
<div>電影名稱:<?=$row['movie']?></div>
<div>日期：<?=$row['date']?></div>
<div>場次：<?=$row['session']?></div>
<div>座位：
<?php
foreach($seat as $s){
  echo $s."號,";
}
?>
</div>
<button onclick="location.href='index.php'">確認</button>