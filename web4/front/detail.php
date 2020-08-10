<?php
$al = $Goods->find($_GET['id']);

?>

<h2 class="ct"><?=$al['name']?></h2>
<img src="img/<?=$al['img']?>"  alt="">
<div>
    <?php
    $big = $Type->find($al['big']); // good商品中big的數值=  type中的分類id
    $sec = $Type->find($al['sec']);
    ?>
    分類：<?= $big['name'] ?> > <?= $sec['name'] ?><br>
    編號：<?=$al['no']?><br>
    價格：<?=$al['price']?><br>
    詳細說明：<?=$al['intro']?><br>
    庫存量：<?=$al['stock']?><br>
</div>
<div class="ct">購買數量<input type="number" min="1" value="1" name="qt" id="qt"><a href="javascript:buy()"><img src="icon/0402.jpg" alt=""></a></div>
<input type="hidden" name="id" id="id" value="<?=$al['id']?>">
<button onclick="location.href='?do=main'">返回</button>

<script>

function buy(){
  let qt = $("#qt").val();
  let id = $("#id").val();
  location.href=`?do=cart&id=${id}&qt=${qt}`;
}


</script>
