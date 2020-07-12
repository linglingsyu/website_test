<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">動畫圖片管理</p>
  <form method="post" action="api/edit_mvim.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="50%">動畫圖片</td>
          <td width="5%">顯示</td>
          <td width="5%">刪除</td>
          <td></td>
        </tr>
        <?php
                  $db = new db("mvim");
                  $rows = $db->all();
        foreach ($rows as $row) {
            $chk = ($row['sh']) ? "checked" :"";
        ?>
          <tr>
            <td><img src="img/<?= $row['img'] ?>" style="width:200px;height:200px;"></td>
            <td><input style="width:90%" type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $chk ?>></td>
            <td><input style="width:90%" type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
            <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/edit_mvim.php?id=<?= $row['id'] ?>&#39;)" value="更新圖片"></td>
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
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/mvim.php&#39;)" value="新增動畫圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>