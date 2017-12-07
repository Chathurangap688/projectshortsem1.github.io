<?php ob_start(); ?>
<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<form>
	<div>
		<h4>
			<a href="Show1.php">Show your image</a>
		</h4>
	</div>
	<div>
		<h4>
			<a href="newimg.php">Save your image</a>
		</h4>
	</div>
	<div>
		<h4>
			<a href="delete1.php">Delete your image</a>
		</h4>
	</div>
</form>
</body>
</html>