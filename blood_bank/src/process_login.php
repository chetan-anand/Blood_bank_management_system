<html>
<body>
<p align="center">
<?php
include 'db_connect.php';
include 'functions.php';


if(isset($_POST['username'],$_POST['password']))
{
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = hash('sha512', $password);
	echo '<br>'."$username";
	echo '<br>'."$password";
	
		$stmt = $mysqli->stmt_init();
		if($stmt->prepare("SELECT id,email, role, password, salt FROM users WHERE username = ?"))
		{
			$stmt->bind_param("s",$username);			//bind the missing email parameter to the query
			$stmt->execute();					// execute the prepared query
			$stmt->bind_result( $userid,$email, $role, $hashed_password, $salt);		//bind the result in the given variables
			$stmt->fetch();
		}
		else{
			printf("\n error in enterng the prepare statment \n");
			if (!$stmt)
				{
				printf("Error: %s\n", mysqli_error($mysqli));
				exit();
				}
			}
		//closing the statement
		$stmt->close();
		
		echo '<br>'."email : $email";
		echo '<br>'."hashed password from database : $hashed_password";
		echo '<br>'."role : $role";
		echo '<br>'."salt : $salt";
		echo '<br>'."userid : $userid";
		
		
		
		$password = hash('sha512', $password.$salt);
		
//		echo '<br><br>'."login password  after hash with salt : $password";						

			if($hashed_password == $password)
					{
						secure_session_start();
						// password is correct
						$user_browser = $_SERVER['HTTP_USER_AGENT'];		//get the user agent string of the user
						$_SESSION['role'] = $role;
						$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
						$_SESSION['username'] = $username;
						$_SESSION['login_string'] = hash('sha512',$password.$user_browser);
						$_SESSION['userid'] = $userid;
						//success login
						echo '<p align="center">Logged in  </p>';
						header('Location: ./loggedin.php');
					}
					else{
							//no user exists or wrong password/email
							echo'<p align="center">Log in error : wrong password match</p>';
							echo '<p align="center">Enter a correct password and <a href="./index.php">Login</a></p>';
							//header('Location: ./logout.php');
						}

}
else{
		//the correct POST variables hav not been send to this page
		echo '<p align="center">Invalid Request  ..problem at isset on process_login function</p>';
		echo '<p align="center">Please <a href="./index.php">Login</a>. </p>';
		exit();
		//header('Location: ./logout.php');
	}
	
?>
		<form action="logout.php" method="post" name="logout">
        <input name="logout" type="submit" value="Logout">
        </form>
        </p>
</body>
</html>