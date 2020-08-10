<?php
$type = empty($_GET['type']) ? "0" : $_GET['type'];
if($type == "0"){
    $goods = $Goods->all(['sh'=>1]);
    $nav = "全部商品";
}else{
    $ty = $Type->find($type);
    if($ty['parent'] == "0"){
        $goods = $Goods->all(['sh'=>1,'big'=>$type]);
        $nav = $ty['name'];
    }else{
        $goods = $Goods->all(['sh'=>1,'sec'=>$type]);
        $bi = $Type->find($ty['parent']);
        $nav = $bi['name'] . " > " . $ty['name'];
    }
}

?>

<h2><?=$nav?></h2>
<?php 
foreach($goods as $g){
?>
<a href="?do=detail&id=<?=$g['id']?>"><img src="img/<?=$g['img']?>" alt=""></a>
<h4><?=$g['name']?></h4>
<div>價錢：<?=$g['price']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
<div>規格：<?=$g['spec']?></div>
<div>簡介：<?=mb_substr($g['intro'],0,20)?>...</div>

<?php
}

?>