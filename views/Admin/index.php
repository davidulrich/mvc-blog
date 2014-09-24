<div class="left-panel">
	<div class="viewable">
<?php
if(!isset($_SESSION['userid'])) {?>
<form id="login" action="/ajax/login.php">
<input type=text name="email" placeholder="Email">
<input type=password name="password" placeholder="Password">
<input type=submit>
</form>
<?php echo $_SESSION['userid'];} else {?>
<h2>New Blog Post</h2>
<form id="new-post" action="/ajax/submit.php" method="POST">
<input type=text name="title" placeholder="Post title">
<input type=text name="summary" placeholder="Summary">
<select name="category">
<option value="technology">Technology</option>
<option value="business">Business</option>
<option value="art">Art</option>
</select>
<div id="post-pages"><input type=text name="chapter-1" placeholder="Chapter name (optional)"><textarea name="page-1"></textarea></div>
<a id="post-blog" href="javascript:add_page();">Add page</a>
<div id="post-page-count"><input type='hidden' name='page-count' value=1></div>
<input type=submit value="Post Blog">
</form>

<?php } ?>
	</div>
</div>
<div class="right-panel">
	<div class="viewable">
<h2>Current Posts</h2>
<table>
<?php $p = $viewModel->get('posts');
 if(!empty($p[0]['id'])) {
 	for($i=0;$i<count($p);$i++) {?>
<tr><td><?=$p[$i]['title']?></td><td><a href="javascript:void(0);" class="rmv" data-ref="<?=$p[$i]['id']?>">Delete</a></td></tr>
 	<?php } } ?>
 </table>
	</div>
</div>