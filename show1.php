<?php ob_start(); ?><?php
include('session.php');
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	Image ID:
	<form action="show.php" method="POST">
		<dir><input type="text" name="imgid"></dir>
		<dir><input type="submit" name="submit"></dir>
	</form>


</body>
</html>