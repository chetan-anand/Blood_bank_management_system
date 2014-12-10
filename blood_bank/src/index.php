<?php
	include 'functions.php';
	include 'db_connect.php';
	secure_session_start();
    if(login_check($mysqli) == true)
	{
		header('Location: ./loggedin.php');
	}
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

<body>
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
							<a href="#">Link</a>
						</li>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<strong class="caret"></strong></a>

							<ul class="dropdown-menu">

							<!------------------------------------------------------------>
								
								<li>
									<div class="container">
										<div class="row clearfix">
											<div class="col-md-6 column">
									
									<?php
                                    if(isset($_GET['error'])) { 
                                       echo 'Error Logging In!';
                                    }
                                    ?>
									<form role="form" action="process_login.php" method="post">
										<div class="form-group">
											 <label for="username">User name :</label><input type="text" class="form-control"name="username" id="username" >
										</div>
										<div class="form-group">
											 <label for="pass">Password :</label><input type="password" class="form-control" name="password" id="password" >
										</div>
										
										<!--<div class="checkbox">
											 <label><input type="checkbox"> Remember me</label>
										</div>-->
										<button type="submit" class="btn btn-default">Login</button>
									</form>
									</div>
									</div>
									</div>
								
								</li>
								
								
								<!------------------------------------------------------------>
							<!--<li>
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
								</li>-->
							</ul>

						</li>
					</ul>
				</div>
				
			</nav>

			<!--<form role="form">
				<div class="form-group">
					 <label for="exampleInputEmail1">Email address</label><input type="email" class="form-control" id="exampleInputEmail1">
				</div>
				<div class="form-group">
					 <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="form-group">
					 <label for="exampleInputFile">File input</label><input type="file" id="exampleInputFile">
					<p class="help-block">
						Example block-level help text here.
					</p>
				</div>
				<div class="checkbox">
					 <label><input type="checkbox"> Check me out</label>
				</div> <button type="submit" class="btn btn-default">Submit</button>
			</form>-->
			<!--<div class="btn-group">
				 <button class="btn btn-default">Action</button> <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
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
			</div>-->
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

			<br>
			<br>
			<br>
			<br>
			<div class="jumbotron">
				<h1>
					Hello, world!
				</h1>
				<p>
					This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="#">Learn more</a>
				</p>
			</div>
			<hr>
			<div class="carousel slide" id="carousel-440819">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-440819">
					</li>
					<li data-slide-to="1" data-target="#carousel-440819">
					</li>
					<li data-slide-to="2" data-target="#carousel-440819">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="http://lorempixel.com/1600/500/sports/1">
						<div class="carousel-caption">
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="http://lorempixel.com/1600/500/sports/2">
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="http://lorempixel.com/1600/500/sports/3">
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-440819" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-440819" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<br>
	<br>
	<hr>
	<div class="row clearfix">
		<div class="col-md-12 column">
			<!--<div class="row clearfix">
				<div class="col-md-6 column">
				</div>
				<div class="col-md-6 column">
				</div>
			</div>-->
			<div class="panel-group" id="panel-137471">
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-137471" href="#panel-element-948449">Register as a blood donor</a>
					</div>
					<div id="panel-element-948449" class="panel-collapse collapse">
						<div class="panel-body">
							<!--Anim pariatur cliche...-->
							<b>Welcome to Donor Registration Form</b><br>
							<hr>
							<form role="form" method="post" action="registration.php">
								
                                <div class="form-group">
									 <input type="hidden" class="form-control" id="role" name="role" value="donor">
								</div>

								<div class="form-group">
									 <label for="d_username">Donor Name *</label><input type="text" class="form-control" id="d_username" name="d_username" required>
								</div>

								<div class="form-group">
									 <label for="d_address">Address</label><input type="text" class="form-control" id="d_address" name="d_address">
								</div>

								<div class="form-group">
									 <label for="d_area">Area *</label><br>
									 <select id="d_area" name="d_area" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     	<?php
										$selectSQL = "SELECT DISTINCT br_area FROM branch";
	
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
																$donor_area = $row['br_area'];
															echo '<option value='.$donor_area.'>'. $donor_area .'</option>';
															}
												  }
											}										
                                        ?>
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
									<label for="d_blood_group">Blood Group *</label><br>
									 <select id="d_blood_group" required name="d_blood_group" class="formation_select required"><option value="">- select -</option>
                                     	<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										</select>
								</div>


								<div class="form-group">
									 <label for="d_nationality">National Id</label><input type="text" class="form-control" id="d_nationality" name="d_nationality">
								</div>

								<div class="form-group">
									 <label for="d_phone">Phone Number</label><input type="text" class="form-control" id="d_phone" name="d_phone">
								</div>

								<div class="form-group">
									 <label for="d_email">Email *</label><input type="email" class="form-control" id="d_email" name="d_email" required>
								</div>

								<div class="form-group">
									 <label for="d_password">Password *</label><input type="password" class="form-control" id="d_password" name="d_password" required>
								</div>

								<div class="form-group">
									 <label for="con_d_password">Confirm Password *</label><input type="password" class="form-control" id="con_d_password" name="con_d_password" required>
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>	
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						 <a class="panel-title" data-toggle="collapse" data-parent="#panel-137471" href="#panel-element-892521">Request for blood</a>
					</div>
					<div id="panel-element-892521" class="panel-collapse in">
						<div class="panel-body">
							<!--Anim pariatur cliche...-->
							<b>Welcome to Receipent Registration Form</b> <br>
							<hr>
							<!--<form role="form" method="post" action="registration.php">
							
								<div class="form-group">
									 <input type="hidden" class="form-control" id="role" name="role" value="applicant">
								</div>

								<div class="form-group">
									 <label for="req_username">Name *</label><input type="text" class="form-control" id="req_username" name="req_username" required>
								</div>

								<div class="form-group">
									 <label for="req_hospital">Request Hospital *</label><input type="text" class="form-control" id="req_hospital" required name="req_hospital">
								</div>

								<div class="form-group">
									 <label for="req_area">Request Area *</label><br>
									 <select id="req_area" required name="req_area" class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     	<!--<option value="1">Bagalkot</option>
										<option value="2">Bangalore</option>-->
										<?php
//											$selectSQL = "SELECT DISTINCT br_area FROM branch";
//	
//										if( !( $selectRes = $mysqli->query($selectSQL) ) )
//										{
//											echo '<option value="">Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</option>';
//										}
//										else{
//												 if( $selectRes -> num_rows == 0 )
//												 {
//													echo '<option value=""> Sorry .Problem occurred while fetching the affiliated area. </option>';
//												  }
//												  else
//												  {
//														
//														while( $row = $selectRes -> fetch_assoc() )
//															{
//																$applicant_area = $row['br_area'];
//															echo '<option value='.$applicant_area.'>'. $applicant_area .'</option>';
//															}
//												  }
//											}										
//                                        ?>
										<!--</select>
								</div>

								<!--<div class="form-group">
									 <label for="req_area">Request Area</label><input type="text" class="form-control" id="req_area">
								</div>-->

								<!--<div class="form-group">
									 <label for="req_blood_group">Request Blood Group</label><input type="text" class="form-control" id="req_blood_group">
								</div>-->

								<!--<div class="form-group">
									<label for="req_blood_group">Blood Group *</label><br>
									 <select id="req_blood_group" required name="req_blood_group" class="formation_select required"><option value="">- select -</option><option value="1">A+</option>
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
								
                                <div class="form-group">
									 <label for="req_address">Address</label><input type="text" class="form-control" id="req_address" name="req_address">
								</div>

								<div class="form-group">
									 <label for="req_phone">Phone Number</label><input type="text" class="form-control" id="req_phone" name="req_phone">
								</div>

								<div class="form-group">
									 <label for="req_email">Email *</label><input type="email" class="form-control" id="req_email" name="req_email" required>
								</div>

								<div class="form-group">
									 <label for="req_password">Password *</label><input type="password" class="form-control" id="req_password" name="req_password" required>
								</div>
                                
                                <div class="form-group">
									 <label for="con_d_password">Confirm Password *</label><input type="password" class="form-control" id="con_d_password" name="con_d_password" required>
								</div>

								

								<div class="form-group">
									 <label for="req_amount">Required Amount * (in units)</label><input type="text" class="form-control" id="req_amount" name="req_amount" required>
								</div>

								 <button type="submit" class="btn btn-default">Submit</button>
							</form>-->
                            
                            <form role="form" method="post" action="registration.php">
								
                                <div class="form-group">
									 <input type="hidden" class="form-control" id="role" name="role" value="donor">
								</div>

								<div class="form-group">
									 <label for="d_username">Applicant Name *</label><input type="text" class="form-control" id="d_username" name="d_username" required>
								</div>

								<div class="form-group">
									 <label for="d_address">Address</label><input type="text" class="form-control" id="d_address" name="d_address">
								</div>

								<div class="form-group">
									 <label for="d_area">Area *</label><br>
									 <select id="d_area" name="d_area" required class="formation_select required" style="width: 230px;"><option value="">- select -</option>
                                     	<?php
										$selectSQL = "SELECT DISTINCT br_area FROM branch";
	
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
																$donor_area = $row['br_area'];
															echo '<option value='.$donor_area.'>'. $donor_area .'</option>';
															}
												  }
											}										
                                        ?>
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
									<label for="d_blood_group">Blood Group *</label><br>
									 <select id="d_blood_group" required name="d_blood_group" class="formation_select required"><option value="">- select -</option>
                                     	<option value="A+">A+</option>
										<option value="A-">A-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
										</select>
								</div>


								<div class="form-group">
									 <label for="d_nationality">National Id</label><input type="text" class="form-control" id="d_nationality" name="d_nationality">
								</div>

								<div class="form-group">
									 <label for="d_phone">Phone Number</label><input type="text" class="form-control" id="d_phone" name="d_phone">
								</div>

								<div class="form-group">
									 <label for="d_email">Email *</label><input type="email" class="form-control" id="d_email" name="d_email" required>
								</div>

								<div class="form-group">
									 <label for="d_password">Password *</label><input type="password" class="form-control" id="d_password" name="d_password" required>
								</div>

								<div class="form-group">
									 <label for="con_d_password">Confirm Password *</label><input type="password" class="form-control" id="con_d_password" name="con_d_password" required>
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<hr>
	<div class="row clearfix">
		<div class="col-md-4 column">
			<img alt="140x140" src="http://lorempixel.com/140/140/" class="img-rounded">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4 column">
			<img alt="140x140" src="http://lorempixel.com/140/140/" class="img-rounded">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4 column">
			<img alt="140x140" src="http://lorempixel.com/140/140/" class="img-rounded">
			<h2>
				Heading
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
	</div>
</div>
</body>
</html>
