<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php include_once "marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<h3 class="cent">更多最新消息</h3>
	<hr>
	<?php

	//分頁相關參數，包含撈資料庫必須加limit
	$total = $News->count(['sh' => 1]);
	$num = 5;
	$pages = ceil($total / $num);
	$now = $_GET['p'] ?? 1;
	$start = ($now - 1) * $num;

	$news = $News->all(['sh' => 1], " LIMIT $start,$num");
	?>
	<ol start="<?= $start + 1; ?>">
		<?php
		foreach ($news as $n) {
			echo "<li class='sswww'>";
			echo mb_substr($n['text'], 0, 20, "utf8");
			echo "<span class='all' style='display:none'>";
			echo $n['text'];
			echo "</span>";
			echo "</li>";
		}
		?>
	</ol>
	<div class="cent">
		<?php
		// 往前
		if (($now - 1) > 0) {
			echo "<a href='?do=news&p=" . ($now - 1) . "' style='text-decoration:none'> < </a>";
		}

		// 中間的頁數
		for ($i = 1; $i <= $pages; $i++) {
			$fontsize = ($now == $i) ? "35px" : "25px";
			echo "<a href='?do=news&p=$i' style='text-decoration:none;font-size:$fontsize'>$i</a>";
		}
		// 往後
		if (($now + 1) <= $pages) {
			echo "<a href='?do=news&p=" . ($now + 1) . "' style='text-decoration:none'> > </a>";
		}
		?>
	</div>
</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
				"top": $(this).offset().top - 50
			})
			$("#alt").show()
		}
	)
	$(".sswww").mouseout(
		function() {
			$("#alt").hide()
		}
	)
</script>