<html>
<?php
include'functions.php';
secure_session_start();

//Unset all the session variables
$_SESSSION = array();
//get session paprameters
$param = session_get_cookie_params();
//delete the actual cookie
setcookie(session_name(), '', time()-42000, $param["path"], $param["domain"], $param["secure"], $param["httponly"]);
//destroy session
session_destroy();
?>
<body>
<p align="center">
<a href="index.php">Login</a>
<?php
echo"<br> Please go back to login page , if in case redirection fails.";
header('Location: ./index.php');
?>
</p>
</body>
</html>