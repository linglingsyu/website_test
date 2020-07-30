<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<!--正中央-->
				<table width="100%">
					<tbody>
						<tr>
							<td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=admin" style="color:#000; text-decoration:none;">後台管理區</a></td>
							<td><button onclick="location.href='index.php?do=login'" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
						</tr>
					</tbody>
				</table>
				<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<p class="t cent botli">頁尾版權資料管理</p>
					<form method="post" action="api/add_bottom.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td>頁尾版權資料：</td>
									<?php
									$row = $Bottom->find(1);
								?>
								<input type="hidden" name="id" value="<?= $row['id'] ?>">
									<td><input type="text" name="bottom" value="<?= $row['bottom']?> "></td>
								</tr>

							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
			</div>