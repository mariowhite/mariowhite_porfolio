<?php
	
	include 'url.php';

	//session_unset($_SESSION['user']);
	session_start();
	
	//unset($_SESSION['user']);
	
	session_destroy();
		
	header( $base_url. 'index.php' ) ;
	
	
	
?>