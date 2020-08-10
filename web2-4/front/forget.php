<fieldset>
<legend>忘記密碼</legend>
<h6>請輸入信箱以查詢密碼</h6>
<input type="text" name="email" id="email">
<div class="sh"></div>
<button onclick="getpw()">尋找</button>
</fieldset>

<script>
  function getpw(){
    let email = $("#email").val();
    $.post("api/forget.php",{email},function(res){
        $(".sh").html(res);
    })
  }

</script>