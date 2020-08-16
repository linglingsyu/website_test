<?php

if(empty($_GET['type'])){
  $nav = "全部商品";
}else{
  $row = $Type->find($_GET['type']);
  if($row['parent'] == "0"){
    $nav = $row['name'];
  }else{
    $tt = $Type->find($row['parent']);
    $nav = $tt['name'] . " > "  . $row['name'];
  }
}

?>

<h2><?=$nav?></h2>

<?php

if(empty($_GET['type'])){
  $nav = "全部商品";
  $goods = $Goods->all(['sh'=>1]);
  foreach($goods as $g){
?>
<a href="?do=detail&id=<?=$g['id']?>"><img src="img/<?=$g['img']?>" alt="">
</a>
<div><?=$g['name']?></div>
<div>價格：<?=$g['price']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
<div>規格：<?=$g['spec']?></div>
<div><?=mb_substr($g['intro'],0,20)?>...</div>
<?php
  }
}else{
  $row = $Type->find($_GET['type']);
  if($row['parent'] == "0"){
    $goods = $Goods->all(['sh'=>1,'big'=>$row['id']]);
    foreach($goods as $g){
?>
  <a href="?do=detail&id=<?=$g['id']?>"><img src="img/<?=$g['img']?>" alt="">
</a>
  <div><?=$g['name']?></div>
  <div>價格：<?=$g['price']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
  <div>規格：<?=$g['spec']?></div>
  <div><?=mb_substr($g['intro'],0,20)?>...</div>
<?php
    }
  }else{
   $goods = $Goods->all(['sh'=>1,'mid'=>$row['id']]);
   foreach($goods as $g){
 ?>
    <a href="?do=detail&id=<?=$g['id']?>"> <img src="img/<?=$g['img']?>" alt=""></a>

    <div><?=$g['name']?></div>
    <div>價格：<?=$g['price']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
    <div>規格：<?=$g['spec']?></div>
    <div><?=mb_substr($g['intro'],0,20)?>...</div>
 <?php    
   }
  }
}

?>