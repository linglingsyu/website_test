<?php

if (empty($_GET['id'])) {
  $id = 0;
} else {
  $id = $_GET['id'];
}

?>

<div class="one">
  電影：<select name="movie" id="movie"></select><br>
  日期：<select name="date" id="date"></select><br>
  場次：<select name="session" id="session"></select><br>
  <button onclick="shift()">確定</button><button>重置</button>
</div>


<style>
  .tb {
    display: flex;
    flex-wrap: wrap;
    width: 375px;
    height: 400px;
  }

  .two {
    display: none;
  }

  .seat {
    width: 75px;
    height: 100px;
    flex-shrink: 0;
  }

  .no {
    background: url(icon/03D02.png) no-repeat center;
  }

  .yes {
    background: url(icon/03D03.png) no-repeat center;
  }
</style>

<div class="two">
  <div class="tb">
  </div>
  <div>您選擇的電影是：<span id="m"></span></div>
  <div>您選擇的時刻是：<span id="t"></span></div>
  <div>您已經勾選了<span id="o">0</span>張票，最多可以購買四張票</div>
  <button onclick="prev()">回上一步</button><button onclick="booking()">完成訂購</button>
</div>


<script>
  function booking() {

    let movie = $("#movie").val();
    let date = $("#date").val();
    let session = $("#session").val();
    $.post("api/bo.php",{movie,date,session,seat},function(no){
        location.href=`?do=res&no=${no}`;
    }) 
  }

  function shift() {
    $(".one").hide();
    $(".two").show();
  }

  function prev() {
    $(".one").show();
    $(".two").hide();
  }


  getm();

  function getm() {
    let id = <?= $id ?>;
    $.post("api/getm.php", {
      id
    }, function(res) {
      $("#movie").html(res);
      $("#movie").on("click", function() {
        gett();
      })
      gett();
    })
  }

  function gett() {
    let movie = $("#movie").val();
    $.post("api/gett.php", {
      movie
    }, function(res) {

      $("#date").html(res);
      $("#date").on("click", function() {
        gets();
      })
      gets();
    })
  }


  function gets() {
    let movie = $("#movie").val();
    let date = $("#date").val();
    $.post("api/gets.php", {
      movie,
      date
    }, function(res) {
      console.log(res);
      $("#session").html(res);
      $("#session").on("click", function() {
        gtb();
      })
      gtb();
    })
  }

  let seat = new Array();

  function gtb() {
    let movie = $("#movie").val();
    let date = $("#date").val();
    let session = $("#session").val();
    let count = 0;
    $("#m").html(movie);
    $("#t").html(date + " " + session);
    $("#o").html("0");
    $.post("api/gtb.php", {
      movie,
      date,
      session
    }, function(res) {
      $(".tb").html(res);
      $(".box").on("click", function() {
        if ($(this).prop("checked")) {
          if (count < 4) {
            count++;
            $("#o").html(count);
            seat.push($(this).val());
          } else {
            $(this).prop("checked", false);
            alert("不可超過四張");
          }
        } else {
          count--;
          $("#o").html(count);
          seat.splice(seat.indexOf($(this).val()), 1);
        }

      })
    })
  }
</script>