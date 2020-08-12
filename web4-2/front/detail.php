
<?php
$row = $Goods->find($_GET['id']);
$big = $Type->find($row['big']);
$mid = $Type->find($row['mid']);
?>
<h1><?=$row['name']?></h1>
<img src="img/<?=$row['img']?>" alt="">
<div>
  <div>分類：<?=$big['name']?> > <?=$mid['name']?></div>
  <div>編號：<?=$row['no']?></div>
  <div>價格：<?=$row['price']?></div>
  <div>詳細說明：<?=$row['intro']?></div>
  <div>庫存量：<?=$row['stock']?></div>
</div>
<div>購買數量：<input type="number" name="qt" id="qt" min="1" value="1"><a href="javascript:buy()"><img src="icon/0402.jpg" alt=""></a></div>
<button onclick="history.go(-1)">返回</button>
<script>
  function buy(){
    let id = <?=$row['id']?>;
    let qt = $("#qt").val();
    location.href=`?do=buycart&id=${id}&qt=${qt}`;
  }
</script>