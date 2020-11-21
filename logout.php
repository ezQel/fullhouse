<?php
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);
setcookie("phone", "", time() - 3600);

header('location:http://localhost/');

?>

