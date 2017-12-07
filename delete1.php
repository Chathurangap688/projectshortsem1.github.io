<?php
include('session.php');
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	
	Image ID:
	<form action="delete.php" method="POST">
		<dir><input type="text" name="imgId"></dir>
		<dir><input type="submit" name="submit" value="Delete"></dir>
	</form>


</body>
</html>