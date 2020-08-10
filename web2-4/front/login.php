<form action="">
<fieldset>
  <legend>會員登入</legend>
  <talbe>
    <tr>
      <td>帳號</td>
      <td><input type="text" name="acc" id="acc"><br></td>
    </tr>
    <tr>
      <td>密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
  </talbe>
<div><button type="button" onclick="login()">登入</button><input type="reset" value="清除"><a href="?do=forget">忘記密碼</a><a href="?do=reg">尚未註冊</a></div>
</fieldset>

</form>
<script>
  function login(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    
    $.post("api/chkacc.php",{acc},function(res){
        if(res == 0){
          alert("查無帳號");
        }else{
          $.post("api/chklogin.php",{acc,pw},function(re){
              if(re == 1){
                if(acc == "admin"){
                  location.href="admin.php";
                }else{
                  location.href="index.php";
                }
              }else{
                alert("密碼錯誤");
              }
          })
        }
    })

  }

</script>