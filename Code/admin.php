<?php 

	session_name("ppe_session");
	session_start();

	include("header.php");

	if (empty($_SESSION["login"]))
	{
		header('Location: index.php');
		exit;
	}
?>
	<link rel="stylesheet" type="text/css" href="css/admin.css" media="all" />



