<style>

.item{
  display: inline-block;
  margin:5px 0;
}

.item1{
  width:20%;
}

.item2{
  width:10%;
}
.item3{
  width:60%;
}


</style>


<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<form action="api/edit_movie2.php" method="post">
<?php
$rows = $Movie->all();
foreach($rows as $row){
  $chk = $row['sh'] ? "checked" : "" ;
?>
<div>
<div class="item item1"><img src="img/<?=$row['img']?>" style="width:50%"></div>
<div class="item item2">分級：<img src="icon/<?=$row['class']?>.png" alt=""> </div>
<div class="item item3">
  <div>片名：<?=$row['name']?>   片長：<?=$row['length']?>分  上映時間：<?=$row['date']?></div>
  <div><button type="button" onclick="location.href='?do=edit_movie&id=<?=$row['id']?>'">編輯</button>
  排序：<input type="text" name="rank[]" value="<?=$row['rank']?>"> 顯示<input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>>刪除<input type="checkbox" name="del[]" value="<?=$row['id']?>">
  <input type="hidden" name="id[]" value="<?=$row['id']?>">
</div>
  <div>劇情介紹：<?=$row['intro']?></div>

</div>

</div>

<?php
}
?>
<input type="submit" value="修改">
</form>