<fieldset>
  <legend>
    目前位置：首頁 > 人氣文章區
  </legend>
  <table>
    <tr>
      <td>標題</td>
      <td>內容</td>
      <td>人氣</td>
    </tr>

  <?php
  $div = 5;
  $nowpage = empty($_GET['p']) ? "1" : $_GET['p'];
  $totalpage = ceil($News->count()/$div);
  $start = ($nowpage-1)*$div;
  $rows = $News->all(['sh'=>1]," order by `good` desc limit $start,$div");
  foreach($rows as $row){
  ?>
    <tr>
      <td class="ttt" width="40%"><?=$row['title']?></td>
      <td width="40%">
        <div><?=mb_substr($row['text'],0,20)?>...</div>
        <div style="display:none;position:absolute;background:#000;color:#fff" class="all"><?=nl2br($row['text'])?></div>
      </td>
      <td>
          <?php
        
          if(!empty($_SESSION['user'])){
            $log = $Log->find(['news'=>$row['id'],'user'=>$_SESSION['user']]);
            if(empty($log)){
         ?>
          <span id='vie<?=$row['id']?>'><?=$row['good']?></span>個人說<img src="icon/02B03.jpg" style="width:30px"> - <a id="good<?=$row['id']?>" href="javascript:good('<?=$row['id']?>','1','<?=$_SESSION['user']?>')">讚</a>
          <?php
            }else{
          ?>
           <span id='vie<?=$row['id']?>'><?=$row['good']?></span>個人說<img src="icon/02B03.jpg" style="width:30px"> - <a id="good<?=$row['id']?>" href="javascript:good('<?=$row['id']?>','2','<?=$_SESSION['user']?>')">收回讚</a>
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
  <div>
    <?php

if($nowpage > 1){
  echo '<a href="?do=news&p='.($nowpage-1).'"> < </a>';
}
    for($i = 1; $i <= $totalpage ; $i++){
      $size = $i == $nowpage ? "24px;" : "16px";
      echo '<a style="padding:5px;font-size:'.$size.';" href="?do=news&p='.$i.'">'.$i.'</a>';
    }

    if($nowpage < $totalpage){
      echo '<a href="?do=news&p='.($nowpage+1).'"> > </a>';
    }

    ?>

</div>
</fieldset>


<script>
  $(".ttt").hover(function(){
    $(this).next().children().eq(0).toggle();
    $(this).next().children().eq(1).toggle();
  })
</script>