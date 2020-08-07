<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類 <input type="text" name="big" id="big"><button onclick="getbig()">新增</button></div>
<div class="ct">新增中分類 <select name="biglist" id="biglist"></select> 
<input type="text" name="sec" id="sec"><button onclick="getsec()">新增</button></div>

<table class="all">
<?php
$big = $Type->all(['parent'=>0]);
foreach($big as $b){
?>
  <tr>
    <td class="tt"><?=$b['name']?></td>
    <td class="tt"><button onclick="location.href='?do=edit_big&id=<?=$b['id']?>'">修改</button><button onclick="del_type(<?=$b['id']?>)">刪除</button></td>
   </tr>
    <?php
    $sec = $Type->all(['parent'=>$b['id']]);
    foreach($sec as $s){
    ?>
    <tr>
    <td class="pp"><?= $s['name']?></td>
    <td class="pp"><button onclick="location.href='?do=edit_sec&id=<?=$s['id']?>'">修改</button><button onclick="del_type(<?=$s['id']?>)">刪除</button></td>
    </tr>

  <?php      
      }
}
?>
</table>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
  <tr>
    <td class="tt">編號</td>
    <td class="tt">商品名稱</td>
    <td class="tt">庫存量</td>
    <td class="tt">狀態</td>
    <td class="tt">操作</td>
   </tr>
<?php
$rows = $Goods->all();
foreach($rows as  $row){
?>
<tr>
  <td class="pp"><?=$row['no']?></td>
  <td class="pp"><?=$row['name']?></td>
  <td class="pp"><?=$row['stock']?></td>
  <td class="pp"><?= ($row['sh'])? "販賣中":"已下架"; ?></td>
  <td class="pp">
  <button onclick="location.href='?do=edit_goods&id=<?=$row['id']?>&big=<?=$row['big']?>&sec=<?=$row['sec'] ?>'">修改</button>
  <button onclick="del(<?=$row['id']?>)">刪除</button>
  <button onclick="sh(<?=$row['id']?>)">上架</button>
  <button onclick="sh(<?=$row['id']?>)">下架</button></td>
</tr>

<?php
}
?>
</table>


<script>
  getbig();
  function getbig(){
         let big = $("#big").val();
       $.post("api/addbig.php",{big},function(res){
         $("#biglist").html(res);     
       })
  }

  function getsec(){
    let big = $("#biglist").val();
    let sec = $("#sec").val();
    $.post("api/addsec.php",{big,sec},function(res){
      location.reload();
    })
  }

  function del_type(id){
    $.post("api/del.php",{"table":"type",id},function(res){
         location.reload();
    })
  }

  function del(id){
    $.post("api/del.php",{"table":"goods",id},function(res){
       location.reload();
    })
  }

  function sh(id){
    $.post("api/sh.php",{id},function(res){
      // console.log(res);
       location.reload();
    })
  }


</script>