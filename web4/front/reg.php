<h2>會員註冊</h2>
姓名: <input type="text" name="name" id="name"><br> 
帳號: <input type="text" name="acc" id="acc"><button onclick="chkacc()">檢測帳號</button><br> 
<div id="chkacc"></div>
密碼: <input type="password" name="pw" id="pw"><br> 
電話: <input type="text" name="tel" id="tel"><br> 
電子信箱: <input type="text" name="email" id="email"><br> 
地址: <input type="text" name="addr" id="addr"><br>
<button type="button" onclick="reg()">註冊</button>

<script>

function reg(){
  let name = $("#name").val();
  let acc = $("#acc").val();
  let pw = $("#pw").val();
  let tel = $("#tel").val();
  let email = $("#email").val();
  let addr = $("#addr").val();
  if(acc != "admin"){
    $.post("api/reg.php",{name,acc,pw,tel,email,addr},function(res){
        alert("註冊成功");
        location.reload();
    })
  }else{
    alert("不得使用admin註冊帳號");
  }

}




function chkacc(){
  let acc = $("#acc").val();
  if(acc != "admin"){
    $.post("api/chkacc.php",{acc},function(res){
      if(res == "0"){
        $("#chkacc").html("此帳號可使用");
      }else{
        $("#chkacc").html("此帳號已存在");
      }
    })
  }else{
    alert("不得使用admin註冊帳號");
  }

}

</script>