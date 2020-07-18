<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli">最新消息資料管理</p>
	<form method="post" action="api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="65%">最新消息資料</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
				</tr>
				<?php
				$table=$do;
				$db=new DB($table);

				//分頁相關參數，包含撈資料庫必須加limit
$total=$db->count();
$num=4;
$pages=ceil($total/$num);
$now=$_GET['p']??1;
$start=($now-1)*$pages;

				$rows=$db->all([]," LIMIT $start,$num");
				foreach ($rows as $row) {
				?>
					<tr class="cent">
						<td><textarea name="text[]" cols="60" rows="5"><?= $row['text']; ?></textarea></td>
						<td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?=($row['sh']==1)?"checked":"";?>></td>
						<td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
						<input type="hidden" name="id[]" value="<?= $row['id']; ?>">
						<input type="hidden" name="table" value="<?= $table; ?>">
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php
// 往前
if(($now-1)>0){
	echo "<a href='?do=$table&p=".($now-1)."' style='text-decoration:none'> < </a>";
}

// 中間的頁數
for($i=1;$i<=$pages;$i++){
	$fontsize=($now==$i)?"35px":"25px";
	echo "<a href='?do=$table&p=$i' style='text-decoration:none;font-size:$fontsize'>$i</a>";
}
// 往後
if(($now+1)<=$pages){
	echo "<a href='?do=$table&p=".($now+1)."' style='text-decoration:none'> > </a>";
}
			?>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','modal/<?=$table;?>.php?table=<?=$table;?>')" value="新增最新消息資料"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>