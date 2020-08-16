<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>

    <style>
      .item{
        width:49%;
        margin:0 auto;
        display: inline-block;
        height:190px;
        /* background: white; */
        border:1px solid #fff;
        margin:3px 0 ;
      }

      .it{
        display: inline-block;
        width:48%;
      }

      .it img{
        width: 100%;
      }

    </style>

    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
      <?php
      $div = 4;
      $nowpage = empty($_GET['p']) ? 1 : $_GET['p'] ;
      $start = ($nowpage-1)*$div;
      $ondate = date("Y-m-d",strtotime("-2 days"));
      $today = date("Y-m-d");
      $totalpage = ceil($Movie->count(['sh'=>1], " &&  date >= '$ondate' &&  date <= '$today'") /$div);
      $rows = $Movie->all(['sh'=>1], " &&  date >= '$ondate' &&  date <= '$today' order by `rank` limit $start,$div");
      foreach($rows as $row){
      ?>
        <div class="item">
          <div>片名:<?=$row['name']?></div>
          <div class="it"><img src="img/<?=$row['img']?>" style=""></div>
          <div class="it">分級：<?=$arr[$row['class']]?><br>上映日期:<?=$row['date']?></div>
          <div><button onclick="location.href='?do=intro&id=<?=$row['id']?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button></div>
        </div>

        <?php
}
        ?>
        <div class="ct"> 
          <?php
          for($i = 1; $i <= $totalpage ; $i++){
            echo ' <a href="?do=main&p='.$i.'">'.$i.'</a>';
          }
          ?>
        </div>
      </div>
    </div>
