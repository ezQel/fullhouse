<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";
$fname=$_POST["fullname"];
$lname=$_POST["email"];
$phone=$_POST["comment"];

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    echo 'error';
}
$sql = "insert into feedback(fullname,email,feedback) values('{$fname}','{$lname}','{$phone}')";
mysqli_query($con, $sql);


header('location:http://localhost/');


?>