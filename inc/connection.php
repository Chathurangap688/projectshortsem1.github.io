<?php 
	$connection= mysqli_connect('localhost','root','','pro');

	if( mysqli_connect_errno()){

		die('Database connection fail  ' . mysqli_connect_error());
		//echo "error";
	}else{
		//echo "connection succsessfull";
	}

 ?>