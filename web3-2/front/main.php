<style>
  .list {
    width: 55%;
    height: 280px;
    position: relative;
  }

  .po {
    position: absolute;
    width: 100%;
    left: 45%;
    text-align: center;
    display: none;
  }

  .po img {
    width: 100%;
  }

  .control {
    width: 100%;
    height: 130px;
    font-size: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .pic {
    width: 320px;
    overflow: hidden;
    display: flex;
  }

  .pic img {
    flex-shrink: 1;
    width: 80px;
  }

  .left,
  .right {
    height: 100%;
    position: relative;
    top: 40%;
  }
</style>


<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div id="abgne-block-20111227">
      <div class="list">
        <?php
        $pos = $Poster->all(['sh' => 1]);
        foreach ($pos as $po) {
        ?>
          <div class="po" data-ani=<?=$po['effect']?>>
            <img src="img/<?= $po['img'] ?>" alt="">
            <div><?= $po['name'] ?></div>
          </div>

        <?php
        }
        ?>
      </div>
      <div class="control">
        <div class="left" onclick="pp(1)"><img src="icon/left.jpg" alt=""></div>
        <div class="pic">
          <?php
          $pos = $Poster->all(['sh' => 1]);
          foreach ($pos as $key => $po) {
          ?>
            <div class="im" id="ssaa<?=$key?>">
              <img src="img/<?= $po['img'] ?>">
              <div><?= $po['name'] ?></div>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="right" onclick="pp(2)"><img src="icon/right.jpg" alt=""></div>
      </div>
    </div>
  </div>
</div>

<script>

  let auto = setInterval(slider,3000);

  $(".po").eq(0).show();
  function slider(){
  let dom = $(".po:visible");
  let next;
  if( $(".po:visible").next().length !=0 ){
    next = $(".po:visible").next();
  }else{
    next =  $(".po").eq(0);
  }
  let ani = $(".po:visible").data("ani");
  console.log(dom,next,ani);
  switch(ani){
    case 1:
      dom.fadeOut(1000,function(){
        next.fadeIn(1000);
      })
    break;
    case 2:
      dom.hide(1000,function(){
        next.show(1000);
      })
    break;
    case 3:
      dom.slideUp(1000,function(){
        next.slideDown(1000);
      })
    break;
  }
}

  var nowpage = 0,
    num = <?= $Poster->count(['sh' => 1]);?>;

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
</script>


<style>
  .item {
    width: 49%;
    margin: 0 auto;
    display: inline-block;
    height: 190px;
    /* background: white; */
    border: 1px solid #fff;
    margin: 3px 0;
  }

  .it {
    display: inline-block;
    width: 48%;
  }

  .it img {
    width: 100%;
  }
</style>

<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab" style="width:95%;">
    <?php
    $div = 4;
    $nowpage = empty($_GET['p']) ? 1 : $_GET['p'];
    $start = ($nowpage - 1) * $div;
    $ondate = date("Y-m-d", strtotime("-2 days"));
    $today = date("Y-m-d");
    $totalpage = ceil($Movie->count(['sh' => 1], " &&  date >= '$ondate' &&  date <= '$today'") / $div);
    $rows = $Movie->all(['sh' => 1], " &&  date >= '$ondate' &&  date <= '$today' order by `rank` limit $start,$div");
    foreach ($rows as $row) {
    ?>
      <div class="item">
        <div>片名:<?= $row['name'] ?></div>
        <div class="it"><img src="img/<?= $row['img'] ?>" style=""></div>
        <div class="it">分級：<?= $arr[$row['class']] ?><br>上映日期:<?= $row['date'] ?></div>
        <div><button onclick="location.href='?do=intro&id=<?= $row['id'] ?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?= $row['id'] ?>'">線上訂票</button></div>
      </div>

    <?php
    }
    ?>
    <div class="ct">
      <?php
      for ($i = 1; $i <= $totalpage; $i++) {
        echo ' <a href="?do=main&p=' . $i . '">' . $i . '</a>';
      }
      ?>
    </div>
  </div>
</div>