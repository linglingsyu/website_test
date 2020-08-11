<style>
  #text{
    background-color: #000;
    color:#fff;
    position: absolute;

  }
</style>
<fieldset>
  <legend>目前位置：首頁 > 人氣文章區</legend>
  <table>
    <tr>
      <td>標題</td>
      <td>內容</td>
      <td>人氣</td>
    </tr>
    <?php
    $div = 5;
    $nowpage = empty($_GET['p']) ? 1 : $_GET['p'];
    $totalpage = ceil($News->count()/$div);
    $start = ($nowpage-1)*$div;
    $rows = $News->all(['sh'=>1]," limit $start,$div");
    foreach($rows as $key => $row){
    ?>
    <tr>
      <td width="30%" class="aaa"><?=$row['title']?></td>
      <td width="50%;position:relative">
        <div><?=mb_substr($row['text'],0,20)?>...</div>
        <div id="text" style="display:none"><?=$row['text']?></div>
      </td>
      <td><span id="vie<?=$row['id']?>"><?=$row['good']?></span>個人說<img style="width:30px;" src="icon/02B03.jpg" alt=""> - 
      <?php
      $log = $Log->find(['user'=>$_SESSION['user'],'news'=>$row['id']]);
      if(!empty($_SESSION['user'])){
          if(empty($log)){
      ?>
         <a id="good<?=$row['id']?>" href="javascript:good(<?=$row['id']?>,'1','<?=$_SESSION['user']?>')">讚</a>
      <?php
        }else{
      ?>
          <a id="good<?=$row['id']?>" href="javascript:good(<?=$row['id']?>,'2','<?=$_SESSION['user']?>')">收回讚</a>

      <?php
        }
      }
      ?>

    
    </td>
    </tr>
    <?php
     }
    ?>
  </table>

  <div class="ct">
  <?php
  if($nowpage > 1){
    echo '<a href="?do=news&p='.($nowpage-1).'"> < </a>';
  }
  for($i=1; $i <= $totalpage ; $i++){
    $size = ($nowpage == $i) ? "24px" : "16px";
    echo '<a style="padding:5px;font-size:'.$size.'" href="?do=news&p='.$i.'">'.$i.'</a>';
  }
  if($nowpage < $totalpage){
    echo '<a href="?do=news&p='.($nowpage+1).'"> > </a>';
  }
  ?>
</div>

</fieldset>

<script>
  $(".aaa").hover(function(){
      // $(this).next().children().eq(0).toggle();
      $(this).next().children().eq(1).toggle();   
  })
</script>