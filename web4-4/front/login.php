
<?php
$a = rand(10,99);
$b = rand(10,99);
$c = $a+$b;
?>


<h1>第一次購買</h1><a href="?do=reg"><img src="icon/0413.jpg" alt=""></a>

<h1>會員登入</h1>
<table>
  <tr>
    <td>帳號</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td>驗證碼</td>
    <td><?=$a."+".$b."="?><input type="text" name="num" id="num"></td>
  </tr>
</table>
<button onclick="login()">登入</button>

<script>
  function login(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let num = $("#num").val();

    if(num == <?=$c?>){
      $.post("api/login.php",{acc,pw},function(res){
        // console.log(res);
          if(res == "1"){
            location.href="index.php";
          }else{
            alert("帳號密碼錯誤");
            location.reload();
          }
      })
    }else{
      alert('對不起，您輸入的驗證碼有誤請您重新登入');
    }
  }

</script>