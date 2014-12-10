<html>
<head>
<title>Logged In</title>
</head>
<body>
<?php
include 'db_connect.php';
include 'functions.php';
secure_session_start();

//if($mysqli)
//{
//	echo '<br>mysqli is correct</br>';
//	$string = ' role : '.$_SESSION['role']. '<br></br> id : '.$_SESSION['userid'].'<br> name : '.$_SESSION['username'].'</br><br> loginString : '.$_SESSION['login_string'].'</br><br> user browser : '.$_SERVER['HTTP_USER_AGENT'];
//	echo '<br>'.$string.'</br>';
//}

if(login_check($mysqli) == true) {
	$string = 'You are logged in as '.$_SESSION['username'] .':'.$_SESSION['role'];
	echo '<p align="center">';
	echo '<br> <em><strong>'.$string.'</strong></em> </br>';
	echo'</p>';
	$role = $_SESSION['role'];
	if($role == 'donor'){header('Location: ./donor.php');}
	else if($role == 'applicant'){header('Location: ./applicant.php');}
	else if($role == 'employee'){header('Location: ./sudo.php');}
	else if($role == 'admin'){header('Location: ./sudo.php');}
 
} else {
   echo '<p align="center"><br>You are not authorized to access this page, please <a href="./index.php">login</a>. <br/></p>';
}
?>


<form action="logout.php" method="post" name="logout">
<?php
if(login_check($mysqli) == true)
{
	echo'<p>';
	echo '<input type="submit" value=" logout">';
	echo'</p>';
}
?>
</form>

</body>
</html>
