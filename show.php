<?php ob_start(); ?><?php
include('session.php');
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		require_once('inc/connection.php'); ?>
</head>
<body>
	<?php 

	$userName=$login_session;
	$id=$_POST['imgid'];

	getimageName($userName,$id,$connection);
	function getimageName($userName,$id,$connection)
	{
		
		
		$quar="select imgName from $userName where imgId=$id; ";
      //  echo $quar;
		$result=mysqli_query($connection,$quar);
		if($result){
			$GLOBALS['result']= 1;
			
			$GLOBALS['row']  = mysqli_fetch_assoc($result);
			


			
		}else{
			$GLOBALS['result']= 0;
			echo "<br>Database quary failed<br>";
			$im="notfound.jpg";


		}

		
	}
	
	?>
	<p>
		<?php
		if($GLOBALS['result']==1){
			$im= $userName."/".$GLOBALS['row']['imgName'];
			if($im==$userName."/"){
				$im="notfound.jpg";
			}
		}else{
			$im="notfound.jpg";

		}
		echo $im."<br>";
		echo "<img src='img/".$im."'>"; 

		mysqli_close($connection);
		?>
	</p>
</body>
</html>