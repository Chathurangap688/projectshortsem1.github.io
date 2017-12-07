
<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "");
session_start();
$user_check=$_SESSION['login_user'];
require_once('inc/connection.php');
		$quar="select userName from user where username='$user_check';";
		
		$result=mysqli_query($connection,$quar);
// Selecting Database
//$db = mysql_select_db("company", $connection);
// Starting Session
// Storing Session

// SQL Query To Fetch Complete Information Of User
//$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysqli_fetch_assoc($result);
$login_session =$row['userName'];
//echo $login_session;
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>