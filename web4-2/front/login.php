<h1>第一次購物</h1>
<div><a href="?do=reg"><img src="icon/0413.jpg" alt=""></a></div>

<form action="" method="post">
<h1>會員登入</h1>
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

<script>
function login(){
  let acc = $("#acc").val();
  let pw = $("#pw").val();
  let num = $("#num").val();
  if(<?=$c?> == num){
    $.post("api/login.php",{acc,pw},function(res){
        if(res == "1"){
          location.href="index.php";
        }else{
          alert("帳號或密碼錯誤");
        }
    })
  }else{
    alert("驗證碼錯誤");
  }
}

</script>