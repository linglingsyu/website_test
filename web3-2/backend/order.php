<h1>訂購清單</h1>
快速刪除：<input type="radio" name="type" value="date" checked>依日期<input type="text" name="date" id="date">
依電影<input type="radio" name="type" value="name">
<select name="movie" id="movie">
  <?php
  $movie = $Ord->all([]," group by name");
  foreach($movie as $m){
  ?>
  <option value="<?=$m['name']?>"><?=$m['name']?></option>
  <?php
    }
  ?>
</select>
<button onclick="q_del()">刪除</button>


<table style="text-align:center">
  <tr>
    <td>訂單編號</td>
    <td>電影名稱</td>
    <td>日期</td>
    <td>場次時間</td>
    <td>訂購數量</td>
    <td>訂購位置</td>
    <td>操作</td>
  </tr>
  <?php
$rows = $Ord->all([]," order by `no` desc");
foreach($rows as $row){
  $seat = unserialize($row['seat']);
  ?>
  <tr>
    <td><?=$row['no']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['date']?></td>
    <td><?=$row['session']?></td>
    <td><?=$row['qt']?></td>
    <td>
      <?php
        foreach($seat as $s ){
          echo (floor($s/5)+1).'排'.(($s%5)+1).'號'."<br>";
        }
      ?>
    </td>
    <td><button onclick="del(<?=$row['id']?>)">刪除</button></td>
  </tr>
<?php
}
?>
</table>

<script>
  function q_del(){
    let type = $("input[name='type']:checked").val();
    let data;
      switch(type){
        case "name":
          data = $("#movie").val();
        break;
        case "date":
          data = $("#date").val();
        break;
      }
      $.post("api/q_del.php",{type,data},function(res){
         location.reload();
          // console.log(res);
      })
  }

  function del(id){
    $.post("api/del.php",{id},function(){
        location.reload();
    })
  }


</script>