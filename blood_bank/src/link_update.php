<?php
include 'db_connect.php';
include 'functions.php';
secure_session_start();

if(isset($_GET['blood_id'],$_GET['type']))
{
	$blood_id = $_GET['blood_id'];
	$type = $_GET['type'];
	//echo $blood_id.':'.$type;
	if ($update_stmt = $mysqli->prepare("UPDATE bloodrepo set donate_status  = '1' where blood_id = ?"))
						{   
							echo $blood_id.':'.$type;
						   $update_stmt->bind_param('i', $blood_id); 
						   $update_stmt->execute();
						   $update_stmt->close();
						 }
						if (!$update_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
								}
}
else if(isset($_GET['request_id'],$_GET['blood_group']))
{
	$request_id = $_GET['request_id'];
	$blood_group = rawurldecode($_GET['blood_group']);
	//echo $request_id.':'.$blood_group;
	
	//selecting the blood_id if available 
	$selectSQL = "SELECT * FROM bloodrepo where donate_status = '1' and request_status = '0' and blood_group = '$blood_group' and blood_status = '1'";
	
	if( !( $selectRes = $mysqli->query($selectSQL) ) )
	{
		echo 'Retrieval of blood_group data from Database Failed - #'.mysql_errno().': '.mysql_error();
	}
	else{
			 if( $selectRes -> num_rows == 0 )
			 {
				header('Location: ./operation.php');
			  }
			  else
			  {
					$row = $selectRes -> fetch_assoc();
					$blood_id = $row['blood_id'];
					//echo $blood_id;
					
					//inserting the records in requst repo relation
					
						if ($insert_stmt = $mysqli->prepare("INSERT INTO req_repo_rel (blood_id, request_id) VALUES (?, ?)"))
						{   
							//echo $blood_id .' blood id: request id '.$request_id.'<br></br>'; 
						   $insert_stmt->bind_param('ii', $blood_id, $request_id); 
						   $insert_stmt->execute();
						   $insert_stmt->close();
						}
						if (!$insert_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
									}
						if ($update_stmt = $mysqli->prepare("UPDATE br_req_rel set request_status  = '1' where request_id = ?"))
						{   
							//echo ' request status of branch reqest relation : request id '.$request_id.'<br></br>';
						   $update_stmt->bind_param('i', $request_id); 
						   $update_stmt->execute();
						   $update_stmt->close();
						 }
						if (!$update_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
									}

							if ($update_stmt = $mysqli->prepare("UPDATE bloodrepo set request_status  = '1' where blood_id = ?"))
						{   
							//echo $blood_id.': blood id for the approved request';
						   $update_stmt->bind_param('i', $blood_id); 
						   $update_stmt->execute();
						   $update_stmt->close();
						 }
						if (!$update_stmt)
									{
									printf("Error: %s\n", mysqli_error($mysqli));
									exit();
									}
						
			  }
		}
}
else{
		printf("Error: error encountered at obtaining the get variables from approve table");
		exit();
	}



header('Location: ./operations.php');
?>