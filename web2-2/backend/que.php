
<form action="api/addque.php" method="post">
<table>
  <tr>
    <td>問券名稱</td>
    <td><input type="text" name="name" id=""></td>
  </tr>
  <tr >
    <td colspan="2" id="more">
    選項<input type="text" name="text[]" id=""><button type="button" onclick="more()">更多</button>
    </td>
  </tr>
</table>
<input type="submit" value="新增">|<input type="reset" value="清空">
</form>


<script>
  function more(){
    let str =  `
    選項<input type="text" name="text[]" id=""><br>
    `;
    $("#more").prepend(str);
  }
</script>


