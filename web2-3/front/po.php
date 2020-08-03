<style>
  .one,.two,.list,.post{
    display: inline-block;
  }
  .one a {
    display: block;
  }
  .one{
    width:15%;
    vertical-align: top;
  }
  .two{
    width:60%;
  }

</style>
<h3>目前位置：首頁 > 分類網誌 > <span id="nav"></span></h3>
<fieldset class="one">
  <legend>分類網誌</legend>
  <a href="#" onclick="getlist(1)">健康新知</a>
  <a href="#" onclick="getlist(2)">菸害防治</a>
  <a href="#" onclick="getlist(3)">癌症防治</a>
  <a href="#" onclick="getlist(4)">慢性病防治</a>
</fieldset>
<fieldset class="two">
  <legend>文章列表</legend>
  <div class="list"></div>
  <div style="display:none;" class="post"></div>
</fieldset>

<script>
  let arr = ['健康新知','菸害防治','癌症防治','慢性病防治']
  getlist(1);
  function getlist(i){
    $("#nav").html(arr[i-1]);
    $.post("api/getlist.php",{"type":i},function(res){
      $(".list").html(res);
      $(".list").show();
      $(".post").hide();
    }) 
  }
  function getpost(id){
    $.post("api/getpost.php",{id},function(res){
      $(".list").hide();
      $(".post").html(res);
      $(".post").show();
    }) 
  }


</script>