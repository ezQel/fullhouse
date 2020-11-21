<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$phone=$_POST["phones"];
$pass=$_POST["password"];
$country=$_POST["country"];

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    echo 'error';
}
$sql = "insert into users(fname,lname,phone,password,country) values('{$fname}','{$lname}','{$phone}','{$pass}','{$country}')";
mysqli_query($con, $sql);


header('location:http://localhost/login');


?>