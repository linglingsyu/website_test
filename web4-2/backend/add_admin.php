<h1>新增管理者帳號</h1>
<form action="api/add_admin.php" method="post">
<table>
  <tr>
    <td>帳號</td>
    <td><input type="text" name="acc" id=""></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="pw" id=""></td>
  </tr>
  <tr>
    <td>權限</td>
    <td>
    <input type="checkbox" value="1" name="pr[]">商品分類與管理<br>
    <input type="checkbox" value="2" name="pr[]">訂單管理<br>
    <input type="checkbox" value="3" name="pr[]">會員管理<br>
    <input type="checkbox" value="4" name="pr[]">頁尾版權區管理<br>
    <input type="checkbox" value="5" name="pr[]">最新消息管理<br>

    </td>
  </tr>
</table>
<input type="submit" value="新增"><input type="reset" value="重置">
</form>