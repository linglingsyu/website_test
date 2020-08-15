
<table>
  <tr>
    <td>姓名</td>
    <td>帳號</td>
    <td>註冊日期</td>
    <td>操作</td>
  </tr>
  <?php
$rows = $Member->all();
foreach($rows as $row){
  ?>
  <tr>
    <td><?=$row['name']?></td>
    <td><?=$row['acc']?></td>
    <td><?=$row['date']?></td>
    <td>
      <?php
          echo '<button onclick="location.href=&#39;?do=edit_mem&id='.$row['id'].'&#39;">修改</button><button onclick="del('.$row['id'].')">刪除</button>';
      ?>

    </td>
  </tr>
<?php
}
?>
</table>

<script>
  function del(id){
    $.post("api/del.php",{"table":"member",id},function(res){
 
      location.reload();
    })
  }

</script>