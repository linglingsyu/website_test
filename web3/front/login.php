<div id="mm">

帳號: <input type="text" name="acc" id="acc"><br>
密碼: <input type="password" name="pw" id="pw"><br>
<button onclick="login()">登入</button>

  </div>


<script>
  function login(){
    let acc = $("#acc").val();
  let pw  = $("#pw").val();
  if(acc == "admin" && pw == "1234"){
    location.href="admin.php";
  }
  }

</script>