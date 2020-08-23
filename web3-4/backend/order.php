
快速刪除：依日期<input type="radio" name="type" value="date"><input type="text" name="dd" id="ddd">依電影<input type="radio" name="type" value="name">
<select name="mmm" id="mmm">
<?php
$rows = $Ord->all([]," group by name");
foreach($rows as $row){
  echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
}
?>
</select>
<button onclick="q_del()">刪除</button>

<table>
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
foreach($seat as $s){
  echo $s."號,";
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

function del(table,id){
  $.post("api/del.php",{table,id},function(res){
    // console.log(res);
     location.reload();
  })

}


function q_del(){
  let type = $("input[name='type']:checked").val(); 
  let data;
  switch(type){
    case "date":
      data = $("#ddd").val()
    break;
    case "name":
      data = $("#mmm").val()
    break;
  }
  console.log(type,data);
  $.post("api/q_del.php",{type,data},function(res){
    // console.log(res);
       location.reload();
  })
}

</script>


