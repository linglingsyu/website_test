
<table class="all">
  <tr>
  <td class="tt">姓名</td>
    <td class="tt">帳號</td>
    <td class="tt">註冊日期</td>
    <td class="tt">管理</td>
  </tr>
<?php
$rows = $Member->all();
foreach($rows as $row){
?>
  <tr>
  <td class="pp"><?= $row['name'] ?></td>
    <td class="pp"><?= $row['acc'] ?></td>
    <td class="pp"><?= $row['date'] ?></td>
    <td class="pp">
      <button onclick='location.href="?do=edit_mem&id=<?=$row['id'] ?>"'>修改</button>
      <button onclick="del(<?= $row['id']?>)">刪除</button>
    </td>
  </tr>
<?php
}
?>
</table>
<script>
  function del(id){
    $.post("api/del.php",{"table":"Member",id},function(){
        location.reload();
    })
  }

</script>