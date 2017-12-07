<?php
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['userName']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
header("location: index.php");
}
else

{	$error='';
	
// Define $username and $password
$username=$_POST['userName'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
session_start();
 require_once('inc/connection.php');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
// Selecting Database
//$db = mysqli_select_db("user", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query="select * from user where pw='$password' AND userName='$username';";
$result=mysqli_query($connection,$query);
//$query = mysqli_query("select * from user where pw='$password' AND username='$username'", $connection);
//print_r($result);
$rows = mysqli_num_rows($result);
//echo $rows;

if ($rows == 1) {
	$row = mysqli_fetch_assoc($result);
$_SESSION['login_user']=$row['userName']; // Initializing Session
//echo $row['userName'];
$myObj->userName = $row['userName'];
//$myObj->age = 30;
//$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
//header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
header("location: index.php");
}
//mysql_close($connection); // Closing Connection
}
}
?>

<?php

?>