
    <button onclick="location.href='?do=addmovie'">新增電影</button>
    <hr>
    <form action="api/sh_ord.php" method="post">
    <?php
    $rows = $Movie->all();
    foreach($rows as $row ){
      $chk = $row['sh'] == "1" ? "checked" : "" ;
      ?>
      <img src="img/<?=$row['img'] ?>" style="width:20%">
      <div style="display:inline-block" style="width:30px">分級: <img src="icon/<?=$row['class']?>.png" alt=""> </div>
      <div style="display:inline-block">片名:<?=$row['name']?></div>
      <div style="display:inline-block">片長:<?=$row['length']?>分</div>
      <div style="display:inline-block">上映時間:<?=$row['date']?></div>
      <div>顯示<input type="checkbox" name="sh[]" value="<?=$row['id'] ?>" <?= $chk ?>> 排序<input type="text" name="ord[]" value="<?=$row['ord']?>"> <button type="button" onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯電影</button><button  type="button" onclick="location.href='api/del_movie.php?id=<?=$row['id']?>'">刪除電影</button></div>
      <div> 劇情介紹:<?=$row['intro']?></div>
      <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
    <hr> 
    <?php
}
?>
<input type="submit" value="送出"><input type="reset" value="重置">
</form>


  