<div class="left-panel dark-bg">
	<div class="viewable">
		<div class="viewable-header">
			<h1><a href="/">philosophic wolf</a></h1>
			<div class="sub-title">articles</div>
		</div>
		<div class="viewable-source">
			<div class="topic-wrapper">
				<div class="nav-header biz-tag">BUSINESS</div>
				<div class="topic-list">
					<ul class="nav">
					<?php for($i=0;$i<count($biz);$i++) {?>
					<li><a href="/posts/<?=$biz[$i]['slug']?>"><?=$biz[$i]['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
			<div class="topic-wrapper">
				<div class="nav-header tech-tag">TECHNOLOGY</div>
					<div class="topic-list">
						<ul class="nav">
						<?php for($i=0;$i<count($tech);$i++) {?>
						<li><a href="/posts/<?=$tech[$i]['slug']?>"><?=$tech[$i]['title']?></a></li>
						<?php } ?>
						</ul>
					</div>
			</div>	
			<div class="topic-wrapper">
			<div class="nav-header art-tag">ART</div>	
				<div class="topic-list">
					<ul class="nav">
					<?php for($i=0;$i<count($art);$i++) {?>
					<li><a href="/posts/<?=$art[$i]['slug']?>"><?=$art[$i]['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>