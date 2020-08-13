<fieldset>
  <legend>會員註冊</legend>
  <form action="">
  <h2>*請設定您要註冊的帳號及密碼(最長12個字元)</h2>
  <table>
    <tr>
      <td>Step.1登入帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>Step.2登入密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>Step.3再次確認密碼</td>
      <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
      <td>Step.4信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
  </table>
  <button type="button" onclick="reg()">註冊</button> <input type="reset" value="清除">
  </form>
</fieldset>

<script>
  function reg(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let pw2 = $("#pw2").val();
    let email = $("#email").val();

    if( acc== "" || pw == "" || pw2 == "" || email == "" ){
      alert("不可空白");
    }else{
      if(pw == pw2){
        $.post("api/chkacc.php",{acc},function(res){
            if(res == "1"){
              alert("帳號重複");
              location.reload();
            }else{
              $.post("api/reg.php",{acc,pw,email},function(re){
                if(re == "1"){
                  alert("註冊完成，歡迎加入");
                  location.href="?do=login";
                }
              })
            }
        })
      }else{
        alert("密碼錯誤");
      }
    }
  }
</script>