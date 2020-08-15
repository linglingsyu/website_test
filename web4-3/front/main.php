<?php


if(empty($_GET['type'])){
  $nav = "全部商品";
}else{
  $row = $Type->find($_GET['type']);
    if( $row['parent']  == 0){
      //主分類
      $nav = $row['name'];
    }else{
      $sub = $Type->find($row['parent']);
      $nav =  $sub['name'] .  " > " .$row['name'];
    }
}

?>

<h2><?=$nav?></h2>

<?php


if(empty($_GET['type'])){
  $nav = "全部商品";
  $rows = $Goods->all();
  foreach($rows as $row){
?>
  <a href="?do=detail&id=<?=$row['id']?>"><img src="img/<?=$row['img']?>" alt=""></a>
  <div><?=$row['name']?><a href="?do=cart&id=<?=$row['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
  <div>價錢：<?=$row['price']?></div>
  <div>規格：<?=$row['spec']?></div>
  <div>簡介:<?=mb_substr($row['intro'],0,20)?>...</div>
  <hr>
<?php
  }
}else{
  $row = $Type->find($_GET['type']);
    if( $row['parent']  == 0){
      //主分類
      $nav = $row['name'];
      $goods = $Goods->all(['big'=>$row['id']]);
      foreach($goods as $g){
?>
      <a href="?do=detail&id=<?=$g['id']?>"><img src="img/<?=$g['img']?>" alt=""></a>
      <div><?=$g['name']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
      <div>價錢：<?=$g['price']?></div>
      <div>規格：<?=$g['spec']?></div>
      <div>簡介:<?=mb_substr($g['intro'],0,20)?>...</div>
  <hr>
<?php
      }
    }else{
      $sub = $Type->find($row['parent']);
      $nav =  $sub['name'] .  " > " .$row['name'];
      $goods = $Goods->all(['mid'=>$row['id']]);
      foreach($goods as $g){
    ?>
   <a href="?do=detail&id=<?=$g['id']?>"><img src="img/<?=$g['img']?>" alt=""></a>
      <div><?=$g['name']?><a href="?do=cart&id=<?=$g['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
      <div>價錢：<?=$g['price']?></div>
      <div>規格：<?=$g['spec']?></div>
      <div>簡介:<?=mb_substr($g['intro'],0,20)?>...</div>
    <?php
      }
    }
}

?>


