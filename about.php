
<!DOCTYPE html>
<html>
<head>
<title>Fullhouse | About Us</title>
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
<li><a href="index.php">Home</a></li>
<li class="dropdown">
<a href="" class="dropdown-toggle" data-toggle="dropdown">
Rentals<b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="rentals.html">Houses</a></li>
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
<li ><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';}
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
<div class="row">

<div class="col-md-4 col-sm-12 ">
<h4>Watch our Youtube Video</h4>
 <iframe width="350" height="300"
src="http://www.youtube.com/embed/XGSy3_Czz8k">
</iframe> 
</div>
<div class="col-md-4 col-sm-12">

<h3>About Fullhouse</h3>
<p><b>FullHouse</b> is the most convenient place to easily find hotel accommodation, rental houses/apartments and more in few and easy steps. Landlords and hotel managers can also create an account and
post their property for advertising. Creating an account is free and landlord/ hotel manager dont have to pay anything to have their property listed.
</p>
</div>
<div class="col-md-4 col-sm-12 abt">
<h3>Feedback</h3>
<form role="form" action="feedback.php"method="POST">
<div class="form-group">
    <label for="email">Full Name:</label>
    <input type="text" class="form-control" placeholder="e.g ezekiel kalama" name="fullname" id="email" required >
  </div>
<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="ezekiel.kalama@gmail.com" id="email" required>
  </div>
  
 <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" name="comment" placeholder="enter your message..." id="comment" maxleghth="200" size="200" required></textarea>
</div>
<button type="submit" class="btn btn-default">Send</button>
</form>
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
<a href="unavailable.php" >FAQ</a><br>
<a href="unavailable.php" >About Us</a><br>
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
