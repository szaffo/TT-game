<?php 

	include 'functions.php'; 

	session_start();

	AddLog('public', 'User logged out: '.$_SESSION['username']);

	session_unset();

	session_destroy();

	header('Location: ../');
 ?>