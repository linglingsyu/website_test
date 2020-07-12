<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">動態文字廣告管理</p>
  <form method="post" action="api/edit_ad.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="80%">動態文字廣告</td>
          <td width="5%">顯示</td>
          <td width="5%">刪除</td>
        </tr>
        <?php
        $db = new db("ad");
        $rows = $db->all();
        foreach ($rows as $row) {
          $chk = ($row['sh']) ? "checked" : "";
        ?>
          <tr>
            <td><input style="width:90%" type="text" name="text[]" value="<?= $row['text'] ?>"></td>
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
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/ad.php&#39;)" value="新增動態文字廣告"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>