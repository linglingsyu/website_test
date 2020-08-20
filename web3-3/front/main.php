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
            foreach($rows as $key => $row){
            ?>
              <div class="list" data-ani="<?=$row['ani']?>"><img src="img/<?=$row['img']?>" style="height:250px;"><div><?=$row['name']?></div></div>
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
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <table>
          <tbody>
            <tr> </tr>
          </tbody>
        </table>
        <div class="ct"> </div>
      </div>
    </div>


<script>
       $(".list").eq(0).show();
       ani();
       let auto = setInterval(ani,3000);
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