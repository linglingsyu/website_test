<h2 class="ct">商品分類</h2>
<div class="ct">新增大分類 <input type="text" name="big" id="big"><button onclick="getbig()">新增</button></div>
<div class="ct">新增中分類 <select name="biglist" id="biglist"></select> 
<input type="text" name="sec" id="sec"><button>新增</button></div>

<table class="all">
<?php
$big = $Type->all(['parent'=>0]);
foreach($big as $b){
?>
  <tr>
    <td class="tt"><?=$b['name']?></td>
    <td class="tt"><button onclick="location.href='?do=edit_big&id=<?=$b['id']?>'">修改</button><button onclick="del(<?=$b['id']?>)">刪除</button></td>
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
         console.log(res);
         $("#biglist").html(res);
       })
  }

  function del(id){
    $.post("api/del.php",{"table":"Type",id},function(){
        location.reload();
    })
  }


</script>