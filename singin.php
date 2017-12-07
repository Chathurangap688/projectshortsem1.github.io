<!DOCTYPE html>
<html>
<head>
	<?php require_once('inc/connection.php'); ?>
	<title>Sing In</title>
</head>
<body>
	<?php 

	//function for save data to database
	function singin($connection,$userName,$pw,$Fname,$Lname)
	{//session_start();

		$quar="INSERT INTO user(F_name,L_name,userName,pw) VALUES ('$Fname','$Lname','$userName','$pw');";
		$result=mysqli_query($connection,$quar);
		//header("location: indexi.php");
		if($result){
			//header("location: indexii.php");
			userimg($userName,$connection);
			echo "<br>1 record added<br>";
			//header("location: index.php");
		}else{
			echo "<br>Database quary failed<br>";
		}
		//mysqli_close($connection);
	}
function userimg($userName,$connection)
{	//header("location: indexi.php");
	$quary="CREATE TABLE `pro`.`$userName` ( `ID` INT(4) NOT NULL AUTO_INCREMENT , `imgId` INT(10) NOT NULL , `imgName` VARCHAR(200) NOT NULL , `imgZize` VARCHAR(200) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
	
	$result=mysqli_query($connection,$quary);
		
	if($result){
		header("location: index.php");
	}



	# code...
}


function check($userName,$connection)
{
	//require_once('inc/connection.php');
	$quary="select *from user where userName='$userName'";
	$result=mysqli_query($connection,$quary);
	$rows = mysqli_num_rows($result);
	if($rows!=0){
		header("location: index.php");
		$message="User Name allredy exists";
		//echo "<script type='text/javascript'>alert('$message');</script>";
			//header("location: singinNew.php");
			//echo "User Name allredy exists<br>Try <br> <a href='singinNew.php'>with onothor User Name</a>";


		echo $message;
	}

}


	check($_POST['userName'],$connection);
	if(isset($_POST['submit'])){
		$file="img/".$_POST['userName']."/";
		//check userName ollrady used
		if (!file_exists($file)) {
			//create directarry <-- userName
			mkdir($file, 0777, true);
			//enter user data to database table-->user
			singin($connection,$_POST['userName'],$_POST['pw'],$_POST['Fname'],$_POST['Lname']);

		}else{
			$message="User Name allredy exists";
			echo "<script type='text/javascript'>alert('$message');</script>";
	
			echo "User Name allredy exists<br>Try <br> <a href='singinNew.php'>with onothor User Name</a>";

		}






	}
		mysqli_close($connection);
//header("location: index.php");
	?>

</body>
</html>