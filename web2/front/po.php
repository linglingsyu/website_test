
<style>
  .div{
    display: flex;
  }
</style>
<p> 目前位置：首頁 > 分類網誌 > <span id="nav"></span></p>
<div class="div">
<fieldset style="width:100px;">
  <legend>分類網誌</legend>
  <a style="display:block" class="item" href="javascript:getlist(1)">健康新知</a>
  <a style="display:block" class="item" href="javascript:getlist(2)">菸害防制</a>
  <a style="display:block" class="item" href="javascript:getlist(3)">癌症防治</a>
  <a style="display:block" class="item" href="javascript:getlist(4)">慢性病防治</a>
</fieldset>

<fieldset style="width:400px;">
  <legend>文章列表</legend>
  <div class="list"></div>
  <div style="display:none" class="post"></div>
</fieldset>
</div>
<script>
  let arr = ["健康新知","菸害防制","癌症防治","慢性病防治"];
  getlist(1);
  function getlist(e){
    $("#nav").html(arr[e-1]);
    $.get("api/get_list.php",{'type':e},function(list){
        $(".list").html(list); 
        $(".list").show();
        $(".post").hide();  
    })
  }
  function getpost(id){
    $.get("api/get_post.php",{id},function(post){
        $(".post").html(post);
        $(".list").hide();
        $(".post").show();
    })
  }
</script>