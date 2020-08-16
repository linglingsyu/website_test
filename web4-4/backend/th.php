<h1>商品分類</h1>
新增大分類<input type="text" name="big" id="big"><button onclick="addbig()">新增</button><br>
新增中分類<select name="biglist" id="biglist"></select><input type="text" name="mid" id="mid"><button onclick="addmid()">新增</button><br>
<table>


<?php
$rows = $Type->all(['parent'=>0]);
foreach($rows as $row){
?>

<tr>
    <td style="color:red"><?=$row['name']?></td>
    <td><button onclick="location.href='?do=edit_big&id=<?=$row['id']?>'">修改</button><button onclick="del(<?=$row['id']?>)">刪除</button></td>
</tr>

    <?php
    $mid = $Type->all(['parent'=>$row['id']]);
    foreach($mid as $m){
    ?>
      <tr>
      <td><?=$m['name']?></td>
      <td><button onclick="location.href='?do=edit_mid&id=<?=$m['id']?>'">修改</button><button onclick="del(<?=$m['id']?>)">刪除</button></td>
    </tr>

    <?php
    }
    ?>

<?php
}
?>
</table>


<h1>商品管理</h1>

<button onclick="location.href='?do=add_goods'">新增商品</button>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
  </tr>
<?php
$rows = $Goods->all();
foreach($rows as $row){
?>
  <tr>
    <td><?=$row['no']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['stock']?></td>
    <td><?=$row['sh']? "販售中": "已下架";?></td>
    <td>
    <button onclick="location.href='?do=edit_goods&id=<?=$row['id']?>'">修改</button>
    <button onclick="del_goods(<?=$row['id']?>)">刪除</button>
    <button onclick="sh(<?=$row['id']?>,1)">上架</button>
    <button onclick="sh(<?=$row['id']?>,2)">下架</button></td>
  </tr>
<?php
}
?>
</table>


<script>

  function addbig(){
    let big = $("#big").val();
    $.post("api/add_big.php",{big},function(res){
        getbiglist();
        location.reload();
    })
  }

  getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",function(res){
      $("#biglist").html(res);
    })
  }

  function addmid(){
    let big = $("#biglist").val();
    let mid = $("#mid").val();
    $.post("api/add_mid.php",{big,mid},function(res){
        location.reload();
    })

  }


  function del(id){
    $.post("api/del.php",{"table":"type",id},function(){
      location.reload();
    })
  }

  function sh(id,type){
    $.post("api/sh.php",{id,type},function(){
      location.reload();
    })
  }

  
  function del_goods(id){
    $.post("api/del.php",{"table":"goods",id},function(){
      location.reload();
    })
  }
</script>