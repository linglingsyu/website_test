<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
  <?php 
  
  $db = new DB("ad");
  $rows = $db->all(['sh'=>1]);
  foreach($rows as $row){
    echo $row['text'];
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
  }
  
  ?>	

</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<?php

	$db = new DB("user");

	if(!empty($_POST['acc']) && !empty($_POST['pw']) ){
		$chk = $db->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
		if($chk == 1){
			to("admin.php");
		}else{
			echo "<script>alert('帳號或密碼錯誤')</script>";
		}
	}

	?>
	<form method="post" action="?do=login" >
		<p class="t botli">管理員登入區</p>
		<p class="cent">帳號 ： <input name="acc"  type="text"></p>
		<p class="cent">密碼 ： <input name="pw" type="password"></p>
		<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
	</form>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>