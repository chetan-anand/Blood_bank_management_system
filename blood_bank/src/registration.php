<html>
<body>
<p align="center">

<?php
include 'db_connect.php';

if(isset($_POST['role']))
{
	$role = $_POST['role'];
	$donor = 'donor';
	$applicant = 'applicant';
	$employee = 'employee';
	
	if($role == $donor)
	{
		if(isset($_POST['d_email'],$_POST['d_password'],$_POST['d_username']))
		{
			// The hashed password from the form
			$password = $_POST['d_password']; 
			$password = hash('sha512', $password);
			
			$email = $_POST['d_email'];
			$username = $_POST['d_username'];
			//$role = $_POST['role'];
			// Create a random salt
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		
			//echo "<br>before hash with salt password : $password <br>";
			$password = hash('sha512', $password.$random_salt);
			 
			
			// Make sure you use prepared statements!
			if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, role, email, password, salt) VALUES (?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('sssss', $username, $role, $email, $password, $random_salt); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//select d_id from the users table
			if ($select_stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?"))
			{    
			   $select_stmt->bind_param('s', $username); 
			   $select_stmt->execute();
			   $select_stmt->bind_result($d_id);
			   $select_stmt->fetch();
			   $select_stmt->close();
			   
			}
			if (!$select_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//inserting into donor table
			$d_address = $_POST['d_address'];
			$d_area = $_POST['d_area'];
			$d_blood_group = $_POST['d_blood_group'];
			$d_nationality = $_POST['d_nationality'];
			$d_phone = $_POST['d_phone'];
			if ($insert_stmt = $mysqli->prepare("INSERT INTO donor (d_id, d_username, d_address, d_area, d_blood_group, d_nationality, d_email, d_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('issssssi', $d_id, $username, $d_address, $d_area, $d_blood_group, $d_nationality, $email, $d_phone); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
		}
		else
		{
			printf("Error: %s\n", mysqli_error($mysqli));
			printf("Error at getting the post variables corresponding d_email d_password d_username... \n We will Get back to you soon");
			exit();
			//header('Location: ./logout.php');
		}
	}
	else if($role == $applicant)
	{
		if(isset($_POST['req_email'],$_POST['req_password'],$_POST['req_username']))
		{
			// The hashed password from the form
			$password = $_POST['req_password']; 
			$password = hash('sha512', $password);
			
			$email = $_POST['req_email'];
			$username = $_POST['req_username'];
			//$role = $_POST['role'];
			// Create a random salt
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		
			//echo "<br>before hash with salt password : $password <br>";
			$password = hash('sha512', $password.$random_salt);
			 
			
			// Make sure you use prepared statements!
			if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, role, email, password, salt) VALUES (?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('sssss', $username, $role, $email, $password, $random_salt); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//select d_id from the users table
			if ($select_stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?"))
			{    
			   $select_stmt->bind_param('s', $username); 
			   $select_stmt->execute();
			   $select_stmt->bind_result($req_id);
			   $select_stmt->fetch();
			   $select_stmt->close();
			   //printf("%d\n",$req_id);
			}
			if (!$select_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//inserting into donor table
			$req_address = $_POST['req_address'];
			$req_area = $_POST['req_area'];
			$req_blood_group = $_POST['req_blood_group'];
			$req_hospital= $_POST['req_hospital'];
			$req_phone = $_POST['req_phone'];
			$req_amount = $_POST['req_amount'];
			if ($insert_stmt = $mysqli->prepare("INSERT INTO bloodrequest (req_id, req_username, req_address, req_area, req_blood_group, req_hospital, req_email, req_phone, req_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('issssssis', $req_id, $username, $req_address, $req_area, $req_blood_group, $req_hospital, $email, $req_phone, $req_amount); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   //printf("printing is dne");
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
		}
		else
		{
			printf("Error: %s\n", mysqli_error($mysqli));
			printf("Error at getting the post variables corresponding req_email req_password req_username... \n We will Get back to you soon");
			exit();
			//header('Location: ./logout.php');
		}
	}
	else if($role == "employee")
	{
		if(isset($_POST['emp_email'],$_POST['emp_password'],$_POST['emp_name']))
		{
			// The hashed password from the form
			$password = $_POST['emp_password']; 
			$password = hash('sha512', $password);
			
			$email = $_POST['emp_email'];
			$username = $_POST['emp_name'];
			//$role = $_POST['role'];
			// Create a random salt
			$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		
			//echo "<br>before hash with salt password : $password <br>";
			$password = hash('sha512', $password.$random_salt);
			 
			
			// Make sure you use prepared statements!
			if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, role, email, password, salt) VALUES (?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('sssss', $username, $role, $email, $password, $random_salt); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//select userid from the users table
			if ($select_stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?"))
			{    
			   $select_stmt->bind_param('s', $username); 
			   $select_stmt->execute();
			   $select_stmt->bind_result($userid);
			   $select_stmt->fetch();
			   $select_stmt->close();
			   
			}
			if (!$select_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
			//inserting into employee  table
			$emp_address = $_POST['emp_address'];
			$emp_area = $_POST['emp_area'];
			$emp_phone = $_POST['emp_phone'];
			$emp_sex = $_POST['emp_sex'];
			$emp_salary = $_POST['emp_salary'];
			$emp_role = $_POST['emp_role'];
			if ($insert_stmt = $mysqli->prepare("INSERT INTO employee (emp_id, emp_name, emp_address, emp_sex, emp_email, emp_role, emp_area, emp_phone, emp_salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))
			{    
			   $insert_stmt->bind_param('issssssii', $userid, $username, $emp_address, $emp_sex, $email, $emp_role, $emp_area,$emp_phone, $emp_salary); 
			   $insert_stmt->execute();
			   $insert_stmt->close();
			   
			}
			if (!$insert_stmt)
						{
						printf("Error: %s\n", mysqli_error($mysqli));
						exit();
						}
		}
		else
		{
			printf("Error: %s\n", mysqli_error($mysqli));
			printf("Error at getting the post variables corresponding emp_email emp_password emp_username... \n We will Get back to you soon");
			exit();
			//header('Location: ./logout.php');
		}
	}
	else
	{
		printf("Error: %s\n", mysqli_error($mysqli));
		printf("Error at getting the post variables corresponding role... \n We will Get back to you soon");
		exit();
	}
}
else
	{
		printf("Error: %s\n", mysqli_error($mysqli));
		printf("Error at getting the post variables for your Role...\n We will Get back to you soon");
		exit();
		//header('Location: ./logout.php');
	}



		echo "<br> after hash with salt password : $password <br>";
		echo "<br> role : $role <br>";
		echo "<br> random salt : $random_salt <br>";
		echo "<br> email : $email <br>";
	 	echo "<br> username : $username <br>";
		
		header('Location: ./index.php');
?>
  Go back to <a href="./index.php">login</a></p>
</body>
</html>


<?php
//if(isset($_POST['email'],$_POST['password'],$_POST['username']))
//	{
//		// The hashed password from the form
//		$password = $_POST['password']; 
//		$password = hash('sha512', $password);
//		
//		$email = $_POST['email'];
//		$username = $_POST['username'];
//		$role = $_POST['role'];
//		// Create a random salt
//		$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
//	
//		//echo "<br>before hash with salt password : $password <br>";
//		$password = hash('sha512', $password.$random_salt);
//		 
//		
//		// Make sure you use prepared statements!
//		if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, role, email, password, salt) VALUES (?, ?, ?, ?, ?)"))
//		{    
//		   $insert_stmt->bind_param('sssss', $username, $role, $email, $password, $random_salt); 
//		   $insert_stmt->execute();
//		   
//		}
//		if (!$insert_stmt)
//					{
//					printf("Error: %s\n", mysqli_error($mysqli));
//					exit();
//					}
//	}
//	else
//	{
//		printf("Error: %s\n", mysqli_error($mysqli));
//		printf("Error at getting the post variables ...\n We will Get back to you soon");
//		exit();
//		//header('Location: ./logout.php');
//	}
?>