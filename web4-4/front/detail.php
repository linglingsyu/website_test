<?php
$goods = $Goods->find($_GET['id']);
$big = $Type->find($goods['big']);
$mid = $Type->find($goods['mid']);
?>
<h2><?=$goods['name']?></h2>
<img src="img/<?=$goods['img']?>" alt="">
<div>分類：<?=$big['name'] . " > " . $mid['name'] ?></div>
<div>編號：<?=$goods['no']?></div>
<div>價格：<?=$goods['price']?></div>
<div>簡介：<?=$goods['intro']?></div>
<div>庫存量：<?=$goods['stock']?></div>
<div>購買數量：<input type="number" name="qt" id="qt" min="1" value="1"><a href="javascript:buy()"><img src="icon/0402.jpg" alt=""></a></div>
<button onclick="location.href='index.php'">返回</button>

<script>
    function buy(){
      let qt = $("#qt").val();
      let id = <?=$goods['id']?>;
      location.href=`?do=cart&id=${id}&qt=${qt}`;
    }
</script>