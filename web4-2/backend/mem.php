
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
    <td><?= $row['date'];?></td>
    <td><a href="?do=edit_member&id=<?=$row['id']?>">修改</a><a href="javascript:del(<?=$row['id']?>)">刪除</a></td>
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