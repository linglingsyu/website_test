
<style>
    .lists{
      height:310px;
    }
  .list{
    position: absolute;
    width: 225px;
    height: 225px;
    left:28%;
    text-align: center;
    display: none;
  }

  .list img{
    width: 100%;
  }

.wrap{
  width:320px;
  overflow: hidden;
  display: flex;
}
  .im{
      width:80px;
      height:112px;
      flex-shrink: 0;
  }

  .im img{
    width:100%;
  }

  .left,.control,.right{
    display: inline-block;
  }

  .controls{
    margin-left: 7%;
  }



</style>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
      <div class="lists">
      <?php
      $rows = $Poster->all(['sh'=>1]," order by `rank`");
      foreach($rows as $key => $row){
       ?>
        <div class="list" data-ani="<?=$row['ani']?>" id="ssbb<?=$key?>"><img src="img/<?=$row['img']?>" alt="">
          <div><?=$row['name']?></div>  
      </div>
      <?php
       }
      ?>
      </div>
      <div class="controls"> 
        
      <div class="left" onclick="pp(1)"><img src="icon/left.jpg" alt=""></div>
      <div class="control">
        <div class="wrap">
        <?php
        $rows = $Poster->all(['sh'=>1]," order by `rank`");
        foreach($rows as $key => $row){
         ?>
          <div class="im" id="ssaa<?=$key?>"><img src="img/<?=$row['img']?>" alt="">
            <div><?=$row['name']?></div>  
        </div>
        <?php
         }
        ?>
          </div>
      </div>
       <div class="right" onclick="pp(2)" ><img src="icon/right.jpg" alt=""></div>
      </div>
    </div>
</div>

<style>
  .item{
    display: inline-block;
    width:200px;
    height:200px;
  }
  .it{
    display: inline-block;
    }

</style>

<div class="half">
  <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <?php
        $ondate = date("Y-m-d",strtotime("-2 days"));
        $today = date("Y-m-d");
        $div = 4;
        $nowpage = empty($_GET['p'])? 1 : $_GET['p'];
        $totalpage= ceil($Movie->count(['sh'=>1]," && `date`>= '$ondate' && `date` <= '$today' ")/$div);
        $start = ($nowpage-1)*$div;
        $rows = $Movie->all(['sh'=>1]," && `date`>= '$ondate' && `date` <= '$today' order by `rank` limit $start,$div");
         foreach($rows as $row){
        ?>
          <div class="item">
              <div class="it"><img src="img/<?=$row['img']?>" style="width:30%"></div>
              <div class="it">
                <div><?=$row['name']?></div>
                <div>分級: <img src="icon/<?=$row['class']?>.png" alt=""><?=$arr[$row['class']]?></div>
                <div>上映日期:<?=$row['date']?></div>
                <div><button onclick="location.href='?do=intro&id=<?=$row['id']?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button></div>
              </div>
          </div>
        <?php
        }
        ?>


    </div>
  </div>
</div>





<script>

$(".list").eq(0).show();
ani();
let auto = setInterval(ani,3000);

$(".im").on("click",function(){
  let id = $(this).attr("id").replace("ssaa","");
  // console.log(id);
  $(".list").hide();
  $("#ssbb"+id).show();
});

$(".control").hover(function(){
    clearInterval(auto);
},function(){
  ani();
  auto = setInterval(ani,3000);
});

function ani(){
  let dom = $(".list:visible");
  let next;
  if($(".list:visible").next().length == "0"){
    next = $(".list").eq(0);
  }else{
    next = dom.next();
  }
  let ani = dom.data("ani");
  // console.log(dom.next,ani);
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
							num = <?= $Poster->count(['sh'=>1]); ?>;
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

