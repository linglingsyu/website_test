
<?php
$a = rand(10,99);
$b = rand(10,99);
$c = $a+$b;
?>

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
      $.post("api/admin.php",{acc,pw},function(res){
        // console.log(res);
          if(res == "1"){
            location.href="admin.php";
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