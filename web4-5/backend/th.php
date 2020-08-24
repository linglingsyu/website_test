<h1>商品分類</h1>
新增大分類<input type="text" name="big" id="big"><button onclick="add_big()">新增</button>
<br>
新增中分類<select name="biglist" id="biglist"></select><input type="text" name="mid" id="mid"><button onclick="add_mid()">新增</button>

<table>
  <?php
  $rows = $Type->all(['parent'=>0]);
  foreach($rows as $row){
  ?>
  <tr>
    <td style="color:red"><?=$row['name']?></td>
    <td><button onclick="location.href='?do=edit_type&id=<?=$row['id']?>'">修改</button><button onclick="del(<?=$row['id']?>)">刪除</button></td>
  </tr>
     <?php
      $subs = $Type->all(['parent'=>$row['id']]);
      foreach($subs as $s){
     ?>
      <tr>
        <td><?=$s['name']?></td>
        <td><button onclick="location.href='?do=edit_type&id=<?=$s['id']?>'">修改</button><button onclick="del(<?=$s['id']?>)">刪除</button></td>
      </tr>
     <?php
     }
     ?>
<?php
  }
?>
</table>


<h1>商品管理</h1>
<button>新增商品</button>
<table>
  <tr>
    <td>編號</td>
    <td>商品名稱</td>
    <td>庫存量</td>
    <td>狀態</td>
    <td>操作</td>
  </tr>
<?php
  $rows =  $Goods->all();
  foreach($rows as $row){
?>

<tr>
  <td><?=$row['no']?></td>
  <td><?=$row['name']?></td>
  <td><?=$row['stock']?></td>
  <td><?=$row['sh'] ? "販售中" : "已下架" ?></td>
  <td>
  <button>修改</button>
  <button>刪除</button>
  <button>上架</button>
  <button>下架</button></td>
</tr>

<?php
  }
?>
</table>

<script>
  function add_big(){
    let big = $("#big").val();
    $.post("api/add_big.php",{big},function(){
       getbiglist();
       location.reload();
    })
  }

  getbiglist()
  function getbiglist(){
    $.post("api/getbiglist.php",function(res){
        $("#biglist").html(res);
    })
  }

  function add_mid(){
    let big = $("#biglist").val();
    let mid = $("#mid").val();
    $.post("api/add_mid.php",{big,mid},function(){
       location.reload();
    })
  }



</script>