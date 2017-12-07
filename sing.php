
<?php 
$message="";
function singin($connection,$userName,$pw,$Fname,$Lname)
	{//session_start();

		$quar="INSERT INTO user(F_name,L_name,userName,pw) VALUES ('$Fname','$Lname','$userName','$pw');";
		$result=mysqli_query($connection,$quar);
		//header("location: indexi.php");
		if($result){
			//header("location: indexii.php");
			userimg($userName,$connection);
			//echo "<br>1 record added<br>";
			//header("location: index.php");
		}else{
			$message="erro";
			msg($message);
			//echo "<br>Database quary failed<br>";
		}
		//mysqli_close($connection);
	}




	function check($userName,$connection)
{
	//require_once('inc/connection.php');
	$quary="select *from user where userName='$userName'";
	$result=mysqli_query($connection,$quary);
	$rows = mysqli_num_rows($result);
	if($rows!=0){
		
		$message="User Name allredy exists";
		msg($message);
	
	}else{
		singin($connection,$_POST['userName'],$_POST['password'],$_POST['Fname'],$_POST['Lname']);

	}

}

function userimg($userName,$connection)
{	//header("location: indexi.php");
	$quary="CREATE TABLE `$userName` ( `ID` INT(4) NOT NULL AUTO_INCREMENT , `imgId` INT(10) NOT NULL , `imgName` VARCHAR(200) NOT NULL , `imgZize` VARCHAR(200) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
	
	$result=mysqli_query($connection,$quary);
		
	if($result){
		$file="img/".$userName."/";
		mkdir($file, 0777, true);
		$message="ok";
		msg($message);
	}else{
		$message="erro";
		msg($message);
	}



	# code...
}

function msg($message)
{
	$myObj=new \stdClass();
	$myObj->status=$message;

	$myJSON = json_encode($myObj);

	echo $myJSON;
	
	# code...
}



	
	
	 require_once('inc/connection.php'); 
	if(($_POST['password']!==null && $_POST['userName']!==null && $_POST['Lname']!==null && $_POST['Fname']!==null)){

		check($_POST['userName'],$connection);

	}else{
		$message="Plz enter val";
		msg($message);
	}

 ?>