<fieldset>
<legend>會員登入</legend>
<form action="">
帳號:<input type="text" name="acc" id="acc"><br>
密碼:<input type="password" name="pw" id="pw"><br>
<div style="float:left"><button type="button" onclick="login()">登入</button> <input type="reset" value="清除"></div>
</form>
<div style="float:right"><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></div>

</fieldset>

<script>
  function login(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    $.post("api/chkacc.php",{acc},function(res){
      if(res == "1"){
        $.post("api/chklogin.php",{acc,pw},function(re){
            if(re == 1){
              if(acc == 'admin'){
                 location.href="admin.php";
              }else{
                location.href="index.php";
              }
            }else{
              alert("密碼錯誤");
            }
        })
      }else{
        alert("查無帳號");
      }
    })
  }

</script>