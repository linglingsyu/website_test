<?php
$today = date("Y-m-d");
$ondate  = date("Y-m-d", strtotime("-2days"));
$rows = $Movie->all(['sh' => 1], " && `date` <= '$today' && `date` >= '$ondate'");
$movie = $Movie->find($_GET['id']);
?>
  <form action="api/order.php" method="post">
<div id="order">
  電影名稱<select name="movie" id="movie">
    <?php
    foreach ($rows as $row) {
    ?>
      <option value="<?= $row['id'] ?>" <?= ($row['id'] == $movie['id'] ? "selected" : "") ?>><?= $row['name'] ?></option>
    <?php
    }
    ?>
  </select><br>
  日期<select name="date" id="date">

  </select><br>
  場次<select name="session" id="session"></select><br>
  剩餘座位：<span id="q"></span><br>
  <input type="button" value="確定" onclick="booking()"><input type="reset" value="重置">
</div>

<style>
  #booking {
    display: none;
  }

  .booking {
    width: 300px;
    display: flex;
    flex-wrap: wrap;

  }

  .seat {
    position: relative;
    font-size: 12px;
    width: 50px;
    margin: 0 5px;
    height: 60px;
    line-height: 60px;
    background: url(icon/03D02.png) no-repeat center;
  }

  .chk {
    position: absolute;
    z-index: 99;
  }
</style>
<div id="booking">
  <div class="booking">
    <?php
 
    for ($i = 1; $i <= 20; $i++) {
      $col = floor(($i - 1) / 5) + 1;
      $row = (($i - 1) % 5) + 1;
    ?>
      <div class="seat">
        <?= $col . "排" . $row . "號"; ?>
        <input class="chk" type="checkbox"  name="chk[]" value="<?= $i ?>">
      </div>
    <?php
    }
    ?>
  </div>

  <hr>

<p>您選擇的電影是：<span id="m"></span> </p>
<p>您選擇的時刻是：<span id="t"></span></p>
<p>您已經勾選了<span id="q"></span>張票，最多可以購買四張票</p>
<button type="buttom" onclick="prev()">上一步</button> <input type="submit" value="完成訂購">
</div>
  </form>



<script>
  getdate();
  $("#movie").on("change", function() {
    getdate();
  })

  function getdate() {
    let id = $("#movie").val();
    $.post("api/getdate.php", {
      id
    }, function(options) {
      $("#date").html(options);
      getsession();
      $("#date").on("change", function() {
        getsession();
      })
    })
  }

  function getsession() {
    let id = $("#movie").val();
    let date = $("#date").val();
    $.post("api/getsession.php", {
      id,
      date
    }, function(sessions) {
      $("#session").html(sessions);
      getqt(); 
    })
  }


  function booking() {
    $("#order").hide();
    $("#booking").show();
    $("#m").html($("#movie option:selected").text());
    $("#t").html($("#date option:selected").text()+ "&nbsp;&nbsp;" + $("#session option:selected").text());
  }

  function getqt(){
    let date = $("#date").val();
    let session = $("#session").val();
    let id = $("#movie").val();
    $.post("api/qt.php",{id,date,session},function(res){
      // console.log(res);
      $("#q").html(res+"張");
    })
  }


  let count = 0;
  $(".chk").on("change",function(){
      //用attr是取得"checked這個字串，而用prop會取得布林值"
    let chk = $(this).prop("checked");
    if(chk){
      if(count>=4){
      alert("只能選4張");
      $(this).prop("checked",false);
      }else{
        count++;
      }
    }else{
      count--;
    }
    $("#q").html(count);
  })

  function prev(){
    $("#order").show();
    $("#booking").hide();
  }


</script>