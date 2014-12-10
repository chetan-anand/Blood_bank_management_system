<?php
include 'db_connect.php';
include 'functions.php';
secure_session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Emergency Inc.</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>

<body class="caption">
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">Blood Bank Management System</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="bloodbank.php">Blood Banks</a>
						</li>
						<li>
							<a href="blooddonation.php">Blood Donation</a>
						</li>
					<!--<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Action</a>
								</li>
								<li>
									<a href="#">Another action</a>
								</li>
								<li>
									<a href="#">Something else here</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">Separated link</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">One more separated link</a>
								</li>
							</ul>
						</li>-->

						<li>
							<a id="modal-522567" href="#modal-container-522567" role="button" class="btn" data-toggle="modal">Contact Us</a>
                            		
							
						</li>

					</ul>
					<form class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" class="form-control">
						</div> <button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li>
                        <?php
                                if(login_check($mysqli) == true) 
								{
                                $string = 'You are logged in as '.$_SESSION['username'];
                                echo '<a>'.$string.'</a>';
                                } 
								else {
                               echo '<a> You are not authorized to access this page, please</a> <a href="./index.php">login</a>.';
                            		}
							?>
						</li>

						<li>
							<a href="logout.php">Logout</a>
						</li>

						
					</ul>
				</div>
				
			</nav>
            
            <div class="modal fade" id="modal-container-522567" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Modal title
							</h4>
						</div>
						<div class="modal-body">
						<!-------------->
						    <h1 class="title" id="page-title">Contact Us</h1>
						  
						  
						    <p>You can contact us at the address given below.<br>
						Karnataka State AIDS Prevention Society<br>
						#4-13/1, Crescent Road<br>
						High Grounds<br>
						Bangalore - 560001<br>
						Ph: 080-22201438<br>
						Fax:080-22201435<br>
						You can also email us at <em>pdksaps at gmail dot com</em></p>

						<!-------------->
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
							 <!--<button type="button" class="btn btn-primary">Save changes</button>-->
						</div>
					</div>
					
				</div>
				
			</div>
            
            
            
            <div class="modal fade" id="new_donation" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								New Donation Form
							</h4>
						</div>
						<div class="modal-body">
						<!-------------->
						  
					<p>
							
							<form role="form" method="post" action="update.php">
                            	<div class="form-group">
									 <label for="d_area">Area*</label><br>
									 <select id="d_area" name="d_area" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     <?php
									 	$d_id = $_SESSION['userid'];
										$selectSQL = "SELECT d_area FROM donor where d_id = '$d_id'";
	
										if( !( $selectRes = $mysqli->query($selectSQL) ) )
										{
											echo '<option value="">Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</option>';
										}
										else{
												 if( $selectRes -> num_rows == 0 )
												 {
													echo '<option value=""> Sorry .Problem occurred while fetching the affiliated area. </option>';
												  }
												  else
												  {
														
														while( $row = $selectRes -> fetch_assoc() )
															{
																$d_area = $row['d_area'];
															echo '<option value='.$d_area.'>'. $d_area .'</option>';
															}
												  }
											}										
                                        ?>
										</select>
								</div>
                                
                                <div class="form-group">
									 <label for="d_br_name">Hospital Name*</label><br>
                                     <select id="d_br_name" name="d_br_name" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     	<?php
											$selectSQL = "SELECT br_name FROM branch where br_area = '$d_area'";
		
											if( !( $selectRes = $mysqli->query($selectSQL) ) )
											{
												echo '<option value="">Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</option>';
											}
											else{
													 if( $selectRes -> num_rows == 0 )
													 {
														echo '<option value=""> Sorry .Problem occurred while fetching the affiliated area. </option>';
													  }
													  else
													  {
															
															while( $row = $selectRes -> fetch_assoc() )
																{
																	$d_br_name = $row['br_name'];
																echo '<option value='.$d_br_name.'>'. $d_br_name .'</option>';
																}
													  }
												}										
										?>
										</select>
								</div>
                                
                                <div class="form-group">
									 <label for="d_amount">Donation Amount (in units)*</label><input name="d_amount" type="text" required class="form-control" id="d_amount">
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>


					</p>

						<!-------------->
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
							 <!--<button type="button" class="btn btn-primary">Save changes</button>-->
						</div>
					</div>
					
				</div>
				
			</div>
            
            
            <div class="modal fade" id="new_request" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								New Blood Request Form
							</h4>
						</div>
						<div class="modal-body">
						<!-------------->
						  
					<p>
							
							<form role="form" method="post" action="update.php">
                            
                            	<div class="form-group">
									 <label for="req_area">Area*</label><br>
									 <select id="req_area" name="req_area" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     <?php
									 	$userid = $_SESSION['userid'];
										$selectSQL = "SELECT d_area FROM donor where d_id = '$userid'";
	
										if( !( $selectRes = $mysqli->query($selectSQL) ) )
										{
											echo '<option value="">Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</option>';
										}
										else{
												 if( $selectRes -> num_rows == 0 )
												 {
													echo '<option value=""> Sorry .Problem occurred while fetching the affiliated area. </option>';
												  }
												  else
												  {
														
														while( $row = $selectRes -> fetch_assoc() )
															{
																$req_area = $row['d_area'];
															echo '<option value='.$req_area.'>'. $req_area .'</option>';
															}
												  }
											}										
                                        ?>
										</select>
								</div>
                                
                                <div class="form-group">
									 <label for="req_br_name">Hospital Name*</label><br>
                                     <select id="req_br_name" name="req_br_name" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     	<?php
											$selectSQL = "SELECT br_id,br_name FROM branch where br_area = '$req_area'";
		
											if( !( $selectRes = $mysqli->query($selectSQL) ) )
											{
												echo '<option value="">Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</option>';
											}
											else{
													 if( $selectRes -> num_rows == 0 )
													 {
														echo '<option value=""> Sorry .Problem occurred while fetching the affiliated area. </option>';
													  }
													  else
													  {
															
															while( $row = $selectRes -> fetch_assoc() )
																{
																	$req_br_name = $row['br_name'];
																	$req_br_id = $row['br_id'];
																echo '<option value='.$req_br_id.'>'. $req_br_name .'</option>';
																}
													  }
												}										
										?>
										</select>
								</div>
                                
                                <div class="form-group">
									 <label for="d_amount">Required Amount (in units)*</label><input name="req_amount" type="text" required class="form-control" id="req_amount">
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>


					</p>

						<!-------------->
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
							 <!--<button type="button" class="btn btn-primary">Save changes</button>-->
						</div>
					</div>
					
				</div>
				
			</div>
            
            
            
			<br>
			<br>
			<br>
			<br>
			<hr>
			<div class="tabbable" id="tabs-890716">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-804765" data-toggle="tab">Profile Setting</a>
					</li>
					<li>
						<a href="#panel-697151" data-toggle="tab">History</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-804765">
						<p>
							<h3><b>Personal Details</b></h3>
							<hr>
							<form role="form">
								

								<div class="form-group">
									 <label for="d_name">Donor Name</label><input type="text" value="Chetan" class="form-control" id="d_name">
								</div>

								<div class="form-group">
									 <label for="d_address">Address</label><input type="text" class="form-control" id="d_address">
								</div>

								<div class="form-group">
									 <label for="d_area">Area</label><br>
									 <select id="city" name="city" class="formation_select required" style="width: 230px;"><option value="">- select -</option><option value="1">Bagalkot</option>
										<option value="2">Bangalore</option>
										<option value="3">Bangalore Rural</option>
										<option value="4">Belgaum</option>
										<option value="5">Bellary</option>
										<option value="6">Bidar</option>
										<option value="7">Bijapur</option>
										<option value="8">Chamrajnagar</option>
										<option value="9">Chickmagalur</option>
										<option value="10">Chikkaballapur</option>
										<option value="11">Chitradurga</option>
										<option value="12">Dakshina Kannada</option>
										<option value="13">Davangare</option>
										<option value="14">Dharward</option>
										<option value="15">Gadag</option>
										<option value="16">Gulbarga</option>
										<option value="17">Hassan</option>
										<option value="18">Haveri</option>
										<option value="19">Kodagu</option>
										<option value="20">Kolar</option>
										<option value="21">Koppal</option>
										<option value="22">Mandya</option>
										<option value="23">Mysore</option>
										<option value="24">Raichur</option>
										<option value="25">Ramanagar</option>
										<option value="26">Shimoga</option>
										<option value="27">Tumkur</option>
										<option value="28">Udupi</option>
										<option value="29">Uttara Kannada</option>
										<option value="30">Yadgir</option>
										</select>
								</div>
<!--------------------------------------------------------------------sd-->
								<!--<div class="form-group">
									<div class="btn-group">
										<button class="btn btn-default">Area</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li>
												<a href="#">Action</a>
											</li>
											<li class="disabled">
												<a href="#">Another action</a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="#">Something else here</a>
											</li>
										</ul>
									</div>
								</div>-->


								<!--------------------------------------------------------------------sd-->
								<div class="form-group">
									<label for="d_area">Blood Group</label><br>
									 <select id="bg" name="bg" class="formation_select required"><option value="">- select -</option><option value="1">A+</option>
										<option value="2">A-</option>
										<option value="3">A1+</option>
										<option value="4">A1-</option>
										<option value="7">A1B+</option>
										<option value="8">A1B-</option>
										<option value="5">A2+</option>
										<option value="6">A2-</option>
										<option value="9">A2B+</option>
										<option value="10">A2B-</option>
										<option value="11">AB+</option>
										<option value="12">AB-</option>
										<option value="13">B+</option>
										<option value="14">B-</option>
										<option value="17">Bombay</option>
										<option value="15">O+</option>
										<option value="16">O-</option>
										</select>
								</div>

								<!--<div class="form-group">
									 <div class="form-group">
									 <label for="d_blood_group">Blood Group</label><input type="text" class="form-control" id="d_blood_group">
								</div>
								</div>

								<div class="form-group">
									<div class="btn-group">
										<button class="btn btn-default">Blood Group</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li>
												<a href="#">Action</a>
											</li>
											<li class="disabled">
												<a href="#">Another action</a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="#">Something else here</a>
											</li>
										</ul>
									</div>
								</div>-->

								<div class="form-group">
									 <label for="d_nationality">National Id</label><input type="text" class="form-control" id="d_nationality">
								</div>

								<div class="form-group">
									 <label for="d_phone">Phone Number</label><input type="text" class="form-control" id="d_phone">
								</div>

								<div class="form-group">
									 <label for="d_email">Email</label><input type="email" class="form-control" id="d_email">
								</div>

								<div class="form-group">
									 <label for="d_password">Password</label><input type="password" class="form-control" id="d_password">
								</div>

								<div class="form-group">
									 <label for="con_d_password">Confirm Password</label><input type="password" class="form-control" id="con_d_password">
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</p>
					</div>
					<div class="tab-pane" id="panel-697151">
						<p>
							<h1><b>History as Donor</b></h1>
							<hr>
							<table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Donation Bag Id
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                      <?php
                                        $d_id = $_SESSION['userid'];
                                        if($d_id == "")
                                        {
                                            echo'<td>Sorry it seems you have been logged out.A problem has been encountered.</td>';
                                        }
                                        else{
                                                $selectSQL = "SELECT * FROM bloodrepo WHERE blood_id IN ( SELECT blood_id FROM don_repo_rel WHERE d_id = '$d_id' ) ORDER BY blood_id DESC ";
                                            }
                                        if( !( $selectRes = $mysqli->query($selectSQL) ) )
                                        {
                                            echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
                                        else{
                                                 if( $selectRes -> num_rows == 0 )
                                                 {
                                                    echo '<td> You are yet to donate blood. </td>';
                                                  }
                                                  else
                                                  {
                                                        
                                                        while( $row = $selectRes -> fetch_assoc() )
                                                            {
                                                                //$donate_status = 'Not approved';
                                                                if($row['donate_status'] == 1){$row['donate_status'] = 'Approved';}
                                                                else{$row['donate_status'] = 'Not Approved';}
                                                            echo "<tr><td>{$row['blood_id']}</td><td>{$row['donate_date']}</td><td>{$row['donate_status']}</td></tr>";
                                                            }
                                                  }
                                            }
                                      ?>
                                </tbody>
                        	</table>
                            
                            <font color="#0066FF"> (Each donation bag id represents one unit of blood) </font>
<!-------------------------------------------------------------------------------------------------->
                            <br>
                            <hr>
                            <a id="new_donation" href="#new_donation" role="button" class="btn" data-toggle="modal">New Donation Request</a>
                            <hr>
							<br>
<!-------------------------------------------------------------------------------------------------->
							<h1><b>History as Blood Recipient</b></h1>
							<hr>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>
											Request Id.
										</th>
										<th>
											Date
										</th>
                                        <th>
											Status
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
                                        
                                        $userid = $_SESSION['userid'];
                                        if($d_id == "")
                                        {
                                            echo'<td>Sorry it seems you have been logged out.A problem has been encountered.</td>';
                                        }
                                        else{
                                                $selectSQL = "SELECT * FROM br_req_rel WHERE user_id = '$userid' ORDER BY request_id DESC ";
                                            }
                                        if( !( $selectRes = $mysqli->query($selectSQL) ) )
                                        {
                                            echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
                                        else{
                                                 if( $selectRes -> num_rows == 0 )
                                                 {
                                                    echo '<td> You are yet to request for blood. </td>';
                                                  }
                                                  else
                                                  {
                                                        
                                                        while( $row = $selectRes -> fetch_assoc() )
                                                            {
                                                                //$donate_status = 'Not approved';
                                                                if($row['request_status'] == 1){$row['request_status'] = 'Approved';}
                                                                else{$row['request_status'] = 'Not Approved';}
                                                            echo "<tr><td>{$row['request_id']}</td><td>{$row['date']}</td><td>{$row['request_status']}</td></tr>";
                                                            }
                                                  }
                                            }
                                      ?>
								</tbody>
							</table>
                            <font color="#0066FF"> (Each donation bag id represents one unit of blood) </font>
<!-------------------------------------------------------------------------------------------------->
                            <br>
                            <hr>
                            <a id="new_request" href="#new_request" role="button" class="btn" data-toggle="modal">Request for Blood</a>
                            <hr>
							<br>
<!-------------------------------------------------------------------------------------------------->
						</p>
					</div>
				</div>
			</div>
					
		</div>
	</div>
</div>
</body>
</html>