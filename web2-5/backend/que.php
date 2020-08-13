<form action="api/que.php" method="post">
<fieldset>
  <legend>新增問卷</legend>
  <table>
    <tr>
      <td>問券名稱：<input type="text" name="name"><br></td>
    </tr>
    <tr>
      <td id="opt">選項：<input type="text" name="opt[]"><button type="button" onclick="more()">更多</button></td>
    </tr>
  </table>
<input type="submit" value="新增"><input type="reset" value="清空">
</fieldset>
</form>

<script>
  function more(){
    let str = `選項：<input type="text" name="opt[]"><br>`;
    $("#opt").prepend(str);
  }
</script>