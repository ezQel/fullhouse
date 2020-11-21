<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";

$cookie_phone = "phone";

if(!isset($_COOKIE[$cookie_phone])) {
    
} else {

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo 'error';
	
}


$sql = "select fname,lname,phone,email,profilepic,adress,country FROM users where phone={$_COOKIE[$cookie_phone]}";
$result=mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		$fname=$row["fname"];
		$lname=$row["lname"];
		$email=$row["email"];
		$adress=$row["adress"];
		$fone=$row["phone"];
		$country=$row["country"];
        $picture=$row["profilepic"];
	}
}
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initialscale=1.0">
<link rel="icon" type="image/png" sizes="32x32" href="favcon.png">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

</head>
<body>

<!--navbar-->

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse"
data-target="#example-navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="#"><img  src="assets/iconfiles/icon.png"></a>
</div>
<div class="collapse navbar-collapse" id="example-navbar-collapse">
<ul class="nav navbar-nav">
<li ><a href="index.php">Home</a></li>
<li class="dropdown">
<a href="" class="dropdown-toggle" data-toggle="dropdown">
Rentals<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="houses.php">Houses</a></li>
<li><a href="apartments.php">Apartments</a></li>
<li><a href="hostels.php">Hostels</a></li>
<li><a href="shops.php">Shops</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
Accommodation<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="hotels.php">Hotels</a></li>
<li><a href="lodges.php">Lodges</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
More<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="parking.php">Parking Lots</a></li>
<li class="divider"></li>
<li><a href="camping.php">Camping Sites</a></li>
</ul>
</li>
<!--conditional i.e should appear if user has logged in
else login menu appears
-->

<?php
$cookie_name = "user";

if(!isset($_COOKIE[$cookie_name])) {
    echo'<li ><a href="Login.php">Login</a></li>';
} else {
    echo '
<li class="active" ><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';}
?>
<!--/conditional-->

</ul>
<!--search-->
<div>
<form action="search.php" method="GET" class="navbar-form navbar-right" role="search">
<div class="input-group form-group ">
<input type="search"  name="term" class="form-control" placeholder="Search...">
<span class="input-group-btn">
<button type="submit" class="btn btn-default" type="button">
<span class="glyphicon glyphicon-search"></span>
</button></span>
</div></form>

</div>

<!--/search-->


<!--conditional i.e should appear if user has logged in-->
<?php
$cookie_name = "user";

if(!isset($_COOKIE[$cookie_name])) {
    
} else {
    echo '<div  class="navbar-right">
<p class="navbar-text" > <a href="logout.php" class="navbar-link "><span class="glyphicon glyphicon-log-out"></span> Logout ('.$_COOKIE[$cookie_name].')</a></p>
</div>' ;
}
?>
<!--/conditional-->



</nav>

<!--/navbar-->



<!--container-->
<div class="container">


<div class="row">
<div class="col-md-4 col-sm-6">
<br><br><br>
<ul class="nav nav-pills nav-stacked">
<li class="active">

<a href="profile.php">
Profile<span class="glyphicon glyphicon-user pull-right"></span>
</a>
</li>
<li><a href="edit_profile.php">Edit <span class="glyphicon glyphicon-pencil pull-right"></span></a></li>
<li>

</ul>

</div>
<div class="col-md-4 col-sm-6">
<br><br><br>

<div class="list-group">
<div class="list-group-item ">
<h4 class="list-group-item-heading"> [ Profile ]</h4>
</div>
<div class="list-group-item ">
<img height="100px" width="100px" src="<?php echo $picture;?>"/>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading">
Full Name
</h4>
<p class="list-group-item-text">
<?php
echo $fname." ".$lname;
?>
</p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading">
Phone
</h4>
<p class="list-group-item-text">
<?php
echo $fone;
?>

</p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading">
Email
</h4>
<p class="list-group-item-text">
<?php
echo $email;
?>

</p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading">
Address
</h4>
<p class="list-group-item-text">
<?php
echo $adress;
?>

</p>
</div>
<div class="list-group-item">
<h4 class="list-group-item-heading">
Country
</h4>
<p class="list-group-item-text">
<?php
echo $country;
?>

</p>
</div>


</div>
</div>

<div class="col-md-4 col-sm-6">
<br><br><br>
<div class="list-group">
<div class="list-group-item">
<h4 class="list-group-item-heading"> [ Property ]</h4>
</div>


<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";

$cookie_phone = "phone";

if(!isset($_COOKIE[$cookie_phone])) {
    
} else {

$con1 = mysqli_connect($servername, $username, $password, $dbname);
if (!$con1) {
    echo 'error';
	
}

$sql = "select propertyname FROM property where owner={$_COOKIE[$cookie_phone]}";
$result=mysqli_query($con1, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
	echo '<div class="list-group-item">'.$row["propertyname"].'</div>';
        
	}
}
}





?>


</div>

</div>

</div>


</div>
<!--/container-->


<!--footer-->

<div class="footer ">
<hr>
<div class="container">
<div class="row">

<div class="col-md-4">
<h4>Contact Us</h4>
<p>
Email: support@fullhouse.com<br>
Phone: +2540200466354<br>
P.O BOX 2932<br>
NAIROBI, KENYA.<br>
</p>
</div>

<div class="col-md-4">
<h4>Social</h4>
<p>
<a href="http://www.facebook.com/fullhouse" >Facebook</a><br>
<a href="http://www.twitter.com/fullhouse" >Twitter</a><br>
<a href="http://www.instagram.com/fullhouse" >Instagram</a><br>
<a href="http://www.plus.google.com/fullhouse" >Google+</a><br>

</p>
</div>
<div class="col-md-4">
<h4>Navigate</h4>
<p>
<a href="#" >FAQ</a><br>
<a href="about.php" >About Us</a><br>
<a href="unavailable.php" >Privacy policy</a><br>
<a href="unavailable.php" >Terms of Use</a><br>

</p>
</div>


</div>
<div >
&copy 2018 Fullhouse All Rights Reserved
</div>
</div>
</div>

<!--/footer-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

