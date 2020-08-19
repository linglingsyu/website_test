<div class="ord">
  <form action="">
    電影：<select name="name" id="name">
      <?php
      $today = date("Y-m-d");
      $ondate = date("Y-m-d", strtotime("-2 days"));
      $movie = $Movie->all(['sh' => 1], " && `date` >= '$ondate' && `date` <= '$today' ");
      foreach ($movie as $m) {
        $chk = ($m['id'] == $_GET['id']) ? "selected" : "";
      ?>
        <option value="<?= $m['id'] ?>" <?= $chk ?>><?= $m['name'] ?></option>
      <?php
      }
      ?>
    </select><br>
    日期：<select name="date" id="date"></select><br>
    場次：<select name="session" id="session"></select><br>
    <button type="button" onclick="go()">送出</button><input type="reset" value="重置">
  </form>
</div>


<style>
  .seat {
    display: flex;
    flex-wrap: wrap;
    width: 410px;
  }

  .item {
    width: 80px;
    height: 90px;
    border: 1px solid #000;
    text-align: center;
  }

  .aaa {
    display: none;
  }

  .checked{
    background:url(icon/03D02.png) no-repeat center;
  }

  .null{
    background:url(icon/03D03.png) no-repeat center;
  }


  #checkbox {
    float: right;
  }
</style>
<div class="aaa">
  <div class="seat">

  </div>
  <div id="m"></div>
  <div id="t"></div>
  <div id="o"></div>
  <button onclick="back()">回上一步</button> <button onclick="checkout()">完成訂購</button>
</div>





<script>
  getdate();
  $("#name").on("change", function() {
    getdate();
  })

  function getdate() {
    let movie = $("#name").val();
    $.post("api/getdate.php", {
      movie
    }, function(res) {

      $("#date").html(res);

      getsession();

      $("#date").on("change", function() {
        getsession();
      })
    })
  }


  function getsession() {
    let m_id = $("#name").val();
    let date = $("#date").val();
    $.post("api/getsession.php", {
      m_id,
      date
    }, function(res) {
      $("#session").html(res);
    })
  }


  function go() {
    $(".ord").hide();
    $(".aaa").show();
    let movie = $("#name option:selected").text();
    let date = $("#date").val();
    let session = $("#session").val();
    // console.log(movie,date,session);
    gettable(movie,date,session);
    $("#m").html(`您選擇的電影是：${movie}`)
    $("#t").html(date+" "+session);
    $("#o").html(`您已勾選了0張票，最多可以購買四張票`)
  }

  function gettable(movie,date,session){
    $.post("api/gettable.php",{movie,date,session},function(table){
      // console.log(table);
       $(".seat").html(table);
       booking()
    })
  }

  function back(){
    $(".ord").show();
    $(".aaa").hide();
  }

    let arr = new Array();
  function booking(){
    let count = 0;
    $(".checkbox").on("click",function(){
      let status = $(this).prop("checked");
      // console.log(status);
      if(status){
        if(count < 4){
          count++;
          $("#o").html(`您已勾選了${count}張票，最多可以購買四張票`);
          arr.push($(this).val());
        }else{
          alert("不得超過4張");
          $(this).prop("checked",false);
        }
      }else{
        count--;
        $("#o").html(`您已勾選了${count}張票，最多可以購買四張票`);
        arr.splice(arr.indexOf(($(this).val())),1);
      }
    })
  }

  function checkout(){
    let movie = $("#name option:selected").text();
    let date = $("#date").val();
    let session = $("#session").val();
    $.post("api/checkout.php",{movie,date,session,arr},function(res){
      location.href=`?do=result&no=${res}`;
    })
  }
</script>