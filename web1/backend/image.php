<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料管理</p>
  <form method="post" action="api/edit_image.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="50%">校園映像資料圖片</td>
          <td width="5%">顯示</td>
          <td width="5%">刪除</td>
          <td></td>
        </tr>
        <?php
        $db = new db("image");
        $num = 3;
        $total = $db->count(); //4
        $page = ceil($total / $num); //2
        $nowpage = (!empty($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($nowpage - 1) * $num;
        $rows = $db->all([], " limit $start,$num");
        foreach ($rows as $row) {
          $chk = ($row['sh']) ? "checked" : "";
        ?>
          <tr>
            <td><img src="img/<?= $row['img'] ?>" style="width:100px;height:68px;"></td>
            <td><input style="width:90%" type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $chk ?>></td>
            <td><input style="width:90%" type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/edit_image.php?id=<?= $row['id'] ?>&#39;)" value="更新圖片"></td>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <div class="ct">
<?php

if(($nowpage-1)>0){
 echo ' <a href="?do=image&&p='.($nowpage-1).'">&lt;</a>';
}
for ($i = 1; $i<=$page;$i++){
  $fontsize = ($i == $nowpage) ? "24px" : "14px";
  echo '<a style="padding:5px;font-size:'.$fontsize.'" href="?do=image&&p='.$i.'">'.$i.'</a>';
}

if(($nowpage + 1) <= $page ){

  echo ' <a href="?do=image&&p='.($nowpage+1).'">&gt;</a>';
 }
?>

    </div>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/image.php&#39;)" value="新增校園映像圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>