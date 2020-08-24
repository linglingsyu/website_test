<?php

if(empty($_GET['type'])){
  $nav = "全部商品";
}else{
  // $row = $Goods->find($_GET['type']);
  $row = $Type->find($_GET['type']); 
  if($row['parent'] == "0"){
    $nav = $row['name'];
  }else{
    $m = $Type->find($row['parent']);
    $nav = $m['name'] . " > " . $row['name'];
  }
}


?>

<h2><?=$nav?></h2>


<?php

if(empty($_GET['type'])){
  $rows =  $Goods->all(['sh'=>1]);
  foreach($rows as $row){
?>
  <div><a href="?do=detail&id=<?=$row['id']?>"><img src="img/<?=$row['img']?>" alt=""></a></div>
  <div>
    <div><?=$row['name']?></div>
    <div>價錢:<?=$row['price']?> <a href="?do=cart&id=<?=$row['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
    <div>規格:<?=$row['spec']?></div>
    <div>簡介:<?=mb_substr($row['intro'],0,20)?>...</div>
  </div>
<?php
  }
}else{
  $row = $Type->find($_GET['type']); 
  if($row['parent'] == "0"){
    $rows =  $Goods->all(['sh'=>1,'big'=>$row['id']]);
    foreach($rows as $row){
?>
<div><a href="?do=detail&id=<?=$row['id']?>"><img src="img/<?=$row['img']?>" alt=""></a></div>
  <div>
    <div><?=$row['name']?></div>
    <div>價錢:<?=$row['price']?> <a href="?do=cart&id=<?=$row['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
    <div>規格:<?=$row['spec']?></div>
    <div>簡介:<?=mb_substr($row['intro'],0,20)?>...</div>
  </div>
<?php
    }
  }else{
    $m = $Type->find($row['parent']);
    $rows =  $Goods->all(['sh'=>1,'mid'=>$row['id']]);
    foreach($rows as $row){
?>
  <div><a href="?do=detail&id=<?=$row['id']?>"><img src="img/<?=$row['img']?>" alt=""></a></div>
  <div>
    <div><?=$row['name']?></div>
    <div>價錢:<?=$row['price']?> <a href="?do=cart&id=<?=$row['id']?>&qt=1"><img src="icon/0402.jpg" alt=""></a></div>
    <div>規格:<?=$row['spec']?></div>
    <div>簡介:<?=mb_substr($row['intro'],0,20)?>...</div>
  </div>


<?php
    }
  }
}


?>