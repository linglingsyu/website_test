<button onclick="location.href='?do=add_admin'">新增管理員</button>
<table>
  <tr>
    <td>帳號</td>
    <td>密碼</td>
    <td>管理</td>
  </tr>
<?php
$rows = $Admin->all();
foreach($rows as $row){
?>

  <tr>
    <td><?=$row['acc']?></td>
    <td><?=str_repeat("*",strlen($row['pw']))?></td>
    <td><?php
      if($row['acc'] == "admin"){
        echo "此帳號為最高權限";
      }else{
        echo '<a href="?do=edit_admin&id='.$row['id'].'">修改</a><a href="javascript:del('.$row['id'].')">刪除</a>';
      }
    ?></td>
  </tr>

<?php
  }
?>
</table>


<script>
  function del(id){
    $.post("api/del.php",{"table":"admin",id},function(){
      location.reload();
    })
  }

</script>