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
							<?php
                                if(login_check($mysqli) == true) 
								{
                                $string = 'You are logged in as '.$_SESSION['username'] .':'.$_SESSION['role'];
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
							<h3><b>Account Setting </b></h3>
							
							<form role="form">
							
								<!--<div class="form-group">
									 <label for="req_id">Request id</label><input type="text" class="form-control" id="req_id">
								</div>-->

								<div class="form-group">
									 <label for="req_name">Name</label><input type="text" class="form-control" id="req_name">
								</div>

								<div class="form-group">
									 <label for="req_hospital">Request Hospital</label><input type="text" class="form-control" id="req_hospital">
								</div>

								<div class="form-group">
									 <label for="req_confirm">Request Confirm</label><input type="text" class="form-control" id="req_confirm">
								</div>

								<div class="form-group">
									 <label for="Req_area">Request Area</label><br>
									 <select id="req_area" name="req_area" class="formation_select required" style="width: 230px;"><option value="">- select -</option><option value="1">Bagalkot</option>
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

								<!--<div class="form-group">
									 <label for="req_area">Request Area</label><input type="text" class="form-control" id="req_area">
								</div>-->

								<!--<div class="form-group">
									 <label for="req_blood_group">Request Blood Group</label><input type="text" class="form-control" id="req_blood_group">
								</div>-->

								<div class="form-group">
									<label for="req_bg">Blood Group</label><br>
									 <select id="req_bg" name="req_bg" class="formation_select required"><option value="">- select -</option><option value="1">A+</option>
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
									 <label for="req_phone">Phone Number</label><input type="text" class="form-control" id="req_phone">
								</div>

								<div class="form-group">
									 <label for="req_email">Email</label><input type="email" class="form-control" id="req_email">
								</div>

								<div class="form-group">
									 <label for="req_password">Password</label><input type="password" class="form-control" id="req_password">
								</div>

								<div class="form-group">
									 <label for="req_address">Address</label><input type="text" class="form-control" id="req_address">
								</div>

								<div class="form-group">
									 <label for="req_amount">Required Amount</label><input type="text" class="form-control" id="req_amount">
								</div>

								 <button type="submit" class="btn btn-default">Submit</button>
							</form>
							
						</p>
					</div>
					<div class="tab-pane" id="panel-697151">
						<p>
							<h3><b>Recipient Past History </b></h3>
							
							<table class="table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Product
						</th>
						<th>
							Payment Taken
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Default
						</td>
					</tr>
					<tr class="active">
						<td>
							1
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							01/04/2012
						</td>
						<td>
							Approved
						</td>
					</tr>
					<tr class="success">
						<td>
							2
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							02/04/2012
						</td>
						<td>
							Declined
						</td>
					</tr>
					<tr class="warning">
						<td>
							3
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							03/04/2012
						</td>
						<td>
							Pending
						</td>
					</tr>
					<tr class="danger">
						<td>
							4
						</td>
						<td>
							TB - Monthly
						</td>
						<td>
							04/04/2012
						</td>
						<td>
							Call in to confirm
						</td>
					</tr>
				</tbody>
			</table>
						</p>
					</div>
				</div>
			</div>
			</table>
		</div>
	</div>
</div>
</body>
</html>
