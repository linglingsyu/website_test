

<div class="div">
<div>電影：<select name="movie" id="movie"></select></div>
<div>日期：<select name="date" id="date"></select></div>
<div>場次：<select name="session" id="session"></select></div>
<button onclick="next()">確定</button><button>重置</button>
</div>

<style>
  .div2{
    display: none;
  }

  .div3{
    display: flex;
    flex-wrap: wrap;
    width:210px;
  }
  .seat{
    width:40px;
    flex-shrink: 0;
    height:80px;
  }
  .ok{
    background: url(icon/03D02.png) no-repeat center ;
  }

  .null{
    background: url(icon/03D03.png) no-repeat center ;
  }

  .chkbox{
   float:right;
  }

</style>

<div class="div2">
  <div class="div3">

  </div>
  <div>您選擇的電影是：<span id="m"></span></div>
  <div>您選擇的時刻是：<span id="t"></span></div>
  <div>您已勾選了<span id="tt">0</span>張票，最多可以購買4張票</div>
  <div><button onclick="back()">回上一步</button><button onclick="booking()">完成訂購</button></div>
</div>



<script>

function back(){
  $(".div").show();
  $(".div2").hide();
 
}

function next(){
  $(".div").hide();
  $(".div2").show();
 
}

function gettable(){
   let movie = $("#movie").val();
   let date = $("#date").val();
   let session = $("#session").val();
    // console.log(movie,date,session);
  $.post("api/gettable.php",{movie,date,session},function(res){
    $(".div3").html(res);
    aaa();
  })
}

function aaa(){
     let movie = $("#movie").val();
     let date = $("#date").val();
     let session = $("#session").val();
     let count = 0;
     let seat = new Array();
    $("#m").html(movie);
    $("#t").html(date+"  "+session);
    $(".chkbox").on("click",function(){
  
  if($(this).prop("checked")){
    if(count<4){
      count++;
      seat.push($(this).val());
    }else{
      alert("不得超過4張");
      $(this).prop("checked",false);
    }
  }else{
    count--;
    seat.splice(seat.indexOf($(this).val()),1);
  }
  $("#tt").html(count);

})
}

function booking(){

}

getmovielist()
function getmovielist(){
  let id = <?= !empty($_GET['id'])?$_GET['id'] : 0 ; ?>;
  $.post("api/getmovielist.php",{id},function(res){
    $("#movie").html(res);
    $("#movie").on("change",function(){
      getdatelist();
    })
    getdatelist();
  })
}

function getdatelist(){
  let movie = $("#movie").val();
  $.post("api/getdatelist.php",{movie},function(re){
    $("#date").html(re);
    $("#date").on("change",function(){
      getsession();
    })
    getsession();
  })
}

function getsession(){
  let date =  $("#date").val();
  let movie = $("#movie").val();
  $.post("api/getsession.php",{date,movie},function(re){
    // console.log(re);
    $("#session").html(re);
    $("#session").on("change",function(){
      gettable();
    })
    gettable();
  });
}


</script>