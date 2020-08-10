<form action="api/add_que.php" method="post">
<fieldset>
  <legend>新增問券</legend>
  <table>
    <tr>
      <td>問券名稱：<input type="text" name="name" id=""><br></td>
    </tr>
    <tr>
      <td class="opt">選項：<input type="text" name="opt[]" id=""><button type="button" onclick="more()">更多</button><br></td>
    </tr>
  </table>
<div class="ct"><input type="submit" value="新增"><input type="reset" value="清空"></div>
</fieldset>
</form>
<script>
  function more(){
    let str = `選項：<input type="text" name="opt[]" id=""><br>`;
    $(".opt").prepend(str);
  }
</script>