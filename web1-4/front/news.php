<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
</marquee>
<h1>更多最新消息顯示區</h1>
<hr>
<!--正中央-->

<div style="display:block;">
		<ol  class="ssaa" style="list-style-type:decimal;">
			<?php
			$div = 5;
			$nowpage = empty($_GET['p']) ? 1 : $_GET['p'];
			$totalpage = ceil($News->count()/$div);
			$start = ($nowpage-1)*$div;
			$rows = $News->all(['sh' => 1]," limit $start,$div");
			foreach ($rows as $row) {
			?>
				<li><?= mb_substr($row['text'], 0, 20) ?>...
					<div class="all" style="display:none"><?= $row['text'] ?></div>
				</li>
			<?php
			}
			?>
		</ol>
</div>
<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>

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

<div style="text-align:center;">
	<div>


	<?php

if($nowpage > 1){
	echo '<a  class="bl" href="?do=news&p='.($nowpage-1).'"> < </a>';
}

		for($i=1;$i<=$totalpage;$i++){
			$size = ($i == $nowpage) ? "24px" : "16px";
			echo '<a class="bl" style="font-size:'.$size.';" href="?do=news&p='.$i.'">'.$i.'</a>';
		}

		
		if($nowpage <  $totalpage){
			echo '<a class="bl" href="?do=news&p='.($nowpage+1).'"> > </a>';
		}

	?>

	</div>
</div>