<?php
if(!empty($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = 0;
}
?>
<div class="one">
電影：<select name="movie" id="movie"></select><br>
日期：<select name="date" id="date"></select><br>
場次：<select name="session" id="session"></select><br>
<button onclick="next()">確定</button><button>重置</button>
</div>

<style>

  .two{
    display: none;
  }
  .tb{
    display: flex;
    width:250px;
    flex-wrap:wrap;
  }
  .seat{
    width:50px;
    height:80px;
    flex-shrink: 0;
  }
  .no{
    background:url(icon/03D02.png) no-repeat center;
  }

  .yes{
    background:url(icon/03D03.png) no-repeat center;
  }

</style>

<div class="two">
    <div class="tb">
    </div>
    <div>您選擇的電影是：<span id="m"></span></div>
    <div>您選擇的時刻是：<span id="t"></span></div>
    <div>您已勾選了<span id="o">0</span>張票，最多可以勾選四張。</div>
    <button onclick="prev()">回上一步</button><button onclick="booking()">完成訂購</button>
</div>

<script>

  function booking(){
    let movie = $("#movie").val();
    let date  = $("#date").val();
    let session =  $("#session").val();
    $.post("api/booking2.php",{movie,date,session,seat},function(no){
      console.log(no);
          location.href=`?do=result&no=${no}`;
    })
  }

function next(){
  $(".two").show();
  $(".one").hide();
}


function prev(){
  $(".two").hide();
  $(".one").show();
  $("#o").html("0");
}

getmovie();
function getmovie(){
  let id = <?=$id?>;
  $.post("api/getmovie.php",{id},function(res){
    $("#movie").html(res);
    $("#movie").on("change",function(){
      getdate();
    })
    getdate();
  })
}

function getdate(){
  let movie = $("#movie").val();
  // let id = <?=$id?>;
  $.post("api/getdate.php",{movie},function(res){
    $("#date").html(res);
    $("#date").on("change",function(){
      getsess();
    })
    getsess();
  })
}


function getsess(){
  let movie = $("#movie").val();
  let date  = $("#date").val();
  $.post("api/getsess.php",{movie,date},function(res){
    $("#session").html(res);
    $("#session").on("change",function(){
        gettb();
    })
    gettb();
  })
}

let seat = new Array();
function gettb(){
  let movie = $("#movie").val();
  let date  = $("#date").val();
  let session =  $("#session").val();
    $("#m").html(movie);
    $("#t").html(date+" "+session);
  
  $.post("api/gettb.php",{movie,date,session},function(res){
     $(".tb").html(res);
     let count = 0;
     $(".box").on("click",function(){
     if($(this).prop("checked")){
       if(count<4){
          count++;
          $("#o").html(count);
          seat.push($(this).val());
       }else{
        $(this).prop("checked",false);
        alert("不可超過四張");
       }
     }else{
        count--;
        $("#o").html(count);
        seat.splice(seat.indexOf($(this).val()),1);
     }
    });
  })
}


</script>