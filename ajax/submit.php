<?php
require('../classes/db.php');
$db = new DBConnect();
session_start();
if(isset($_SESSION['userid'])) {
	$pages = $_REQUEST['page-count'];
	$title = $_REQUEST['title'];
	$slug = str_replace(' ',"-",strtolower(preg_replace('~[\\\\/:*?"<>|\\\']~', '', $title)));
	$summary = $_REQUEST['summary'];
	$cat = $_REQUEST['category'];
	
	//create thread
	if($db->pqueryi("INSERT INTO posts(title,date,summary,slug,category,pages) VALUES(?,NOW(),?,?,?,?)",array($title,$summary,$slug,$cat,$pages))) {
		$lastid = $db->lastid();
		for($i=1;$i<=$pages;$i++) {
			//convert each page to HTML-parsable
			$pre = $_REQUEST['page-'.$i];
			$post = '';
		    foreach (explode("\n", $pre) as $line) {
		        if (trim($line)) {
		            $post .= '<p>' . $line . '</p>';
		        }
		    }
			$db->pqueryi("INSERT INTO pages(ref,content,page,chapter) VALUES(?,?,?,?)",array($lastid,$post,$i,$_REQUEST['chapter-'.$i]));
		}
		header("Location: /admin");
	}

	
} else {
	echo "Access denied";
}

?>