<?php
$row = $Goods->find($_GET['id']);
$big = $Type->find($row['big']);
$mid = $Type->find($row['mid']);
?>
<h2><?=$row['name']?></h2>
<div><img src="img/<?=$row['img']?>" alt=""></div>
<div><?= $big['name'] ?> > <?=$mid['name']?></div>
<div>編號：<?=$row['no']?></div>
<div>價格：<?=$row['price']?></div>
<div>詳細說明：<?=$row['intro']?></div>
<div>庫存量：<?=$row['stock']?></div>
購買數量：<input type="number" name="qt" min="1" value="1" id="qt"><a href="javascript:buy()"><img src="icon/0402.jpg" alt=""></a><br>

<button onclick="history.go(-1)">返回</button>
<script>
  function buy(){
    let id = <?=$row['id']?>;
    let qt = $("#qt").val();
    location.href=`?do=cart&id=${id}&qt=${qt}`;
  }
</script>