<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動態文字廣告管理</p>
  <form method="post"  action="api/total.php">
  <?php
    $row = $Total->find(1);
  ?>

		<table width="100%">
			<tbody>
				<tr >
					<td>進站總人數</td>
          <td><input type="text" name="total" value="<?=$row['total']?>"></td>
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