<?php
session_start();
if(isset($_SESSION['userid'])) {
	require('../classes/db.php');
	$db = new DBConnect();
	$post = $_REQUEST['pid'];

	if($db->pqueryi("DELETE FROM posts WHERE id=?",array($post))) {
		echo "OK";
	}
} else {
	echo "You do not have permission to do whatever it is you're trying to do.";
}

?>