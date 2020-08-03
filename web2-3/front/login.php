<fieldset>
  <legend>會員登入</legend>
  <form action="">
  帳號<input type="text" name="acc" id="acc"><br>
  密碼<input type="password" name="pw" id="pw"><br>
  <button type="button" onclick="login()">登入</button><input type="reset" value="清除">
  <div style="float:right"><a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a></div>
  </form>
</fieldset>


<script>

function login(){
  let acc = $("#acc").val();
  let pw = $("#pw").val();
  $.post("api/chkacc.php",{acc},function(re){
    if(re != 0){

      $.post("api/chklogin.php",{acc,pw},function(res){
          console.log(res);
        if(res != 0) {
          if(acc == "admin"){
            location.href="admin.php";
          }else{
            location.href="index.php";
          }
        }else{
          alert("密碼錯誤");
          location.reload();
       }   
      })


    }else{

      alert("查無帳號");
        location.reload();
    }
  })
  
 
}


</script>
