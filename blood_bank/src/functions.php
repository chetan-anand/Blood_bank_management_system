<?php
//include 'db_connect.php';

//function to call at the begining of a page to access the php session variables
function secure_session_start()
{
	$session_name = 'sec_session_id';		// any custom session name
	$secure = false;		// set it true if using the https protocal
	$httponly = true;		// this stops the javascript being able to access session id

	ini_set('session.use_only_cookies', 1);		//forces session to use cookies
	$cookieParams = session_get_cookie_params();		//get the current cookie param
	session_set_cookie_params($cookieParams["lifetime"] , $cookieParams["path"] , $cookieParams["domain"] , $secure , $httponly);		
	session_name($session_name);
	session_start();
	session_regenerate_id();		// regenerates the session , deletes the old one
}


//function for login check. It is done by checking for the user_id and the login_string
function login_check($mysqli)
{
	//check for all session variables
	if(isset($_SESSION['role'], $_SESSION['username'], $_SESSION['login_string'], $_SESSION['userid']))
	{
		$role = $_SESSION['role'];
		$username = $_SESSION['username'];
		$login_string = $_SESSION['login_string'];
		$userid = $_SESSION['userid'];
		
//		echo'<br>';
//		print_r($_SESSION);
//		echo'</br>';
		
		$user_browser = $_SERVER['HTTP_USER_AGENT'];
		
		if($stmt = $mysqli->prepare("SELECT password FROM users WHERE id = ?"))
		{
			$stmt->bind_param("i",$userid);
			$stmt->execute();
			$stmt->bind_result($password);
			$stmt->fetch();
			
			//printf("%d :::: \n",$userid);
			//printf("%s\n",$password);
			//printf("\n %s \n",$stmt->num_rows);
			//print_r($stmt);
					
//			if($stmt->num_rows == 1 )
//			{
//				//if the user exists
//				//$stmt->bind_result($password);
//				//$stmt->fetch();
//			}
//			else{
//				printf("\n Error at the no. of rows fetched for login string.");
//				$stmt->close();
//				return false;
//				}
			$login_check = hash('sha512', $password.$user_browser);
			if($login_check == $login_string)
			{
				//Logged IN
				$stmt->close();
				return true;
			}
			else{
					printf("\n Error for no match between login_string and login_check functions php\n");
					printf("Error: %s\n", mysqli_error($mysqli));
					$stmt->close();
					return false;		//not logged in
				}

		}
		else{
			printf("\n Error in enterng the prepare statment  in functions php\n");
			if (!$stmt)
				{
				printf("Error: %s\n", mysqli_error($mysqli));
				$stmt->close();
				return false;
				}
			}
			
	}
	else{
		//printf("\n Error in enterng the ISSET  statement in functions php\n");
//		printf("\n Please Login again.Session has Expired.");
//		header('Location: ./logout.php');
		return false;
		}
}

?>