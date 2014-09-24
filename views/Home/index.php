<?php include ('pages/nav_panel.php'); ?>
<div class="right-panel">
		<div class="bi-column bc-left">
		<div class="viewable-header">
			<span class="title">the blog</span>
		</div>
		<p>How exciting!  You've stumbled upon yet another blog in the vast expanse of the Internet.
		Here you'll find many rantings, ramblings and musings of - as those headlines suggest - art, business and technology.</p>
		<p>You may find the blog experience here different from many other conventional blogs (read: WordPress), as this is my very own, built from the ground up.
		You'll probably find this blog entertaining if you're more of a <strong>reader</strong> and less of a <strong>numbered-list</strong> kind of person (see: <em>Buzzfeed</em>).
		<div class="quote"><em>The Top 1 Thing You Need to Know About PW</em>: There are no numbered lists.</div>
		</p>
		<p>If you're on mobile, you can swipe left or right with your fingers to change pages.</p>
		<div class="featured-header">
			<span class="title">featured</span>
		</div>
		<?php $f = $viewModel->get('featured'); ?>
		<div id="featured">
			<div><a href="/posts/<?=$f[0]['slug']?>">
			<img src="/images/<?=$f[0]['pic']?>">
			<div><?=ucwords($f[0]['category'])?></div>
			<div><h2><?=$f[0]['title']?></h2></div></a>
			</div>
		</div>
		</div>
		<div class="bi-column bc-right">
		<div class="viewable-header">
			<span class="title">biography</span>
		</div>
		<div class="photo"><img src="/images/david-u.jpg"><div class="caption">David Ulrich</div></div>
		<p>A bit of an entrepreneur, musician and part-time philosopher.</p>
		<p>I am the co-founder and COO of CarePond, a community that connects caregivers around the world.  Prior to that, I served as the CEO and Chairman of InSense Systems, a company that designed and delivered  advanced computational support systems.</p>
		<p>Technology, art and business are my passions -- so I've created a blog to share my tidbits of knowledge with the rest of the world.</p>
		<div class="social">
			<a href="https://www.facebook.com/david.ulrich.87" title="Facebook" target="_blank"><img src="/images/Facebook.png"></a>
			<a href="https://www.facebook.com/david.ulrich.87" title="Twitter" target="_blank"><img src="/images/Twitter.png"></a>
			<a href="https://www.linkedin.com/profile/view?id=341996549" title="LinkedIn" target="_blank"><img src="/images/Linkedin.png"></a>
			<a href="https://www.facebook.com/david.ulrich.87" target="_blank"><img src="/images/Google.png"></a>
		</div>
		</div>
</div>