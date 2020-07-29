<style>
  .tt {
    cursor: pointer;
    color: blue;
  }

  .pop{
   background:rgba(51,51,51,0.8); color:#FFF; min-height:100px; width:300px; position:fixed; display:none; z-index:9999; overflow:auto;
  }
</style>

<fieldset>
  <legend>目前位置：首頁： > 人氣文章區</legend>
  <table>
    <tr>
      <td width="20%">標題</td>
      <td width="55%">內容</td>
      <td width="20%">人氣</td>
    </tr>
    <?php

    $div = 5;
    $total = ceil(($News->count()) / $div);
    $nowpage = empty($_GET['page']) ? 1 : $_GET['page'];
    $start = ($nowpage - 1) * $div;
    $rows = $News->all(['sh' => 1], " order by `good` desc limit $start,$div");

    foreach ($rows as $row) {
    ?>
      <tr>
        <td width="30%" class="tt"><?= $row['title'] ?></td>
        <td id="part">
          <div class="part"><?= mb_substr($row['text'], 0, 10)  ?></div>
          <div class="pop" style="display:none"><?= nl2br($row['text'])  ?></div>
        </td>
        <td> 
           <span id="vie<?= $row['id'] ?>"> <?= $row['good'] ?></span>個人說<img src="icon/02B03.jpg" style="width:20px;height:20px"> - 
          
        <?php
            if(!empty($_SESSION['user'])){
              $chk = $Log->find(["user"=>$_SESSION['user'],"news"=>$row['id']]);
              if(!empty($chk)){
          ?>
          <a href="#" id="good<?=$row['id'] ?>" onclick="good('<?= $row['id'] ?>','2','<?= $_SESSION['user'] ?>')">收回讚</a>
          <?php
              }else{
          ?>
          <a href="#" id="good<?=$row['id'] ?>" onclick="good('<?= $row['id'] ?>','1','<?= $_SESSION['user'] ?>')">讚</a>
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
if($nowpage > 1 ){
  echo '<a href="?do=pop&page='.($nowpage-1).'"> < </a>';
}
for($i=1;$i<= $total ; $i++){
  $size = ($i == $nowpage) ? "24px" : "16px";
  echo '<a style="font-size:'.$size.'" href="?do=pop&page='.$i.'">'.$i.'</a>';
}

if($nowpage < $total){
  echo '<a href="?do=pop&page='.($nowpage+1).'"> > </a>';
}

?>

</div>
</fieldset>

<script>
  $(".tt").hover( function() {
    // $(this).next().children().eq(0).toggle();
    $(this).next().children().eq(1).toggle();
  })
</script>