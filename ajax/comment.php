<?php
	require('../classes/db.php');
	$db = new DBConnect();
	
	$ip = inet_pton($_SERVER['REMOTE_ADDR']);
	$email = $_REQUEST['email'];
	$name = $_REQUEST['poster-name'];
	$comment = $_REQUEST['body'];
	$id = $_REQUEST['thread'];

	if($db->pqueryi("INSERT INTO comments(ip,email,name,body,date,ref) VALUES (?,?,?,?,NOW(),?)",array($ip,$email,$name,$comment,$id))) {
		echo "OK";
	} else {
		echo "FAIL";
	}

?>