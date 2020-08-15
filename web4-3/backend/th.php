<h1>商品分類</h1>
新增大分類<input type="text" name="big" id="big"><button onclick="addbig()">新增</button><br>
新增中分類<select name="biglist" id="biglist"></select> <input type="text" name="mid" id="mid"><button onclick="addmin()">新增</button>
<table>
  <?php

  $rows = $Type->all(['parent'=>0]);
  foreach($rows as $row){
  ?>
  <tr>
    <td style="color:red"><?=$row['name']?></td>
    <td><button onclick="location.href='?do=edit_big?id=<?=$row['id']?>'">修改</button><button onclick="del(<?=$row['id']?>)">刪除</button></td>
  </tr>
      <?php
        $mids = $Type->all(['parent'=>$row['id']]);
        foreach($mids as $mid){
      ?>
      <tr>
      <td><?=$mid['name']?></td>
    <td><button onclick="location.href='?do=edit_mid&id=<?=$mid['id']?>'">修改</button><button onclick="del(<?=$mid['id']?>)">刪除</button></td>
      </tr>
  <?php
   }
  }
  ?>
</table>

<h1>商品管理</h1>
<button onclick="location.href='?do=addgoods'">新增商品</button>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
  </tr>
<?php
$goods = $Goods->all();
foreach($goods as $g){
?>
  <tr>
    <td><?=$g['no'] ?></td>
    <td><?=$g['name'] ?></td>
    <td><?=$g['stock'] ?></td>
    <td><?= $g['sh']?"販售中":"已下架"; ?></td>
    <td>
      <button onclick="">修改</button>
      <button onclick="del_goods(<?=$g['id']?>)">刪除</button>
      <button onclick="sh(<?=$g['id']?>,'1')">上架</button>
      <button onclick="sh(<?=$g['id']?>,'2')">下架</button>
    </td>
</tr>
<?php
}
?>
</table>


<script>
  function addbig(){
    let big = $("#big").val();
    $.post("api/addbig.php",{big},function(res){
        getbiglist();
    })
  }


  getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",function(res){
        $("#biglist").html(res);
    })
  }

  function addmin(){
    let big = $("#biglist").val();
    let mid = $("#mid").val();
    $.post("api/addmid.php",{big,mid},function(res){
        location.reload();
    })
  }

  function del(id){
    $.post("api/del.php",{"table":"type",id},function(res){
      location.reload();
    })
  }

  function del_goods(id){
    $.post("api/del.php",{"table":"goods",id},function(res){
      location.reload();
      console.log(res);
    })
  }

  function sh(id,type){
    $.post("api/sh.php",{id,type},function(res){
      location.reload();
      console.log(res);
    })
  }


</script>