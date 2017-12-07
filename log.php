<?php
//session_start(); // Starting Session
$error=''; // Variable To Store Error Message
	
// Define $username and $password

$username=$_GET['userName'];
$password=$_GET['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
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
$myObj=new \stdClass();

if ($rows == 1) {
	$row = mysqli_fetch_assoc($result);
//$_SESSION['login_user']=$row['userName']; // Initializing Session
//echo $row['userName'];
$myObj->username = $row['userName'];
$myObj->password = $row['pw'];
//$myObj->age = 30;
//$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
//header("location: profile.php"); // Redirecting To Other Page
} else {
echo "err";
}
//mysql_close($connection); // Closing Connection


?>

