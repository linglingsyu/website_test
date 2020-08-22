<style>
  .lists{
    position: relative;
    height:300px;
  }
  .list{
    position: absolute;
    left:23%;
    text-align: center;
    display: none;
  }

  .items{
    width:328px;
    display: flex;
    overflow: hidden;
  }
  
  .controls{
    display: flex;

  }
  .control{
    width: 80px;
    padding:1px;
    flex-shrink: 0;

  }

  .control img{
    width:100%;
  }

  .left img,.right img{
    position: relative;
    top:30%;
  }

</style>
<div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
          <div class="lists">
            <?php
            $rows = $Poster->all(['sh'=>1]," order by `rank` desc");
            foreach($rows as $k => $row){
            ?>
              <div class="list"  id="ssbb<?=$k?>"  data-ani="<?=$row['ani']?>"><img src="img/<?=$row['img']?>" style="height:250px;"><div><?=$row['name']?></div></div>
            <?php
              }
            ?>
          </div>
          <div class="controls">
            <div onclick="pp(1)" class="left"><img src="icon/left.jpg" alt=""></div>
            <div class="items">
               <?php
                //  $rows = $Poster->all(['sh'=>1]);
                 foreach($rows as $k => $row){
                 ?>
                   <div class="control im" id="ssaa<?=$k?>"><img src="img/<?=$row['img']?>" ><div><?=$row['name']?></div></div>
                 <?php
                   }
                 ?>
              </div>
            <div onclick="pp(2)" class="right"><img src="icon/right.jpg" alt=""></div>
          </div>
      </div>
    </div>

    
    <style>

      .wrap{
        width:400px;
      }

      .it{
        display: inline-block;
        width:190px;
        margin:2.5px;
        border:1px solid #ffffff;
        height:180px;
      }
    </style>

    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <div class="wrap">
        <?php
          $ondate =  date("Y-m-d",strtotime("-2 days"));
          $today = date("Y-m-d");
          $div = 4;
          $nowpage =  empty($_GET['p'])? "1" : $_GET['p'];
          $totalpage = ceil($Movie->count(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today' ")/$div);
          $start = ($nowpage-1)*$div;
          $rows = $Movie->all(['sh'=>1]," && `date` >= '$ondate' && `date` <= '$today' order by `rank` limit $start,$div");
          foreach($rows as $row){
       ?>
         <div class="it">
            <div>片名：<?=$row['name']?></div>
            <div>
                <div><img src="img/<?=$row['img']?>" style="width:30%"></div>
                <div>分級：<?=$arr[$row['class']]?><br>
                  上映日期：<?=$row['date']?>
                </div>
            </div>
            <div><button onclick="location.href='?do=intro&id=<?=$row['id']?>'">劇情簡介</button><button onclick="location.href='?do=order&id=<?=$row['id']?>'">線上訂票</button></div>
         </div>
      <?php
      }
      ?>
        </div>
        <div class="ct"> 
          <?php


          for($i=1;$i<=$totalpage;$i++){
            echo '<a href="?do=main&p='.$i.'">'.$i.'</a>';
          }

          ?>
        </div>
      </div>
    </div>


<script>
       $(".list").eq(0).show();
       ani();
       let auto = setInterval(ani,3000);
       $(".control").hover(function(){
          clearInterval(auto);
         },function(){
          setInterval(ani,3000);
         })

        $(".control").on("click",function(){
          let id = $(this).attr("id").replace("ssaa","");
          $(".list").hide();
          $("#ssbb"+id).show();
          console.log(id);
        }
        )

       function ani(){
         let dom = $(".list:visible");
         let next;
         if( dom.next().length == "0" ){
            next = $(".list").eq(0);
         }else{
            next = dom.next();
         }
         let ani = $(".list:visible").data("ani");
        //  console.log(dom,next,ani);
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
				num = <?= $Movie->count(['sh'=>1]); ?>;
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