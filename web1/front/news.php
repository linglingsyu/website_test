<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
		<?php

		$db = new DB("ad");
		$rows = $db->all(['sh' => 1]);
		foreach ($rows as $row) {
			echo $row['text'];
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		}

		?>

	</marquee>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div class="ct">更多消息顯示區</div>
	<hr>
	<ul class="ssaa" style="list-style-type:decimal;">
		<?php
		$db = new DB("news");
		$div = 5;
		$nowpage = empty($_GET['page']) ? 1 : $_GET['page'];
		$total = $db->count(['sh' => 1]);
		$totalpage = ceil($total / $div);
		$start = ($nowpage - 1) * $div;
		$rows = $db->all(['sh' => 1], " limit $start,$div");
		foreach ($rows as $row) {
		?>
			<li class="sswww"><?= mb_substr($row['text'], 0, 10) ?>...
				<div class="all" style="display:none;"><?= $row['text'] ?></div>
			</li>
		<?php
		}
		?>
	</ul>
	<div style="text-align:center;">
		<a class="bl" style="font-size:30px;" href="?do=news&page=<?= $_GET['page']-1 ?>">&lt;&nbsp;</a>
		<?php
			for($i = 1; $i <= $totalpage ; $i++){
				$size =  ( $nowpage == $i)? "24px" : "16px";
				echo '<a style="padding:0 10px;font-size:'.$size.'" href="?do=news&page='.$i.'">'.$i.'</a>';
			}
		?>
		<a class="bl" style="font-size:30px;" href="?do=news&page=<?= $_GET['page']+1 ?>">&nbsp;&gt;</a>
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