<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">校園映像資料管理</p>
	<form method="post" action="api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="65%">校園映像資料圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td></td>
				</tr>
				<?php
				$table=$do;
				$db=new DB($table);
				$rows=$db->all();
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<td><img src="img/<?=$row['name'];?>" style="width:100px;height:68px"></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=($row['sh']==1)?"checked":"";?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
						<input type="hidden" name="table" value="<?= $table; ?>">
						<td><input type="button" value="更換圖片" onclick="op('#cover','#cvr','modal/upload_<?=$table;?>.php?table=<?=$table;?>&id=<?=$row['id'];?>')"></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?table=<?=$table;?>')" value="新增校園映像圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>