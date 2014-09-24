<!DOCTYPE html>
<html>
<head>
<?php $c = $viewModel->get('content');
if(!empty($c)) {?>	
<meta content="<?=$c[0]['title']?>" itemprop="headline" property="og:title" />
<meta content="<?=$c[0]['title']?> | PhilosophicWolf" name="title"/>
<meta content="<?=$c[0]['summary']?>" itemprop="description" name="description" property="og:description"/>
<meta name="description" content="<?=$c[0]['summary']?>">
<meta content="article" property="og:type"/>
<meta content="http://www.philosophicwolf.com/<?=$c[0]['slug']?>" itemprop="url" property="og:url"/>
<?php } else { ?>
<meta content="PhilosophicWolf" itemprop="headline" property="og:title" />
<meta content="PhilosophicWolf" name="title"/>
<meta content="A blog for all things business, technology and art" itemprop="description" name="description" property="og:description"/>
<meta name="description" content="A blog for all things business, technology and art">
<meta content="http://www.philosophicwolf.com" itemprop="url" property="og:url"/>
<?php } ?>
<meta content="http://www.philosophicwolf.com/images/logo-small.png" itemprop="thumbnailUrl" property="og:image"/>
<meta content="PhilosophicWolf" property="og:site_name"/>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title><?php echo $viewModel->get('pageTitle'); ?></title>
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/css/normalize.css">
<link rel="stylesheet" href="/css/global.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<?php require("header.php");?>
  <?php $biz = $viewModel->get('biz'); $tech = $viewModel->get('tech'); $art = $viewModel->get('art');?>
		<?php require($this->viewFile); ?>
	<?php require("footer.php");?>

</body>
<script>
var pw_ns = {
	pages: 1,
	cur_page: <?=($_REQUEST['id'] != "" ? $_REQUEST['id'] : 0)?>,
	slug: "<?=(isset($c[0]['slug']) ? $c[0]['slug'] : 0)?>",
};
</script>
</html>
<script src="/js/main.js" type="text/javascript"></script>
<script src="http://code.jquery.com/mobile/1.4.3/jquery.mobile-1.4.3.min.js"></script>