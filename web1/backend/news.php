<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">最新消息資料管理</p>
  <form method="post" action="api/edit_news.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="80%">最新消息資料內容</td>
          <td width="5%">顯示</td>
          <td width="5%">刪除</td>
        </tr>
        <?php
        $db = new db("news");
        $num = 3;
        $total = $db->count(); //4
        $page = ceil($total / $num); //2
        $nowpage = (!empty($_GET['p'])) ? $_GET['p'] : 1;
        $start = ($nowpage - 1) * $num;
        $rows = $db->all([]," limit $start,$num");
        foreach ($rows as $row) {  
          $chk = ($row['sh']) ? "checked" : "";
        ?>
          <tr>
            <td><textarea name="text[]" id="" cols="30" rows="10"><?= $row['text'] ?></textarea></td></td>
            <td><input style="width:90%" type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $chk ?>></td>
            <td><input style="width:90%" type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/news.php&#39;)" value="新增最新消息資料"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>
    <div class="ct">
<?php

if(($nowpage-1)>0){
 echo ' <a href="?do=news&&p='.($nowpage-1).'">&lt;</a>';
}
for ($i = 1; $i<=$page;$i++){
  $fontsize = ($i == $nowpage) ? "24px" : "14px";
  echo '<a style="padding:5px;font-size:'.$fontsize.'" href="?do=news&&p='.$i.'">'.$i.'</a>';
}

if(($nowpage + 1) <= $page ){

  echo ' <a href="?do=news&&p='.($nowpage+1).'">&gt;</a>';
 }
?>

    </div>
  </form>
</div>