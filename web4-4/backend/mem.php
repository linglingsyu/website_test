

<table>
  <tr>
    <td>姓名</td>
    <td>會員帳號</td>
    <td>註冊日期</td>
    <td>管理</td>
  </tr>
  <?php
    $rows = $Member->all();
    foreach($rows as $row){
  ?>
  <tr>
    <td><?=$row['name']?></td>
    <td><?=$row['acc']?></td>
    <td><?=$row['date']?></td>
    <td><button onclick="location.href='?do=edit_mem&id=<?=$row['id']?>'">修改</button><button onclick="del(<?=$row['id']?>)">刪除</button>;</td>
  </tr>
  <?php
    }
  ?>
</table>

<script>

  function del(id){
    $.post("api/del.php",{"table":"member",id},function(){
      location.reload();
    })
  }

</script>