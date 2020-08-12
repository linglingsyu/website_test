<h1>會員註冊</h1>
<form action="" method="post">
姓名：<input type="text" name="name" id="name"><br>
帳號<input type="text" name="acc" id="acc"><button type="button"  onclick="chkacc()">檢測帳號</button><span id="chkacc"></span><br>
密碼：<input type="password" name="pw" id="pw"><br>
電話<input type="text" name="tel" id="tel"><br>
住址：<input type="text" name="addr" id="addr"><br>
信箱<input type="text" name="email" id="email"><br>
<button type="button" onclick="reg()">註冊</button><input type="reset" value="重置">
</form>

<script>

  function chkacc(){
    let acc = $("#acc").val();
    if(acc != "admin"){
      $.post("api/chkacc.php",{acc},function(res){
          if(res == "1"){
           $("#chkacc").html("此帳號已被使用");
          }else{
            $("#chkacc").html("此帳號可使用");
          }
      })
    }else{
      alert("不得使用admin註冊");
    }
  }

  
  function reg(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let email = $("#email").val();
    let addr = $("#addr").val();
    let name = $("#name").val();
    let tel = $("#tel").val();

    if(acc != "admin"){
      $.post("api/reg.php",{acc,pw,email,addr,name,tel},function(res){
          if(res == "1"){
            alert("註冊成功");
            location.href="?do=login";
          }else{
           console.log(res);
          }
      })
    }else{
      alert("不得使用admin註冊");
    }
  }



</script>

