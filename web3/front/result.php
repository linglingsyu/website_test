<?php
$movie = $Movie->find($_GET['id']);
?>
感謝您的訂購，您的訂單編號是：
<p>電影名稱:<?= $movie['name'] ?></p>
<p>日期：<?= $_GET['date'] ?></p>
<p>場次時間：<?= $_GET['session'] ?></p>
<p>共?張電影票</p>
<button>確認</button>