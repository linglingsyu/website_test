<?php
include_once "base.php";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">進站總人數管理</p>
  <form method="post" action="api/edit_total.php">
    <table width="100%">
      <?php
      $db = new DB("total");
      $row = $db->find(1);
      ?>
      <tbody>
        <tr>
          <td>進站總人數</td>
          <td><input type="number" name="total" value="<?= $row['total'] ?>"></td>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        </tr>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
      
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>