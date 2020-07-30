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
					<p class="t cent botli">管理者帳號管理</p>
					<form method="post" action="api/edit_admin.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="34%">帳號</td>
									<td width="34%">密碼</td>
									<td width="7%">刪除</td>

								</tr>
								<?php
								$rows = $User->all();
								foreach($rows as $row){
									
								?>
								<tr>	
									<td width="34%"><input type="text" name="acc[]" value="<?= $row['acc']?> "></td>
									<td width="34%"><input type="password" name="pw[]" value="<?= $row['pw'] ?> "></td>
									<td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id'] ?>" ></td>
									<input type="hidden" name="id[]" value="<?=$row['id'] ?>">
								
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/admin.php&#39;)" value="新增管理者帳號"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
			</div>