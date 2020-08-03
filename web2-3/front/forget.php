

<h3>請輸入信箱以查詢密碼</h3>
<input type="text" name="email" id="email">
<div class="pw"></div>
<button onclick="findpw()">尋找</button>

<script>
  function findpw(){
    let email = $("#email").val();
    $.post("api/findpw.php",{email},function(res){
      if(res != 0){
        $(".pw").html(`您的密碼為:${res}`);
      }else{
        $(".pw").html(`查無此資料`);
      }
    })
  }
</script>