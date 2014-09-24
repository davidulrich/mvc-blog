<?php include ('pages/nav_panel.php'); ?>
<div class="right-panel">
	<div class="s-viewable">
		<div class="viewable-header">
		<span class="title"><?=$c[0]['title']?></span>
		<div class="sub-title">Published <?=date('F j, Y',strtotime($c[0]['date']));?> &#9830; <?=$c[0]['pages']?> pages</div>
		</div>
		<div class="viewable-source content-body"><?=$c[0]['summary']?>
		<a class="read-article transition" href="/posts/<?=$c[0]['slug']?>/1">Read more &#187;</a>
		</div>
	</div>
</div>