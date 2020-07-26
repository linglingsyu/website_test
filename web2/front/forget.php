請輸入信箱以查詢密碼
<input type="text" id="e">
<div id="show"></div>
<button onclick="find()">尋找</button>


<script>
  function find() {
    let e = $("#e").val();
    $.get("api/forget.php", {
      e
    }, function(res) {
      if (res!=0) {
        $("#show").html("您的密碼是：" + res);
      } else {
        $("#show").html("查無此資料");
      }
    })
  }
</script>