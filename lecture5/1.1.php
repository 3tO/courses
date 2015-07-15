<?php
	session_start();
	$_SESSION['login'] = 'admin';
	$_SESSION['password'] = 'qwerty';
		
	print "<meta charset='utf-8'>";

		if ($_SESSION['login'] == $_POST['login'] and $_SESSION['password'] == $_POST['password'] ) {
			print "Welcome ";
			print "{$_SESSION['login']}";
			$_SESSION['status_in'] = 'true';
			print "<br><a href='1.2.php'>вихід<a> ";
			
		} else {
			header('Location: 1.php?i=w');
			

		}

?>
