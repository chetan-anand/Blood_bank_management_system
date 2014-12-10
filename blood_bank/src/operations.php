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
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="sudo.php">Admin Panel</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
							<a href="bloodbank.php">Operations</a>
						</li>
						<li>
							<a href="emp_registration.php">Employee Regisatration</a>
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
                               			header('Location: ./index.php');
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
            <!---------------------------table for blood group count ----------------------------------->
			<br>
			<br>
			<br>
			<hr>
            <h3><b>Repository</b></h3>
            <table class="table table-hover">
							<thead>
								<tr>
									<th>
										Blood Group
									</th>
									<th>
										Total Units
									</th>
									<th>
										Percentage
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
                                        
                                        $userid = $_SESSION['userid'];
                                        if($userid == "")
                                        {
                                            echo'<td>Sorry it seems you have been logged out.A problem has been encountered.</td>';
                                        }
                                        else{
                                                $totalselectSQL = "select count(blood_id) as total from bloodrepo where blood_status = '1' and donate_status = '1' and request_status= '0' ";
												$individualselectSQL = "select blood_group, count(blood_id) as count from bloodrepo where blood_status = '1' and donate_status = '1' and request_status= '0' group by blood_group ";
                                            }
                                        if( !( $totalselectRes = $mysqli->query($totalselectSQL) ) )
                                        {
                                            echo '<td>Counting total blood bag ids Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
										if( !( $individualselectRes = $mysqli->query($individualselectSQL) ) )
                                        {
                                            echo '<td>Counting individual blood bag ids Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
                                        else{
                                                 if( $individualselectRes -> num_rows == 0 || $totalselectRes -> num_rows == 0 )
                                                 {
                                                    echo '<td> No blood in Repository </td>';
                                                  }
                                                  else
                                                  {
													  $totalRow = $totalselectRes -> fetch_assoc();
													  $total = $totalRow['total'];
													  $divclass1 = "progress progress-striped active";
                                                      $divclass2 = "progress-bar progress-bar-info";
													  
                                                        while( $row = $individualselectRes -> fetch_assoc() )
                                                            {
															$percent = $row['count']*100/$total;
															
															$style = "width: ".$percent."%";
                                                            echo "<tr>
																	<td>{$row['blood_group']}</td>
																	<td>{$row['count']}</td>
																	<td>
																	<div class='$divclass1'>
																		<div class= '$divclass2' style = '$style'>
																		</div>
																	</div>
																	</td>
																   </tr>";
                                                            }
                                                  }
                                            }
                                      ?>
							</tbody>
						</table>

            
            
            <!---------------------------------------------------------------------->
            <br>
			<br>
			<br>
			<hr>
			
			<div class="tabbable" id="tabs-435656">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#panel-944025" data-toggle="tab">Donor Operations</a>
					</li>
					<li>
						<a href="#panel-116760" data-toggle="tab">Recipient Operations</a>
					</li>
					<li>
						<a href="#panel-116761" data-toggle="tab">Add Branch</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-944025">
						<p>
							<h3><b>Donor Approval Table</b></h3>
							<table class="table table-hover">
							<thead>
								<tr>
									<th>
										Donor Id
									</th>
									<th>
										Donation Bag Id
									</th>
									<th>
										Approval Links
									</th>

								</tr>
							</thead>
							<tbody>
								<?php
                                        
                                        $userid = $_SESSION['userid'];
                                        if($userid == "")
                                        {
                                            echo'<td>Sorry it seems you have been logged out.A problem has been encountered.</td>';
                                        }
                                        else{
                                                $selectSQL = "SELECT * FROM don_repo_rel WHERE blood_id IN ( SELECT blood_id FROM bloodrepo WHERE donate_status = '0') ORDER BY blood_id ASC ";
                                            }
                                        if( !( $selectRes = $mysqli->query($selectSQL) ) )
                                        {
                                            echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
                                        else{
                                                 if( $selectRes -> num_rows == 0 )
                                                 {
                                                    echo '<td> No new blood donation requests </td>';
                                                  }
                                                  else
                                                  {
                                                        
                                                        while( $row = $selectRes -> fetch_assoc() )
                                                            {
																$hash = 'link_update.php?blood_id='.$row['blood_id'].'&type=donate';
                                                            echo "<tr><td>{$row['d_id']}</td><td>{$row['blood_id']}</td><td><a href=".$hash.">Approve</a></td></tr>";
                                                            }
                                                  }
                                            }
                                      ?>
							</tbody>
						</table>

						</p>
					</div>
					<div class="tab-pane" id="panel-116760">
						<p>
							<h3><b>Recipient Approval Table</b></h3>
							<table class="table table-hover">
							<thead>
								<tr>
									<th>
										Request User Id
									</th>
									<th>
										Request Id
									</th>
                                    <th>
										Blood Group
									</th>
									<th>
										Approval Links
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                        
                                        $userid = $_SESSION['userid'];
                                        if($userid == "")
                                        {
                                            echo'<td>Sorry it seems you have been logged out.A problem has been encountered.</td>';
                                        }
                                        else{
                                                $selectSQL = "SELECT * FROM br_req_rel WHERE request_status = '0' ORDER BY request_id ASC ";
                                            }
                                        if( !( $selectRes = $mysqli->query($selectSQL) ) )
                                        {
                                            echo '<td>Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error().'</td>';
                                        }
                                        else{
                                                 if( $selectRes -> num_rows == 0 )
                                                 {
                                                    echo '<td> No new blood donation requests </td>';
                                                  }
                                                  else
                                                  {
                                                        
                                                        while( $row = $selectRes -> fetch_assoc() )
                                                            {
																$hash = 'link_update.php?request_id='.$row['request_id'].'&blood_group='.rawurlencode($row['blood_group']);
																
                                                            echo "<tr><td>{$row['user_id']}</td><td>{$row['request_id']}</td><td>{$row['blood_group']}</td><td><a href=".$hash.">Approve</a></td></tr>";
                                                            }
                                                  }
                                            }
                                      ?>
							</tbody>
						</table>
						</p>
					</div>

					<div class="tab-pane" id="panel-116761">
						<p>
							<h3><b>Add New Branch</b></h3>
							<hr>
							<form role="form" method="post" action="update.php"  >
								

								<div class="form-group">
									 <label for="br_name">Branch Name *</label>
                                     <input type="text" class="form-control" id="br_name" name="br_name" required>
								</div>

								<div class="form-group">
									 <label for="br_address">Address *</label>
                                     <input type="text" class="form-control" id="br_address" name="br_address" required>
								</div>

								<div class="form-group">
									 <label for="br_area">Area *</label>
									 <input type="text" class="form-control" id="br_area" name="br_area" required>
								</div>

								
								<div class="form-group">
									 <label for="br_phone">Phone Number *</label>
                                     <input type="text" class="form-control" id="br_phone" name="br_phone" required>
								</div>

								<div class="form-group">
									 <label for="br_email">Email *</label>
                                     <input type="email" class="form-control" id="br_email" name="br_email" required>
								</div>

								<button type="submit" class="btn btn-default">Submit</button>
							</form>

						</p>
					</div>
					<!-------------------------------------------------------------------->
				</div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
