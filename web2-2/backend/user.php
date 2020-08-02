<fieldset>
<legend>帳號管理</legend>
<form action="api/del_user.php"  method="post">
<table>
  <tr>
    <td>帳號</td>
    <td>密碼</td>
    <td>刪除</td>
  </tr>
  <?php
  $rows = $User->all();
  foreach($rows as $row){
  ?>
  <tr>
    <td><?= $row['acc']?></td>
    <td><?= str_repeat("*", strlen($row['pw'])) ?></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id'] ?>"></td>
    <input type="hidden" name="id[]" value="<?=$row['id'] ?>">
  </tr>
  <?php
}
  ?>
</table>
<input type="submit" value="確定刪除"> <input type="reset" value="清空選取">
</form>
</fieldset>


<fieldset>
<legend>新增會員</legend>
<h3>*請設定您要註冊的帳號及密碼(最長12個字元)</h3>
<form>
<table>
<tr>
    <td>Step.1登入帳號</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
  <td>Step.2登入密碼</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
  <td>Step.3再次確認密碼</td>
    <td><input type="password" name="pw2" id="pw2"></td>
  </tr>
  <tr>
  <td>Step.4信箱(忘記密碼時使用)</td>
    <td><input type="text" name="email" id="email"></td>
  </tr>
</table>
<button type="button" onclick="reg()">註冊</button><input type="reset" value="清除">
</form>

</fieldset>

<script>
  function reg(){
    let acc = $("#acc").val();
    let pw = $("#pw").val();
    let pw2 = $("#pw2").val();
    let email = $("#email").val();
    if( acc == "" || pw == "" || pw2 == "" || email==""){
      alert("不可空白")
    }else{
      if(pw != pw2){
        alert("密碼錯誤");
      }else{
        $.post("api/reg.php",{acc,pw,email},function(res){
          if(res !=0 ){
            location.reload();
          }
    })
      }
    }
  }

</script>