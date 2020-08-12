<?php
if(!empty($_GET['type'])){
  $row = $Type->find($_GET['type']);
  if($row['parent'] == "0"){
    $nav = $row['name'];
  }else{
    $ro= $Type->find($row['parent']);
    $nav = $ro['name'] . ">" . $row['name'];
  }
}else{
  $nav = "全部商品";
}
?>

<h2><?=$nav?></h2>

<?php
if(!empty($_GET['type'])){

  if($row['parent'] == 0){
    //大分類
     $goods = $Goods->all(['sh'=>1,'big'=>$_GET['type']]);
     foreach($goods as $g){
      echo '<a href="?do=detail&id='.$g['id'].'"><img src="img/'.$g['img'].'" alt=""></a>';
      echo '<div>'.$g['name'].'</div>';
      echo '<div>價錢：'.$g['price'].'<a href="?do=buycart&id='.$g['id'].'&qt=1"><img src="icon/0402.jpg" alt=""></a>'.'</div>';
      echo '<div>規格：'.$g['spec'].'</div>';
      echo '<div>簡介：'.mb_substr($g['intro'],0,20).'...</div>';
     }
  }else{
    $goods = $Goods->all(['sh'=>1,'mid'=>$_GET['type']]);
    foreach($goods as $g){
      echo '<a href="?do=detail&id='.$g['id'].'"><img src="img/'.$g['img'].'" alt=""></a>';
      echo '<div>'.$g['name'].'</div>';
      echo '<div>價錢：'.$g['price'].'<a href="?do=buycart&id='.$g['id'].'&qt=1"><img src="icon/0402.jpg" alt=""></a>'.'</div>';
      echo '<div>規格：'.$g['spec'].'</div>';
      echo '<div>簡介：'.mb_substr($g['intro'],0,20).'...</div>';
     }
  }

}else{
  $goods = $Goods->all(['sh'=>1]);
  foreach($goods as $g){
    echo '<a href="?do=detail&id='.$g['id'].'"><img src="img/'.$g['img'].'" alt=""></a>';
   echo '<div>'.$g['name'].'</div>';
   echo '<div>價錢：'.$g['price'].'<a href="?do=buycart&id='.$g['id'].'&qt=1"><img src="icon/0402.jpg" alt=""></a>'.'</div>';
   echo '<div>規格：'.$g['spec'].'</div>';
   echo '<div>簡介：'.mb_substr($g['intro'],0,20).'...</div>';
  }
}

?>

