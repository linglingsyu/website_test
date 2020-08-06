<button onclick="location.href='?do=add_admin'">新增管理員</button>
<table class="all">
  <tr>
    <td class="tt">帳號</td>
    <td class="tt">密碼</td>
    <td class="tt">管理</td>
  </tr>
<?php
$rows = $Admin->all();
foreach($rows as $row){
?>
  <tr>
    <td class="pp"><?= $row['acc'] ?></td>
    <td class="pp"><?= str_repeat("*",strlen($row['pw'])); ?></td>
    <td class="pp">
      <?php 

      if($row['acc'] == "admin"){
        echo "此帳號為最高權限";
      }else{
        echo "<button onclick='location.href=&#39;?do=edit_admin&id=".$row['id']."&#39;'>修改</button><button onclick='del(".$row['id'].")'>刪除</button>";
      }

      ?>
    </td>
  </tr>
<?php
}
?>
</table>
<button onclick="location.href='index.php'">返回</button>
<script>
  function del(id){
    $.post("api/del.php",{"table":"Admin",id},function(){
        location.reload();
    })
  }

</script>