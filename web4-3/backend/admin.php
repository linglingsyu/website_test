<button onclick="location.href='?do=add_admin'">新增管理者</button>
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
    <td>
      <?php
        if($row['acc'] == "admin"){
          echo "此帳號為最高權限";
        }else{
          echo '<button onclick="location.href=&#39;?do=edit_admin&id='.$row['id'].'&#39;">修改</button><button onclick="del('.$row['id'].')">刪除</button>';
        }
      ?>

    </td>
  </tr>
<?php
}
?>
</table>
<script>
  function del(id){
    $.post("api/del.php",{"table":"admin",id},function(res){
 
      location.reload();
    })
  }

</script>