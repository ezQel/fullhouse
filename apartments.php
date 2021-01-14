<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";




$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo 'error';
}
$sql = "select propertyname,location,price_rate,propertypic,owner FROM property where category='apartments'";
$result=mysqli_query($conn, $sql);


?>


<!DOCTYPE html>
<html>
<head>
<title>Apartments</title>
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
<li class="dropdown active" >
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
    echo'<li  ><a href="Login.php">Login</a></li>';
} else {
    echo '
<li  ><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';
}
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
<br><br><br>

<!--row-->
<div class="row">
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
	echo '<div class="col-sm-6 col-md-3">
<a href="'.$row["propertypic"].'" class="thumbnail">
<img class="property" src="'.$row["propertypic"].'"
alt="'.$row["propertyname"].'">
</a>

<table class="table ">
<caption>  '.$row["propertyname"].'</caption>
<tr>
<td><span class="glyphicon glyphicon-map-marker"></span> '.$row["location"].'</td>
<td><span class="glyphicon glyphicon-usd"></span>'.$row["price_rate"].'/month</td>
<td> <a href="tel:'.$row["owner"].'"><span class="glyphicon glyphicon-earphone"></span></a></td>
</tr>

</table>
</div>';
        
	}

}
?>
</div>
<!--/row-->



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
<a href="unavailable.php" >FAQ</a><br>
<a href="about.php" >About Us</a><br>
<a href="unavailable.php" >Privacy policy</a><br>
<a href="unavailable.php" >Terms of Use</a><br>

</p>
</div>


</div>
<div class="">
&copy 2018 Fullhouse All Rights Reserved
</div>
</div>
</div>

<!--/footer-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

