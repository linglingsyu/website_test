<style>

  .item{
    display: inline-block;
  }



</style>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:100%;display:flex;flex-direction:column;justify-content:center;align-items:center;">
    <div  style="text-align:center;display:flex;overflow:hidden;width:280px;">
    <?php
    $rows = $Poster->all(['sh'=>1]," order by `ord`");
    foreach($rows as $row){
    ?>
    <div class="po" data-ani="<?=$row['effect']?>">
        <img  src="img/<?=$row['img']?>" style="width:280px">
        </div>
      <?php
          }
      ?>
    </div>

    <div>
      <div class="item" onclick="pp(1)"><img src="icon/01E02.jpg" alt=""></div>
      <div class="item">
      <div style="display:flex; text-align:center; justify-content:space-between;width:280px;">
        <?php
    $rows = $Poster->all(['sh'=>1]," order by `ord` ");
    foreach($rows as $key=> $row){
    ?>
        <div class="item "><img id="ssaa<?= $key?>" class="im" src="img/<?=$row['img']?>" style="width:60px;margin:5px 5px"></div>
       
      <?php
          }
      ?>
      </div>
      </div>
      <div class="item" onclick="pp(2)"><img src="icon/01E01.jpg" alt=""></div>
    </div>


  </div>
</div>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:98%;">
    <div style=" display:flex; flex-wrap:wrap;">
      <?php
      $div = 4;
      $nowpage = empty($_GET['p']) ? "1" : $_GET['p'];
      $today = date("Y-m-d");
      $ondate  = date("Y-m-d",strtotime("-2days"));
      $totalpage = ceil($Movie->count([]," where `date` <= '$today' && `date` >= '$ondate'")/$div);
      $start = ($nowpage-1)*$div;
      //上映中的電影
      $rows = $Movie->all(['sh' => 1], " && `date` <= '$today' && `date` >= '$ondate' order by `ord` limit $start,$div");
      foreach ($rows as $row) {
      ?>
        <div style="width:50%;display:flex;font-size:12px;">
          <div><a href="?do=order&id=<?=$row['id']?>"><img src="img/<?= $row['img'] ?>" style="width:50px"></a></div>
          <div style="display:inline-block;">
            <div><?= $row['name'] ?></div>
            <div>分級: <img src="icon/<?= $row['class'] ?>.png"> <?= $arr[$row['class']] ?></div>
            <div>上映日期:<?= $row['date'] ?></div>
            <div><button style="font-size:12px;" onclick="location.href='?do=intro&id=<?=$row['id']?>'">劇情簡介</button><button style="font-size:12px;" onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button></div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="ct"> 

    <?php

    for($i=1;$i <= $totalpage;$i++){
      echo '<a href="?p='.$i.'">'.$i.'</a>';
    }
    ?>

    </div>
  </div>
</div>
</div>

<script>
  var nowpage = 0,
    num = <?= $Poster->count(['sh'=>1])?>;

  function pp(x) {
    var s, t;
    if (x == 1 && nowpage - 1 >= 0) {
      nowpage--;
    }
    if (x == 2 && (nowpage + 1)  <= num - 4) {
      nowpage++;
    }
    $(".im").hide()
    for (s = 0; s <= 3; s++) {
      t = s * 1 + nowpage * 1;
      $("#ssaa" + t).show()
    }
  }
  pp(1);

function ani(){
  let ani = $(".po:visible").data("ani");
  switch(ani){
    //淡入淡出
    case "1":
      $(".po:visible").fadeOut(1000,function(){
        $(".po:visible").next().fadeIn(1000);
      });
      break;
    //縮放
    case "2":
    break;
    //滑出
    case "3":
    
      break;
  }
  console.log(ani);

}
</script>