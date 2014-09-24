<?php
require('../classes/db.php');
$db = new DBConnect();

$email = $_REQUEST['email'];
$pass = $_REQUEST['password'];
session_start();

$c = $db->pquery("SELECT password FROM users WHERE email=?",array($email));
	if(!empty($c[0]['password'])) {
		if(password_verify($pass,$c[0]['password'])){
			if($c[0]['password'] != '0'){
				$v = $db->pquery("SELECT name FROM users WHERE email=?",array($email));
					if(!empty($v[0]['name'])) {
						$_SESSION['userid'] = $v[0]['name'];
						header("Location: /admin");
					}
			}
		} else {
			echo "Invalid credentials";
		}
	} else {
		echo "Invalid credentials";
	}
?>