<h2 class="ct">訂單管理</h2>


<table class="all ct">
  <tr>
    <td class="tt">訂單編號</td>
    <td class="tt">金額</td>
    <td class="tt">會員帳號</td>
    <td class="tt">姓名</td>
    <td class="tt">下單時間</td>
    <td class="tt">操作</td>
  </tr>
  <?php

  $rows = $Ord->all();
  foreach($rows as $row){
  ?>
  <tr>
    <td class="pp"><a href="?do=ord_detail&id=<?=$row['id']?>"><?=$row['no']?></a></td>
    <td class="pp"><?=$row['total']?></td>
    <td class="pp"><?=$row['acc']?></td>
    <td class="pp"><?=$row['name']?></td>
    <td class="pp"><?=$row['date'] ?></td>
    <td class="pp"><button onclick="del(<?=$row['id']?>)">刪除</button></td>
  </tr>
<?php
  }
?>
  
</table>

<script>
  function del(id){
    $.post("api/del.php",{"table":"ord",id},function(){
        location.reload();
    })
  }

</script>


