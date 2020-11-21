
<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fullhouse";
$nothing="";
if($_POST["phone"]!==$nothing){
$par=$_POST["phone"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    echo 'error';
}

$sql = "select fname,lname,password FROM users where phone={$par}";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		if($row["password"]==$_POST["pwd"]){
			$cookie_name = "user";
		$cookie_value = $row["fname"]." ".$row["lname"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        echo "phone: " . $row["fname"]. " - Password: " . $row["password"]. "<br>";
		//second cookie
		$cookie_phone="phone";
		setcookie($cookie_phone, $par, time() + (86400 * 30), "/"); 
		
		header('location:http://localhost/');
		}
		else  //wrong password
		{	
			$wrong='<div class="alert alert-danger alert-dismissable">
<button  type="button" class="close" data-dismiss="alert"
aria-hidden="true">
&times;
</button>
<span class="glyphicon glyphicon-exclamation-sign" ></span> wrong password.<a href="login.php" class="unavailable"> try again</a>
</div>';
			
		}
    }
} else {
	$wrong='<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert"
aria-hidden="true">
&times;
</button>
<span class="glyphicon glyphicon-exclamation-sign" ></span> User does not exist.<a href="login.php" class="unavailable"> try again</a>
</div>';
    
}

mysqli_close($conn);
}
else
{
	$wrong='<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert"
aria-hidden="true">
&times;
</button>
<span class="glyphicon glyphicon-exclamation-sign" ></span> please input credencials. <!a href="login.php" class="unavailable"> try again</a>
</div>';
	
}
?> 

<!DOCTYPE html>
<html>
<head>
<title>Fullhouse | Login</title>
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
    echo'<li  class="active"><a href="Login.php">Login</a></li>';
} else {
    echo '
<li ><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>';}
?>
<!--/conditional-->

</ul>

<!--search-->
<div>
<form action="search.php" class="navbar-form navbar-right" role="search">
<div class="input-group form-group ">
<input type="search" name="term" class="form-control" placeholder="Search...">
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

<div class="col-md-4 col-sm-12">

</div>

<div style="padding-top:100px;" class="col-md-4 col-sm-12">

<!--form-->
<div >
 <form  role="form" action="login_submit.php" >
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" class="form-control" name= "phone" id="phone">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" name="pwd" id="pwd">
  </div>
  
</form>
<!--/form-->
<br>

<?php
echo $wrong;
?>
<!--a href="login.php" class="unavailable"> try again</a-->


</div>
<br>
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion"
href="#collapseThree">
Create an Account
</a>
</h4>

</div>
<div id="collapseThree" class="panel-collapse collapse">
<div class="panel-body">
<p>* required</p>
 <form  role="form" action="signup.php">
  <div class="form-group">
    <label for="fname">First Name *</label>
    <input type="text" class="form-control" name="fname" id="fname">
  </div>
  <div class="form-group">
    <label for="lname">Last Name *</label>
    <input type="text" class="form-control" name="lname" id="lname">
  </div>
   <div class="form-group">
    <label for="phone">Phone *</label>
    <input type="text" class="form-control" name="phones" id="phone">
  </div>
    <div class="form-group">
    <label for="pwd">Password *</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
   <div class="form-group">
    <label for="pwd">Repeat Password*</label>
    <input type="password" class="form-control" id="password1">
  </div>
   <!--countrylist-->
   
   
<div class="from-group">
<label for"country">country *</label>
<select class="form-control" name="country">
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select> </div>
<br>
   
   <!--/countrylist-->
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>


</div>

<div class="col-md-4 col-sm-12">

</div>

</div>


<br><br><br><br><br><br>
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
