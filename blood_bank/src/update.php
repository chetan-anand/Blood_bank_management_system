<?php
include 'db_connect.php';
include 'functions.php';
secure_session_start();

if(isset($_POST['d_area'],$_POST['d_br_name'],$_POST['d_amount']))
{
	date_default_timezone_set("Asia/Kolkata");
	
	$blood_amount = $_POST['d_amount'];
	$area = $_POST['d_area'];
	$br_name = $_POST['d_br_name'];
	$userid = $_SESSION['userid'];
	$donate_date = date("Y-m-d H:i:s");
	
	
	
	//selecting blood group
	$selectSQL = "SELECT d_blood_group FROM donor where d_id = '$userid'";
	
	if( !( $selectRes = $mysqli->query($selectSQL) ) )
	{
		echo 'Retrieval of blood_group data from Database Failed - #'.mysql_errno().': '.mysql_error();
	}
	else{
			 if( $selectRes -> num_rows == 0 )
			 {
				echo 'Sorry!! Problem occurred  as no blood group is mentioned in database for the current user';
			  }
			  else
			  {
					
					$row = $selectRes -> fetch_assoc();
						
					$blood_group = $row['d_blood_group'];
					//echo $blood_group;
					
					//inserting the records for blood repository
					
					while($blood_amount > 0)
					{
						if ($insert_stmt = $mysqli->prepare("INSERT INTO bloodrepo (blood_group, donate_date) VALUES (?, ?)"))
						{   
							//echo $blood_group .'<br></br>'; 
						   $insert_stmt->bind_param('ss', $blood_group, $donate_date); 
						   $insert_stmt->execute();
						   $insert_stmt->close();
						   $blood_amount--;
						}
						if (!$insert_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
									}
					}
					
					//selecting the branch id required for updating the branch donor relation
					$selectSQL = "SELECT br_id FROM branch where br_name = '$br_name' and br_area = '$area'";
	
					if( !( $selectRes = $mysqli->query($selectSQL) ) )
					{
						echo 'Retrieval of blood_group data from Database Failed - #'.mysql_errno().': '.mysql_error();
					}
					else{
							 if( $selectRes -> num_rows == 0 )
							 {
								echo 'Sorry!! Problem occurred  as no such area is mentioned in database';
							  }
							  else
							  {
									$row = $selectRes -> fetch_assoc();
									$br_id = $row['br_id'];
									
									//inserting records into branch donor relation
									if ($insert_stmt = $mysqli->prepare("INSERT INTO br_don_rel (br_id, d_id) VALUES (?, ?)"))
									{   
										//echo $userid.' : '.$br_id.'<br></br>'; 
									   $insert_stmt->bind_param('ii', $br_id, $userid); 
									   $insert_stmt->execute();
									   $insert_stmt->close();
									   
									}
									if (!$insert_stmt)
												{
												printf("Error: %s\n", mysqli_error($mysqli));
												exit();
												}
							  }
						 }
					
								
					//selecting the blood bag id required for updating the  donor blood repo relation
					$selectSQL = "SELECT blood_id FROM bloodrepo where blood_group = '$blood_group' and donate_date = '$donate_date'";
	
					if( !( $selectRes = $mysqli->query($selectSQL) ) )
					{
						echo 'Retrieval of blood_id data from Database Failed - #'.mysql_errno().': '.mysql_error();
					}
					else{
							 if( $selectRes -> num_rows == 0 )
							 {
								echo 'Sorry!! Problem occurred  as no such blood_id is mentioned in database';
							  }
							  else
							  {
								  while($row = $selectRes -> fetch_assoc())
								{
									$blood_id = $row['blood_id'];
									
									//inserting into donor blood relation
									if ($insert_stmt = $mysqli->prepare("INSERT INTO don_repo_rel (blood_id, d_id) VALUES (?, ?)"))
									{   
										//echo $userid.' : '.$blood_id; 
									   $insert_stmt->bind_param('ii', $blood_id, $userid); 
									   $insert_stmt->execute();
									   $insert_stmt->close();
									   
									}
									if (!$insert_stmt)
												{
												printf("Error: %s\n", mysqli_error($mysqli));
												exit();
												}
								}
							  }
						 }
			  }
		}
	
}


else if(isset($_POST['req_area'],$_POST['req_br_name'],$_POST['req_amount']))
{
	date_default_timezone_set("Asia/Kolkata");
	
	$blood_amount = $_POST['req_amount'];
	$area = $_POST['req_area'];
	$br_id = $_POST['req_br_name'];
	$userid = $_SESSION['userid'];
	$request_date = date("Y-m-d H:i:s");
	echo $request_date;
	
	
	
	//selecting blood group
	$selectSQL = "SELECT d_blood_group FROM donor where d_id = '$userid'";
	
	if( !( $selectRes = $mysqli->query($selectSQL) ) )
	{
		echo 'Retrieval of blood_group data from Database Failed - #'.mysql_errno().': '.mysql_error();
	}
	else{
			 if( $selectRes -> num_rows == 0 )
			 {
				echo 'Sorry!! Problem occurred  as no blood group is mentioned in database for the current user';
			  }
			  else
			  {
					$row = $selectRes -> fetch_assoc();
					$blood_group = $row['d_blood_group'];
					//echo $blood_group;
					
					//inserting the records in branch requst relation
					while($blood_amount > 0)
					{
						if ($insert_stmt = $mysqli->prepare("INSERT INTO br_req_rel (br_id, user_id, blood_group, date) VALUES (?, ?, ?, ?)"))
						{   
							echo $blood_amount .': '.$blood_group.'<br></br>'; 
						   $insert_stmt->bind_param('iiss', $br_id, $userid, $blood_group, $request_date); 
						   $insert_stmt->execute();
						   $insert_stmt->close();
						   $blood_amount--;
						}
						if (!$insert_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
									}
					}
					
					
			  }
		 }
	
}
else if(isset($_POST['br_name'], $_POST['br_address'], $_POST['br_email'], $_POST['br_area'],$_POST['br_phone']))
{
	$name = $_POST['br_name'];
	$address = $_POST['br_address'];
	$email = $_POST['br_email'];
	$area = $_POST['br_area'];
	$phone = $_POST['br_phone'];
	if ($insert_stmt = $mysqli->prepare("INSERT INTO branch (br_name, br_address, br_email, br_area, br_phone) VALUES (?, ?, ?, ?, ?)"))
						{   
							echo $name.'<br></br>'; 
						   $insert_stmt->bind_param('ssssi', $name, $address, $email, $area, $phone); 
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
	echo'Error : The POST variables for new donation/request form are not set';
}


header('Location: ./index.php');

?>