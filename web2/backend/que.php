<fieldset>
  <legend>新增問券</legend>
  <form action="api/add_que.php" method="post">
    <table>
      <tr>
        <td>問券名稱</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td  id="op" colspan="2">選項<input type="text" name="item[]"><button type="button" onclick="more()">更多</button></td>
      </tr>
      <tr>
        <td><input type="submit" value="新增">|<input type="reset" value="清空"></td>
      </tr>
    </table>
  </form>
</fieldset>

<script>
  function more() {
    let str = `選項<input type="text" name="item[]"><br>`;
    $("#op").prepend(str);
  }
</script>