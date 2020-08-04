<?php
$today = date("Y-m-d");
$ondate  = date("Y-m-d", strtotime("-2days"));
$rows = $Movie->all(['sh' => 1], " && `date` <= '$today' && `date` >= '$ondate'");
$movie = $Movie->find($_GET['id']);
?>

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
  <input type="button" value="確定" onclick="booking()"><input type="reset" value="重置">
</div>

<style>
  #booking {
    display: none;
  }

  .booking {
    width: 300px;
    ;
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
        <input class="chk" type="checkbox"  name="chk<?= $i ?>" id="chk<?=$i?>">
      </div>
    <?php
    }
    ?>

  </div>

  <hr>

<p>您選擇的電影是：<span id="m"></span> </p>
<p>您選擇的時刻是：<span id="t"></span></p>
<p>您已經勾選了<span id="q"></span>張票，最多可以購買四張票</p>
<button type="buttom" onclick="prev()">上一步</button> <button type="button" onclick="finish()">完成訂購</button>
</div>



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
      console.log(options);
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
      console.log(sessions);
      $("#session").html(sessions);
    })
  }


  function booking() {
    $("#order").hide();
    $("#booking").show();
    $("#m").html($("#movie option:selected").text());
    $("#t").html($("#date option:selected").text()+ "&nbsp;&nbsp;" + $("#session option:selected").text());
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

  function finish(){
    let id = $("#movie").val();
    let date = $("#date").val();
    let session = $("#session").val();
    $.post("api/order.php",{id,date,session,count},function(res){
      console.log(res);
    });
    // location.href=`?do=result&id=${id}&date=${date}&session&${session}`;
  }

</script>