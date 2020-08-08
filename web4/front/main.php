<?php
$all = $Goods->all(['sh'=>1]);
foreach($all as $al){
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
<div class="ct">購買數量<input type="number" value="1" name="qt" id="qt"><img src="icon/0402.jpg" alt=""></div>

<?php
}
?>