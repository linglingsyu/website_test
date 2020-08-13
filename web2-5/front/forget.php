<h2>請輸入電子信箱以查詢密碼</h2>
<input type="text" name="email" id="email"><br>
<div id="pw"></div>
<button onclick="findpw()">尋找</button>

<script>
  function findpw(){
    let email = $("#email").val();
    $.post("api/forget.php",{email},function(res){
      $("#pw").html(res);
    })
  }
</script>