<style>
  fieldset{
    display: inline-block;
  }

  fieldset a{
    display: block;
  }

  .one{
    width:30%;
    vertical-align:top;
  }

  .two{
    width:60%
  }


</style>

<h2>目前位置：首頁 >　分類網誌　> <span id="nav"></span></h2>
  

<fieldset class="one">
<legend>分類網誌</legend>
<a class="item" href="javascript:nav(1)">健康新知</a>
<a class="item" href="javascript:nav(2)">菸害防制</a>
<a class="item" href="javascript:nav(3)">癌症防治</a>
<a class="item" href="javascript:nav(4)">慢性病防治</a>


</fieldset>

<fieldset class="two">
<legend>文章列表</legend>

<div class="list"></div>
<div class="text" style="display:none"></div>


</fieldset>


<script>
  let arr = ['健康新知','菸害防制','癌症防治','慢性病防治'];
  nav(1);
function nav(i){
  $("#nav").html(arr[i-1]);
  $.post("api/po.php",{"type":i},function(res){
    $(".list").html(res);
    $(".list").show();
    $(".text").hide();
  })
}

function gettext(id){
  $.post("api/getpo.php",{id},function(res){
    $(".list").hide();
    $(".text").html(res);
    $(".text").show();
  })
}

</script>