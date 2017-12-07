
<?php require_once('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	$id=$_POST['imgId'];
	$userName=$login_session;

	//delete from database
		require_once('inc/connection.php');
		$quar="select imgName from $userName where imgId=$id; ";
		$result=mysqli_query($connection,$quar);
		if($result){
			echo "<br>clear data from database<br>";
		}
			$GLOBALS['row']  = mysqli_fetch_assoc($result);
			$im= "img/".$userName."/".$GLOBALS['row']['imgName'];
	//delete from disk
		$imgName=$GLOBALS['row']['imgName'];
		echo $im;
	//array_map('unlink', glob("img/".$im)); 

unlink($im);
	   mysqli_close($connection);
	?>
	<a href="profile.php">Retern to Home</a>
</body>
</html>