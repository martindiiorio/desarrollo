<?php
	require_once("soporte.php");
	$auth->logout();
	header("location:index.php");exit;
?>