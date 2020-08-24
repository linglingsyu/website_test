<h1>會員註冊</h1>
<form action="">
<table>
  <tr>
    <td>姓名</td>
    <td><input type="text" name="name" id="name"></td>
  </tr>
  <tr>
    <td>帳號</td>
    <td><input type="text" name="acc" id="acc"><button type="button" onclick="chkacc()">檢測帳號</button></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td>電話</td>
    <td><input type="text" name="tel" id="tel"></td>
  </tr>
  <tr>
    <td>住址</td>
    <td><input type="text" name="addr" id="addr"></td>
  </tr>
  <tr>
    <td>電子信箱</td>
    <td><input type="text" name="email" id="email"></td>
  </tr>
</table>
<button type="button" onclick="reg()">登入</button><input type="reset" value="重置">
</form>

<script>

  function chkacc(){
    let acc = $("#acc").val();
    if(acc != "admin"){
      $.post("api/chkacc.php",{acc},function(res){
      if(res == "1"){
        alert("此帳號已存在");
      }else{
        alert("此帳號可使用");
      }
    })
    }else{
      alert("不可用admin註冊");
    }
  }

  function reg(){
    let acc = $("#acc").val();
    let name = $("#name").val();
    let pw = $("#pw").val();
    let tel = $("#tel").val();
    let addr = $("#addr").val();
    let email = $("#email").val();
    if(acc != "admin"){
      $.post("api/reg.php",{acc,pw,name,tel,addr,email},function(res){
 
        location.href="?do=login";

    })
    }
  }

</script>