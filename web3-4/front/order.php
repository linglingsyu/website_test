<?php
if(!empty($_GET['id'])){
  $id = $_GET['id'];
}else{
  $id = 0;
}
?>

電影：<select name="movie" id="movie"></select><br>
日期：<select name="date" id="date"></select><br>
場次：<select name="session" id="session"></select><br>
<button>確定</button><button>重置</button>

<script>
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
  })
}

function gettb(){
  let movie = $("#movie").val();
  let date  = $("#date").val();
  let session =  $("#session").val();
}


</script>