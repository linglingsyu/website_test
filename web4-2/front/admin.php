

<form >

<?php
$a = rand(10,99);
$b = rand(10,99);
$c = $a+$b;

?>
帳號：<input type="text" name="acc" id="acc"><br>
密碼：<input type="password" name="pw" id="pw"><br>
驗證碼：<?=$a."+".$b ."="?><input type="text" name="num" id="num"><br>
<button type="button" onclick="login()">登入</button><input type="reset" value="重置">
</form>
<button onclick="location.href='index.php'">返回</button>

<script>
function login(){
  let acc = $("#acc").val();
  let pw = $("#pw").val();
  let num = $("#num").val();
  if(<?=$c?> == num){
    $.post("api/admin.php",{acc,pw},function(res){
        if(res == "1"){
          location.href="admin.php";
        }else{
          alert("帳號或密碼錯誤");
        }
    })
  }else{
    alert("對不起，您輸入的驗證碼有誤請您重新登入");
  }
}

</script>