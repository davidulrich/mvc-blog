<?php
$comments = $viewModel->get('comments');
$prev_page = (intval($_REQUEST['id']) - 1 <= 0 ? 1 : intval($_REQUEST['id']) - 1);
$next_page = intval($_REQUEST['id']) + 1;
if(!empty($c[0]['content'])) {?>
<div id="page-nav-wrapper">
<div id="loading">loading...</div>
	<div id="page-nav">
		<div id="page-nav-top">
			<a href="/posts/<?=$c[0]['slug']?>/<?=$prev_page?>"><div class="nav-arrow-l <?=(intval($_REQUEST['id']) != 1 ? '' : 'l-grey')?>"> &#8249; </div></a>
			<div id="page-nav-menu"><button class="nav-menu transition" type="button" id="nav-btn"></button></div>
			<a href="/posts/<?=$c[0]['slug']?>/<?=$next_page?>"><div class="nav-arrow-r"> &#8250; </div></a>
		</div>
		<div id="page-nav-sections">
		<a href="/"><div id="logo"></div></a>
		<?php
		if(isset($c[0]['chapters'])) {
		?>
		<div class="section-header">Sections</div>
		<ol>
		<?php for($i=0;$i<count($c[0]['chapters']);$i++) {
			foreach($c[0]['chapters'][$i] as $key => $val) { ?>
			<a href="/posts/<?=$c[0]['slug']?>/<?=$key?>"><li><?=$val?></li></a>
		<?php } } }?>
		</ol>
		<div class="section-header">Share</div>
		<ul>
		<a href="https://www.facebook.com/sharer.php?u=http://www.philosophicwolf.com/posts/<?=$c[0]['slug']?>" target="_blank"><li>Facebook</li></a>
		<a href="https://plus.google.com/share?url=http://www.philosophicwolf.com/posts/<?=$c[0]['slug']?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><li>Google+</li></a>
		</ul>
		</div>
	</div>
</div>
<div class="left-panel">
	<div class="viewable">
		<div class="viewable-header">
		<span class="title"><?=$c[0]['title']?></span><span class="page"><?=$c[0]['page']?></span>
		<div class="sub-title"><?=$c[0]['cur_chapter']?></div>
		</div>
		<div class="viewable-source content-body"><?=$c[0]['content']?></div>
	</div>
</div>
<?php } else { 
include ('pages/nav_panel.php');
}
?>
<div class="right-panel">
<?php if(!isset($comments)) {?>
	<div class="viewable">
		<div class="viewable-header"><span class="title"><?=$c[0]['title']?></span><span class="page"><?=$c[1]['page']?></span><div class="sub-title"><?=$c[1]['cur_chapter']?></div></div>
		<div class="viewable-source content-body"><?=$c[1]['content']?></div>
	</div>
<?php } else { ?>
		<div class="viewable-source content-body">
			<div id="comment-block">
			<div class="viewable-header inch-margin"><span class="title"><?=(empty($comments[0]['name']) ? 'No' : count($comments))?> Comments</span></div>
			<?php if(!empty($comments[0]['body'])) {
				for($i=0;$i<count($comments);$i++) {?>
				<div class="comment-block">
				<div class="comment-block-head"><div><?=$comments[$i]['name']?></div><span><?=date('F j, Y',strtotime($comments[$i]['date']));?></span></div>
				<div class="comment-block-body"><?=$comments[$i]['body']?></div>
				</div>
			
			<?php } }?>

			<form id="comment-form">
			<span>Write a response</span>
			<input type=hidden name="thread" value="<?=$comments[0]['id']?>">
			<input type=text id="p-name" name="poster-name" placeholder="Name*">
			<input type=text id="p-email" name="email" placeholder="Email*">
			<textarea name="body" id="comment-body" placeholder="Write your comment here"></textarea>
			<div id="feedback"></div>
			<a id="submit-comment" href="javascript:void(0);">Submit</a>
			</form>
			</div>
		</div>
<?php } ?>
</div>