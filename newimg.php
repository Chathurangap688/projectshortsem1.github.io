<?php ob_start(); ?><?php require_once('session.php'); ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Uplode</title>
 	<link href="style.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 	<div id="content">
		<form action ="uplode.php" method="POST"  enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
 		
 		<dir><input type="file" name="fileToUpload" /></dir>
 		<dir>imgId
 			<input type="text" name="imgId">
 		</dir>
 		<dir>folder
 			<input type="text" name="folder">
 		</dir>
 	<dir>	<input type="submit" name="submit" value="Uplode" /></dir>

 	</form>
 	</div>
 </body>
 </html>