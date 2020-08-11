
				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">最新消息資料管理</p>
					<form method="post"  action="api/edit_news.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="68%">最新消息資料內容</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
								</tr>
								<?php
									$div = 5;
									$nowpage = empty($_GET['p']) ? 1 : $_GET['p'] ;
									$totalpage = ceil(($News->count())/$div);
									$start = ($nowpage-1)*$div;
									$rows = $News->all([]," limit $start,$div");
								foreach($rows as $row){
									$chk = $row['sh'] ? "checked" : "" ;
								?>
									<tr>	
									<td width="68%"><textarea name="text[]" id="" cols="30" rows="10"><?=$row['text']?></textarea></td>
									<td width="7%"><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>></td>
									<td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
									<input type="hidden" name="id[]" value="<?=$row['id']?>">
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/news.php&#39;)" value="新增最新消息資料"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
					<div class="cent">
							<?php
									if($nowpage > 1){
										echo '<a href="?do=news&p='.($nowpage-1).'"> < </a>' ;
									}
									for($i=1; $i <= $totalpage ; $i++){
										$size = ($i == $nowpage) ? "24px;" : "16px;";
										echo '<a style="padding:5px;font-size:'.$size.'" href="?do=news&p='.$i.'">'.$i.'</a>' ;
									}

									if($nowpage < $totalpage){
										echo '<a href="?do=news&p='.($nowpage+1).'"> > </a>' ;
									}

							
							?>
					</div>
				</div>
		