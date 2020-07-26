<?php

$rows = $User->all();
?>

<fieldset>
  <legend>帳號管理</legend>
  <form action="api/del_user.php" method="post">
  <table>
    <tr>
      <td>帳號</td>
      <td>密碼</td>
      <td>刪除</td>
    </tr>
  <?php
  foreach($rows as $row){
  ?>
    <tr>
      <td width="45%"><?= $row['acc'] ?></td>
      <td width="45%"><?= str_repeat("*",strlen($row['pw']))  ?></td>
      <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
    </tr>
    <?php
      }
  ?>
  </table>
  <div><input type="submit" value="確定刪除"><input type="reset" value="清空選取"></div> 
    </form>
  <h1>新增會員</h1>
  <h6>*請設定您要註冊的帳號及密碼(最長12字元)</h6>
<form>
<table>
  <tr>
    <td>Step1:登入帳號</td>
    <td><input type="text"  id="acc"></td>
  </tr>
  <tr>
    <td>Step2:登入密碼</td>
    <td><input type="password"  id="pw"></td>
  </tr>
  <tr>
    <td>Step3:再次確認密碼</td>
    <td><input type="password"  id="pw2"></td>
  </tr>
  <tr>
    <td>Step4:信箱(忘記密碼時使用)</td>
    <td><input type="text" name="email" id="email"></td>
  </tr>
</table>
<button type="button" onclick="reg()">新增</button><input type="reset" value="清除">
</fieldset>
</form>


</fieldset>

<script>

function reg(){
    let acc= $("#acc").val();
    let pw= $("#pw").val();
    let pw2= $("#pw2").val();
    let email= $("#email").val();

if( acc=="" ||  pw =="" || pw2 == "" || email == ""){
  alert("不可空白");
}else{
  if( pw == pw2){
    $.get("api/chkacc.php",{acc},function(res){
      if(res>=1){
        alert("帳號重複");
      }else{
        $.get("api/reg.php",{acc,pw,email},function(re){
          if(re){
            alert("註冊完成，歡迎加入");
            location.reload();
          }else{
            alert("lose")
          }
        })
      }
    })
  }else{
    alert("密碼錯誤");
  }
}
}



</script>