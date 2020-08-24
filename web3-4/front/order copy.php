
<?php

if(empty($_GET['id'])){
  $id = 0;
}else{
  $id = $_GET['id'];
}

?>

<style>

  .two{
    display: none;
  }

  .table{
    width:225px;
    display: flex;
    flex-wrap: wrap;
  }

  .seat{
    width:45px;
    flex-shrink: 0;
    height:80px;

  }

  .no{
    background: url("icon/03D02.png") no-repeat center;
  }

  .yes{
    background: url("icon/03D03.png") no-repeat center;
  }

</style>

<div class="one">
電影：<select name="movie" id="movie"></select><br>
日期：<select name="date" id="date"></select><br>
場次：<select name="session" id="session"></select><br>
<button onclick="next()">確定</button><button>重置</button>
</div>

<div class="two">

  <div class="table">
fsdf
  </div>
  <div>您選擇的電影是：<span id="m"></span></div>
  <div>您選擇的時刻是：<span id="t"></span></div>
  <div>您已勾選了<span id="o">0</span>張票，最多可以購買四張票</div>
  <button onclick="back()">回上一步</button><button onclick="booking()">完成訂購</button>
</div>

<script>

function next(){
  $(".one").hide();
  $(".two").show();
}

function back(){
  $(".one").show();
  $(".two").hide();
}


let seat = [];

function booking(){
  let movie = $("#movie").val();
  let date = $("#date").val();
  let session = $("#session").val();
  $.post("api/booking.php",{movie,date,session,seat},function(no){
      location.href=`?do=result&no=${no}`;
  })
}

function gettable(){
  let movie = $("#movie").val();
  let date = $("#date").val();
  let session = $("#session").val();
  let count = 0;
  $("#m").html(movie);
  $("#t").html(date+" "+session);
  $.post("api/gettable.php",{movie,date,session},function(res){
    $(".table").html(res);
    $(".chkbox").on("click",function(){
      // console.log($(this).prop("checked"));
      if($(this).prop("checked")){
          if(count<4){
            count++;
            $("#o").html(count);
            seat.push($(this).val());
            console.log(seat);
          }else{
            alert("不可超過4張");
            $(this).prop("checked",false);
          }
      }else{
          count--;
          $("#o").html(count);
          seat.splice(seat.indexOf($(this).val()),1);
      }
   })
  })
}

getmovielist();
function getmovielist(){
  let id = <?= $id ?>;
  $.post("api/getmovielist.php",{id},function(res){
   // console.log(res);
    $("#movie").html(res);
    $("#movie").on("change",function(){
      getdatelist();
    })
    getdatelist()
  })
}

function getdatelist(){
  let movie = $("#movie").val();
  $.post("api/getdatelist.php",{movie},function(res){
      // console.log(res);
      $("#date").html(res);
      $("#date").on("change",function(){
        getsession();
    })
      getsession();
  })
}

function getsession(){
  let movie = $("#movie").val();
  let date = $("#date").val();
  $.post("api/getsession.php",{movie,date},function(res){
      // console.log(res);
      $("#session").html(res);
      $("#session").on("change",function(){
        gettable();
      })
      gettable();
  })
}

</script>