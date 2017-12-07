
<?php 
	// session_start();
	 require_once('inc/connection.php');
 ?>

<?php require_once('session.php'); ?>


<?php
$id=$_POST['imgId'];
$folder=$_POST['folder'];
$userName=$login_session;
$file="img/".$userName."/";
 //create user folder
 function idSave($userName,$connection,$id,$imgName,$size)
{	  $quar="INSERT INTO $userName(imgName,imgId,imgZize) VALUES ('$imgName','$id','$size');";

    $result=mysqli_query($connection,$quar);
    

}
if (!file_exists($file)) {
    mkdir($file, 0777, true);
}




$imgName= basename( $_FILES['fileToUpload']['name']);
echo "<br>".$imgName."<br>";
$target_dir =$file;
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.";
    $uploadOk = 0;
}
$size=$_FILES["fileToUpload"]["size"];
// Check file size
if ( $size> 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>The file ". $imgName. " has been uploaded.";  




      //  SaveData($connection,$imgName,$folder,$userName);
        idSave($userName,$connection,$id,$imgName,$size);
    } else {
        echo "<br>Sorry, there was an error uploading your file.";
    }
}

function SaveData($connection, $imgName,$folder,$userName)
{
    //session_start();
   // require_once('inc/connection.php');
    $quar="INSERT INTO photo(imgName,folder,userName) VALUES ('$imgName','$folder','$userName');";

    $result=mysqli_query($connection,$quar);
    if($result){
        echo "<br>1 record added<br>";
    }else{
        echo "<br>Database quary failed<br>";
    }



    mysqli_close($connection);
}
?>









