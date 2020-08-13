
  <h2>目前位置：首頁 > 分類網誌 > <span id="nav"></span></h2>
  <fieldset style="width:20%;display:inline-block;vertical-align:top">
    <legend>分類網誌</legend>
    <a style="display:block" href="javascript:getlist(1)">健康新知</a>
    <a style="display:block" href="javascript:getlist(2)">菸害防制</a>
    <a style="display:block" href="javascript:getlist(3)">癌症防治</a>
    <a style="display:block" href="javascript:getlist(4)">慢性病防治</a>
  </fieldset>
  <fieldset style="width:70%;display:inline-block;vertical-align:top">
    <legend>文章列表</legend>
    <div id="list"></div>
    <div style="display:none" id="post"></div>
  </fieldset>

  <script>
    getlist(1);
    function getlist(type){
      let arr = ['','健康新知','菸害防制','癌症防治','慢性病防治'];
      $("#nav").html(arr[type]);
      $.post("api/getlist.php",{type},function(res){
        $("#list").html(res);
        $("#list").show();
        $("#post").hide();
      })
    }

    function getpost(id){
      $.post("api/getpost.php",{id},function(res){
        $("#post").html(res);
        $("#list").hide();
        $("#post").show();
      })
    }
    
    
  </script>
