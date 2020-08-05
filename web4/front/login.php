<h3> 第一次購物</h3>
<a href="?do=reg"><img src="icon/0413.jpg" alt=""></a>
<h3>會員登入</h3>
<?php
$a = rand(10,99);
$b = rand(10,99);
$c = $a+$b;
?>
帳號：<input type="text" name="acc" id="acc"><br>
密碼：<input type="password" name="acc" id="acc"><br>
驗證碼：<?= $a ."+" . $b . "=" ?><input type="text" name="num" id="num"><br>
<button onclick="login()">確認</button>


<script>
  function login(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let num = $("#num").val();
    if(<?= $c ?> == num){
      $.post("api/login.php",{acc,pw},function(res){
        if(res != "0"){
          location.href="index.php"
        }else{
          alert("帳號或密碼錯誤");
        }
      })
    }else{
      alert("驗證碼錯誤");
      location.reload();
    }
  }
</script>