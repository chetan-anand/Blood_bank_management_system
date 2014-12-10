<?php
	include 'functions.php';
	include 'db_connect.php';
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
                                $string = 'You are logged in as '.$_SESSION['username'] .' : '.$_SESSION['role'];
                                echo '<a>'.$string.'</a>';
                                }
							?>
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
<br><br><br><br>
			<!---------------------------------------------------------------------------------------->

				<div align="center">
                    <form role="form" method="post" action="bloodbank.php">
                    <tr><td>
                    <h1><b> City : </b></h1></td>
                    <td><select id="city" name = "city">
                    <option  value="-1">- all -</option>                    
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
												$area = $row['br_area'];
											echo '<option value='.$area.'>'. $area .'</option>';
											}
								  }
							}										
				?>
                    
                    </select></td>
						
						<td><button id="searchBtn" type="submit" class="btn btn-default">Search</button></td>
						</tr>
                        </form>
					</div>
					<hr>
                    <table class="table table-hover">
						<thead>
							<tr>
								<th>
									Blood Bank
								</th>
								<th>
									Address
								</th>
								<th>
									Phone No.
								</th>
								<th>
									Email
								</th>
								<th>
									Area
								</th>
							</tr>
						</thead>
						<tbody>
						<?php
						if(isset($_POST['city']))
						{
							
							$city = $_POST['city'];
							if($city == "-1")
							{
								$selectSQL = "SELECT * FROM branch";
							}
							else{
									$selectSQL = "SELECT * FROM branch WHERE br_area = '$city'";
								}
							if( !( $selectRes = $mysqli->query($selectSQL) ) )
					  		{
								echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
					  		}
							else{
									 if( $selectRes -> num_rows == 0 )
									 {
										echo '<td>Sorry No Bloodbank is Affiliated currently from selected city</td>';
									  }
									  else
									  {
											
											while( $row = $selectRes -> fetch_assoc() )
												{
												echo "<tr><td>{$row['br_name']}</td><td>{$row['br_address']}</td><td>{$row['br_phone']}</td><td>{$row['br_email']}</td><td>{$row['br_area']}</td></tr>";
												}
									  }
								}
						  }
						  else
						  	{
								$city = '-1';
								if($city == "-1")
								{
									$selectSQL = "SELECT * FROM branch";
								}
								
								if( !( $selectRes = $mysqli->query($selectSQL) ) )
								{
									echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
								}
								else{
										 if( $selectRes -> num_rows == 0 )
										 {
											echo '<td>Sorry No Bloodbank is Affiliated currently from selected city</td>';
										  }
										  else
										  {
												
												while( $row = $selectRes -> fetch_assoc() )
													{
													echo "<tr><td>{$row['br_name']}</td><td>{$row['br_address']}</td><td>{$row['br_phone']}</td><td>{$row['br_email']}</td><td>{$row['br_area']}</td></tr>";
													}
										  }
									}
							}
						  ?>                            
						</tbody>
					</table>
			<!---------------------------------------------------------------------------------------->

		</div>
	</div>
</div>
</body>
</html>
