<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
	</marquee>
	<div style="height:32px; display:block;">
		<h3>更多消息顯示區</h3>
		<hr>
		<ol class="ssaa">
		<?php
			$div = 5;
			$nowpage = empty($_GET['p']) ? 1 : $_GET['p'];
			$totalpage = ceil(($News->count()) / $div);
			$start = ($nowpage - 1) * $div;
			$rows = $News->all([], " limit $start,$div");
			foreach ($rows as $row) {
			?>
				<li><?= mb_substr($row['text'], 0, 20) ?>...
					<div style="display:none" class="all"><?= $row['text'] ?></div>
				</li>
			<?php
			}
			?>
		</ol>

		<div style="text-align:center;">
		<?php
		if ($nowpage > 1) {
			echo '<a href="?do=news&p=' . ($nowpage - 1) . '"> < </a>';
		}
		for ($i = 1; $i <= $totalpage; $i++) {
			$size = ($i == $nowpage) ? "24px;" : "16px;";
			echo '<a style="padding:5px;font-size:' . $size . '" href="?do=news&p=' . $i . '">' . $i . '</a>';
		}
		if ($nowpage < $totalpage) {
			echo '<a href="?do=news&p=' . ($nowpage + 1) . '"> > </a>';
		}

		?>
	</div>
	
	</div>

	<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
	<!--正中央-->
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".ssaa li").hover(
		function() {
			$("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
			$("#altt").show()
		}
	)
	$(".ssaa li").mouseout(
		function() {
			$("#altt").hide()
		}
	)
</script>