
<style>

  .lists{
    position: relative;
    width:400px;
    height:300px;
  }

.list{
  text-align: center;
  width:250px;
  position: absolute;
  left:25%;
  height:250px;
  display: none;
}

.list img{
  width:100%;
}

.controls{
 width: 400px;
 height:100px;
 margin-left:8%;
}


.wrap{
  display: flex;
  width: 320px;
  overflow: hidden;
  text-align: center;
}


.btn{
  width:80px;
  flex-shrink: 0;
}

.btn img{
  width:100%;
}

.control,.left,.right{
  display: inline-block;
}

</style>

<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
      <div class="lists">
         <?php
          $rows = $Poster->all(['sh'=>1]," order by rank ");
          foreach($rows as $key => $row){
            echo '<div id="ssbb'.$key.'" class="list" data-id="'.$row['ani'].'">';
            echo '<img src="img/'.$row['img'].'" alt="">';
           echo '<div>'.$row['name'].'</div>';
           echo '</div>';
          }
          ?>
      </div>
      <div class="controls">
            <div onclick="pp(1)" class="left"><img src="icon/left.jpg" alt=""></div>
            <div class="control">
              <div class="wrap">
                 <?php
                  $rows = $Poster->all(['sh'=>1]," order by rank ");
                  foreach($rows as $key => $row){
                    echo '<div class="btn im" id="ssaa'.$key.'">';
                    echo '<img src="img/'.$row['img'].'" id="">';
                   echo '<div>'.$row['name'].'</div>';
                   echo '</div>';
                  }
                  ?>
                </div>
          </div>
          <div onclick="pp(2)" class="right"><img src="icon/right.jpg" alt=""></div>
      </div>
    </div>
</div>

<style>
  .item{
   width:210px;
   height:200px;
   display: inline-block;
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
  $nowpage = empty($_GET['p']) ? 1 : $_GET['p'];
  $totalpage = ceil($Movie->count(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today' ")/$div);
  $start = ($nowpage-1)*$div;
  $rows = $Movie->all(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today'  order by `rank` desc limit $start,$div");
  foreach($rows as $row){ 
  ?>
    <div class="item">
        <div class="it"><img src="img/<?=$row['img']?>" style="width:30%"> </div>
        <div class="it">
          <div><?=$row['name']?></div>
          <div>分級:<?=$arr[$row['class']]?></div>
          <div>上映日期：<?=$row['date']?></div>
          <div class=""><button onclick="location.href='?do=intro&id=<?=$row['id']?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button></div>
        </div>
    </div>
  <?php
}
  ?>

      
    <div class="ct">           
    <?php
      for($i=1; $i <= $totalpage ; $i++){
        echo '<a href="?do=main&p='.$i.'">'.$i.'</a>';
      }
    ?>
    </div>
  </div>
</div>


<script>

  $(".list").eq(0).show();
  $(".control").hover(function(){
    clearInterval(auto);
  },function(){
    ani();
    auto = setInterval(ani,3000);
  });

  $(".btn").on("click",function(){
      let id = $(this).attr("id").replace("ssaa","");
      $(".list").hide();
      $("#ssbb"+id).show();
  });

  let auto = setInterval(ani,3000);
  ani();
  function ani(){
    let dom = $(".list:visible");
    let ani = dom.data("id");
    let next;
    if(dom.next().length == "0"){
      next = $(".list").eq(0);
    }else{
      next = dom.next();
    }
    switch (ani){
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