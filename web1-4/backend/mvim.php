<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">動畫輪播區管理</p>
	<form method="post"  action="api/edit_mvim.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="68%">動畫圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
<?php
$rows = $Mvim->all();
foreach($rows as $row){
	$chk = $row['sh']? "checked" : "" ;
?>

				<tr>
					<td width="68%"><img src="img/<?=$row['img']?>" style="width:50%"></td>
					<td width="7%"><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$chk?>></td>
					<td width="7%"><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
					<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/edit_mvim.php?id=<?=$row['id']?>&#39;)" value="更新圖片"></td>
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
					<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/mvim.php&#39;)" value="新增動畫圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>