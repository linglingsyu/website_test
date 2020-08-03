<fieldset>
  <legend>新增問卷</legend>
  <form action="api/edit_que.php" method="post">
  <table>
    <tr>
      <td>問卷名稱</td>
      <td><input type="text" name="name" id="name"></td>
    </tr>
    <tr >
      <td id="more">選項<input type="text" name="opt[]"><button type="button" onclick="more()">更多</button></td>
    </tr>
  </table>
  <input type="submit" value="新增"><input type="reset" value="清空">
  </form>
</fieldset>

<script>
  function more(){
    let str = `選項<input type="text" name="opt[]" ><br>`;
    $("#more").prepend(str);
  }
</script>