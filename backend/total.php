<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">進站總人數管理</p>
	<form method="post" action="api/edit_info.php?table=total">
		<table width="100%">
			<tbody>
			<?php
				$table=$do;
				$db=new DB($table);
				$total=$db->find(1);
				?>
				<tr class="cent">
					<td width="50%">進站總人數</td>
					<td width="50%"><input type="number" name="total" value="<?=$total['total'];?>"></td>
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