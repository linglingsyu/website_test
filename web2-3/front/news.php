<fieldset>
  <legend>目前位置：首頁 > 最新文章區</legend>
  <table>
    <tr>
      <td>標題</td>
      <td>內容</td>
      <td></td>
    </tr>
  <?php
    $div = 5 ;
    $totalpage = ceil($News->count()/$div);
    $nowpage = empty($_GET['p']) ?  1: $_GET['p']; 
    $start = ($nowpage-1)*$div;
  $rows = $News->all(['sh'=>1]," limit $start,$div");
  foreach($rows as $row){
  ?>
    <tr>
      <td class="title"  width="30%"><?= $row['title'] ?></td>
      <td width="60%">
       <div class="part"><?= mb_substr($row['text'],0,10) ?>...</div> 
       <div class="all" style="display:none"><?= $row['text'] ?></div>
    </td>
      <td>
      <?php
        if(!empty($_SESSION['user'])){
          $log = $Log->find(['user'=>$_SESSION['user'],'news'=>$row['id']]);
          if(empty($log)){
        ?>
        <a href="#" id="good<?= $row['id'] ?>" onclick="good(<?= $row['id']?>,'1','<?= $_SESSION['user'] ?>')">讚</a>
        <?php        
          }else{
        ?>
          <a href="#" id="good<?= $row['id'] ?>" onclick="good(<?= $row['id']?>,'2','<?= $_SESSION['user'] ?>')">收回讚</a>
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

for($i=1 ; $i <= $totalpage ; $i++){
  $size = ($i == $nowpage)? "24px" : "16px";
  echo '<a style="font-size:'.$size.'" href="?do=news&p='.$i.'">'.$i.'</a>';
}

if($nowpage < $totalpage){
  echo '<a href="?do=news&p='.($nowpage+1).'"> > </a>';
}

?>
</div>
</fieldset>

<script>

$(".title").on("click",function(res){
  $(this).next().children(".part").toggle();
  $(this).next().children(".all").toggle();
})

</script>