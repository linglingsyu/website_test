<h1 class="cent">編輯次選單</h1>
<hr>
<form action="api/add_submenu.php" method="post" >
<div class="cent">
  <table id="more">
    <tr>
      <td>次選單名稱</td>
      <td>次選單連結網址</td>
      <td>刪除</td>
    </tr>
<?php
  include_once "../base.php";
 $rows = $Menu->all(['parent'=>$_GET['id']]);
  foreach($rows as $row){
?>
    <tr >
      <td><input type="text" name="name[]" value="<?= $row['name'] ?>"></td>
      <td><input type="text" name="link[]" value="<?= $row['link'] ?>"></td>
      <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
      <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
    </tr>
  <?php
  }
  ?>
  </table>
<input type="hidden" name="parent" value="<?= $_GET['id'] ?>" >
<input type="submit" value="修改確定"><input type="reset" value="重置"><button type="button" onclick="more()">更多次選單</button></div>

</form>


<script>
  function more(){
    let str = `    <tr>
      <td><input type="text" name="name2[]"></td>
      <td><input type="text" name="link2[]"></td>
    </tr>` ;
    $("#more").append(str);
  }

</script>