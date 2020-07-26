<fieldset>
<legend>會員登入</legend>
<form >
<table>
  <tr>
    <td>帳號</td>
    <td><input type="text" id="acc"></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="password" id="pw" ></td>
  </tr>
  <tr>
    <td><button onclick="login()" type="button">登入</button><input type="reset" value="清除"> <span style="text-align:right"><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></span></td>
  </tr>
</table>
</form>
</fieldset>

<script>

function login(){
  let acc = $("#acc").val();
  let pw = $("#pw").val();
  if( acc!="" &&  pw!="" ){
    $.get("api/chkacc.php",{acc},function(res){
      if(res >= 1){
        $.get("api/chklogin.php",{acc,pw},function(res){
          if(res>=1){
            if(acc=="admin"){
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
}


</script>