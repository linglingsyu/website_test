<fieldset>
  <legend>會員註冊</legend>
  <h3>*請設定您要註冊的帳號及密碼(最長12個字元)</h3>
  <form action="">
  <table>
    <tr>
      <td>Step1.登入帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td>Step2.登入密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>Step3.再次確認密碼</td>
      <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
      <td>Step4.信箱(忘記密碼時使用)</td>
      <td><input type="text" name="email" id="email"></td>
    </tr>
  </table>
  <button type="button" onclick="reg()">註冊</button><input type="reset" value="清除">
  </form>
</fieldset>

<script>
  function reg(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let pw2 = $("#pw2").val();
    let email = $("#email").val();
    if(acc == "" || pw == "" || pw2 == "" || email == ""){
      alert("不可空白");
    }else{
      if(pw != pw2){
        alert("密碼錯誤");
      }else{
        $.post("api/chkacc.php",{acc},function(res){
          if(res != 0){
            alert("帳號重複");
          }else{
            $.post("api/reg.php",{acc,pw,email},function(re){
              if(re == 1 ){
                alert("註冊完成，歡迎加入");
                location.reload();
              }
            })
          }
        })
      }
    }
  }
</script>