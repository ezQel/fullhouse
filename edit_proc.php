<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$cookie_phone = "phone";

if(!isset($_COOKIE[$cookie_phone])) {
    
} else {
$newfilename="assets/userpics/".$_COOKIE[$cookie_phone].".jpg";

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

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $newfilename)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "fullhouse";

$cookie_phone = "phone";

$conn = mysqli_connect($servername, $username, $pwd, $dbname);
if (!$conn) {
    echo 'error';
	
}
echo $_POST["fname"];

$sql = "update users set fname='{$_POST["fname"]}', lname='{$_POST["lname"]}', email='{$_POST["email"]}',password='{$_POST["password"]}',country='{$_POST["country"]}',profilepic='{$newfilename}' where phone={$_COOKIE[$cookie_phone]}";
mysqli_query($conn, $sql);
     
	 echo"changes done";
	
}
//header('location:http://localhost/profile');

?>