<style>
  fieldset{
    display: inline-block;
    vertical-align: top;
  }
  fieldset a{
    display: block;
  }
</style>


<h2>目前位置：首頁 > 分類網誌 > <span id="nav"></span></h2>

<fieldset>
<legend>分類網誌</legend>
<a href="javascript:getlist(1)">健康新知</a>
<a href="javascript:getlist(2)">菸害防制</a>
<a href="javascript:getlist(3)">癌症防治</a>
<a href="javascript:getlist(4)">慢性病防治</a>
</fieldset>

<fieldset style="width:60%">
<legend>文章列表</legend>
<div class="part"></div>
<div style="display:none" class="all"></div>
</fieldset>

<script>
  getlist(1);
  function getlist(type){
    let arr = ['','健康新知','菸害防制','癌症防治','慢性病防治'];
    $("#nav").html(arr[type]);
    $.post("api/getlist.php",{type},function(res){
        $(".part").html(res);
        $(".all").hide();
        $(".part").show();
    })

  }

  function gettext(id){
    $.post("api/gettext.php",{id},function(res){
        $(".all").html(res);
        $(".all").show();
        $(".part").hide();
    })
    
  }
</script>