<style>
  .tt {
    cursor: pointer;
    color: blue;
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
          <div class="all" style="display:none"><?= nl2br($row['text'])  ?></div>
        </td>
        <td>  <?= $row['good'] ?>個人說<img src="icon/02B03.jpg" style="width:20px;height:20px"></td>

      </tr>


    <?php
    }
    ?>
  </table>
  
  <div class="ct">

<?php
if($nowpage > 1 ){
  echo '<a href="?do=news&page='.($nowpage-1).'"> < </a>';
}
for($i=1;$i<= $total ; $i++){
  $size = ($i == $nowpage) ? "24px" : "16px";
  echo '<a style="font-size:'.$size.'" href="?do=news&page='.$i.'">'.$i.'</a>';
}

if($nowpage < $total){
  echo '<a href="?do=news&page='.($nowpage+1).'"> > </a>';
}

?>

</div>
</fieldset>

<script>
  $(".tt").on("click", function() {
    $(this).next().children().eq(0).toggle();
    $(this).next().children().eq(1).toggle();
  })
</script>