<h1>商品分類</h1>
新增大分類<input type="text" name="big" id="big"><button onclick="addbig()">新增</button><br>
新增中分類<select name="biglist" id="biglist"></select><input type="text" name="mid" id="mid"><button onclick="addmid()">新增</button><br>
<table>
<?php
$rows = $Type->all(['parent'=>0]);
foreach($rows as $row){
?>

  <tr>
    <td style="color:red;"><?=$row['name']?></td>
    <td><button onclick="location.href='?do=edit_th&id=<?=$row['id']?>'">修改</button><button onclick="del(<?=$row['id']?>)">刪除</button></td>
  </tr>
    <?php
      $sub = $Type->all(['parent'=>$row['id']]);
      foreach($sub as $s){
    ?>
      <tr>
        <td><?=$s['name']?></td>
        <td><button onclick="location.href='?do=edit_th&id=<?=$s['id']?>'">修改</button><button onclick="del(<?=$s['id']?>)">刪除</button></td>
      </tr>
    <?php
      }
    ?>

<?php
}
?>
</table>

<script>

function del(id){
    $.post("api/del.php",{"table":"type",id},function(){
      location.reload();
    })
  }


  function addbig(){
    let big = $("#big").val();
    $.post("api/addbig.php",{big},function(res){
      getbiglist()
    })
  }
  getbiglist();
  function getbiglist(){
    $.post("api/getbiglist.php",{},function(res){
        $("#biglist").html(res);
    })
  }
  function addmid(){
    let big = $("#biglist").val();
    let mid = $("#mid").val();
    $.post("api/addmid.php",{big,mid},function(res){
        location.reload();
    })
  }


</script>