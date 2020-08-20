<h1>訂購清單</h1>
快速刪除<input type="radio" name="type" value="date">依日期<input type="text" name="date" id="date">
<input type="radio" name="type" value="movie">依電影<select name="movie" id="movie">
  <?php
  $rows = $Ord->all();
  foreach($rows as $row){
  ?>
  <option value="<?=$row['movie']?>"><?=$row['movie']?></option>
  <?php
    }
  ?>
</select>
<button onclick="dd()">刪除</button>

<table>
  <tr>
    <td>訂單編號</td>
    <td>電影名稱</td>
    <td>日期</td>
    <td>場次名稱</td>
    <td>訂購數量</td>
    <td>訂購位置</td>
    <td>操作</td>
  </tr>
  <?php
  foreach($rows as $row){
    $seat = unserialize(($row['seat']));
  ?>
  <tr>
    <td><?=$row['no']?></td>
    <td><?=$row['movie']?></td>
    <td><?=$row['date']?></td>
    <td><?=$row['session']?></td>
    <td><?=$row['qt']?></td>
    <td>
      <?php
      foreach($seat as $s){
        echo $s.",";
      }
      ?>
    </td>
    <td><button onclick="del('ord',<?=$row['id']?>)">刪除</button></td>
  </tr>
  <?php
    }
  ?>
</table>


<script>

function dd(){
  let type = $("input[name='type']:checked").val();
  let data;
  switch(type){
    case "date":
        data = $("#date").val();
      break;
    case "movie":
        data = $("#movie").val();
      break;
  }
  $.post("api/del_ord.php",{type,data},function(res){
    // console.log(res);
       location.reload();
  })


}


</script>