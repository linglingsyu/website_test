<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	</marquee>
	<div style="height:32px; display:block;">
</div>
	<!--正中央-->


	<h2 class="cent">更多消息區顯示區</h2>
	<hr>
	<ol>
	<?php
	$div = 5;
	$nowpage= !empty($_GET['p'])? $_GET['p'] :1 ;
	$start = ($nowpage-1)*$div;
	$totalpage = ceil(($News->count(['sh'=>1]))/$div);
	$rows = $News->all(['sh'=>1] ,  " limit $start,$div");
	foreach($rows as $row){
?>
		<li class="sswww"><?= mb_substr($row['text'],0,15); ?>
		<div style="display:none" class="all"><?= $row['text']; ?></div></li>
<?php
	}
?>
	</ol>

	<div style="text-align:center;">

		<?php 

		

		if($nowpage > 1){
			echo '<a class="bl" style="font-size:30px;" href="?do=news&p='.($nowpage-1).'">&lt;&nbsp;</a> ';
		}


			for($i = 1; $i <= $totalpage ;$i++){
				$size = ($i== $nowpage) ? "24px" : "16px" ;
				echo '<a style="font-size:'.$size.'" href="?do=news&p='.$i.'">'.$i.'</a>';
			}


			if($nowpage < $totalpage){
		echo '<a class="bl" style="font-size:30px;" href="?do=news&p='.($nowpage+1).'">&nbsp;&gt;</a> ';

			}

		?>

	</div>
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