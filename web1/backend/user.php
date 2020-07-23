<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">管理者帳號管理</p>
  <form method="post" action="api/edit_user.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td >帳號</td>
          <td >密碼</td>
          <td >刪除</td>
        </tr>
        <?php
        $db = new db("user");
        $rows = $db->all();
        foreach ($rows as $row) {
        ?>
          <tr>
            <td><input style="width:90%" type="text" name="acc[]" value="<?= $row['acc'] ?>"></td>
            <td><input style="width:90%" type="text" name="pw[]" value="<?= $row['pw'] ?>"></td>
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
          <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/user.php&#39;)" value="新增管理者帳號"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>