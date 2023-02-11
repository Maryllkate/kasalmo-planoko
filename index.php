<!doctype html>
<html lang="en">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kasal Mo, Plano Ko - Coordinators Portal</title>
	<meta name="description" content="Wedding Coordinator Service Portal" />
	<meta name="keywords" content="wedding, couple, coordinator, company" />
	<meta name="author" content="PSU Students">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Kasal Mo, Plano Ko" />
    <meta property="og:description" content="Wedding Coordinator Service Portal" />

	<link rel="shortcut icon" href="images/ico/favicon.ico">


	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	<link href="css/style.css" rel="stylesheet">

	
</head>

  <style>
  
    .autofit2 {
	height:70px;
	width:400px;
    object-fit:cover; 
  }
  
      .autofit3 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  

  </style>
<body class="home">


	<div id="introLoader" class="introLoading"></div>

	<div class="container-wrapper">

		<header id="header">

			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function">

				<div class="container">
					
					<div class="logo-wrapper">
						<div class="logo">
							<a href="./"><img src="images/logo.png" alt="Logo" /></a>
						</div>
					</div>
					
					<div id="navbar" class="navbar-nav-wrapper navbar-arrow">
					
						<ul class="nav navbar-nav" id="responsive-menu">
						
							<li>
							
								<a href="./">Home</a>
								
							</li>
							
							<li>
								<a href="package-list.php">Package List</a>

							</li>
							
							<li>
								<a href="coordinator.php">Coordinators</a>
							</li>
							
							<li>
								<a href="contact.php">Contact Us</a>
							</li>

						</ul>
				
					</div>

					<div class="nav-mini-wrapper">
						<ul class="nav-mini sign-in">
						<?php
						if ($user_online == true) {
						print '
						    <li><a href="logout.php">logout</a></li>
							<li><a href="'.$myrole.'">Dashboard</a></li>';
						}else{
						print '
							<li><a href="login.php">login</a></li>
							<li><a data-toggle="modal" href="#registerModal">register</a></li>';						
						}
						
						?>

						</ul>
					</div>
				
				</div>
				
				<div id="slicknav-mobile"></div>
				
			</nav>

			
			<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" style="display: none;" data-backdrop="static" data-keyboard="false" data-replace="true">
			
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Create your account for free</h4>
				</div>
				
				<div class="modal-body">
				
					<div class="row gap-20">
					
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Coordinator" class="btn btn-facebook btn-block mb-5-xs">Register as Coordinator</a>
						</div>
						<div class="col-sm-6 col-md-6">
							<a href="register.php?p=Couple" class="btn btn-facebook btn-block mb-5-xs">Register as Couple</a>
						</div>

					</div>
				
				</div>
				
				<div class="modal-footer text-center">
					<button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Close</button>
				</div>
				
			</div>

			
		</header>

		<div class="main-wrapper">
		
			<div class="hero" style="background-image:url('images/hero-header/01.jpg');">
				<div class="container">

					<h1>Dream Wedding</h1>
					<p>Finding your best wedding coordinator on Kasal Mo, Plano Ko</p>

					<div class="main-search-form-wrapper">
					
					<form action="package-list.php" method="GET" autocomplete="off">
					
					<div class="form-holder">
						<div class="row gap-1">
						<!--select category-->
							<div class="col-xss-6 col-xs-6 col-sm-6">
								<select class="form-control" name="category" required>
								<option value="">-Select category-</option>
								 <?php
								 require 'constants/db_config.php';
								 try {
								 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


								 $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
								 $stmt->execute();
								 $result = $stmt->fetchAll();

								 foreach($result as $row)
								 {
								?>
								
								<option style="color:black" value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
								<?php
								 }
								 $stmt->execute();
			  
								 }catch(PDOException $e)
								 {

								 }

								?>
												   
								</select>
							</div>
							<!--select city-->
							<div class="col-xss-6 col-xs-6 col-sm-6">
								<select class="form-control"  name="city" required/>
								<option value="">-Select city-</option>
								 <?php
								 require 'constants/db_config.php';
								 try {
								 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


								 $stmt = $conn->prepare("SELECT * FROM tbl_cities ORDER BY city_name");
								 $stmt->execute();
								 $result = $stmt->fetchAll();

								 foreach($result as $row)
								 {
								?>
								
								<option style="color:black" value="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
								<?php
								 }
								 $stmt->execute();
			  
								 }catch(PDOException $e)
								 {
	   
								 }

								?>

								</select>
							</div>
							<!--book-an-appointment 
							<div class="col-xss-6 col-xs-6 col-sm-6">
								<select class="form-control">
								<option value="">-Book an Appointment-</option>
							</div> -->

						</div> <!--end of row-gap-->
					</div> <!--end of form-holder-->
					
					<div class="btn-holder">
						<button name="search" value="✓" type="submit" class="btn"><i class="ion-android-search"></i></button>
					</div>
				
				</form>
						
					</div>

				</div>
				
			</div>

			
			<div class="post-hero bg-light">
			
				<div class="container">

					<div class="process-item-wrapper mt-20">
							
						<div class="row">
						
							<div class="col-sm-4">
								
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-magnification-lens"></i>
									</div>
									
									<div class="content">
										<h5>01 / Find Package</h5>
									</div>
									
								</div>
								
							</div>
							
							<div class="col-sm-4">
							
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-pencil"></i>
									</div>
									
									<div class="content">
										<h5>02 / Contact Coordinator</h5>
									</div>
									
								</div>
								
							</div>
							
							<div class="col-sm-4">
								
								<div class="process-item clearfix">
									
									<div class="icon">
										<i class="flaticon-line-icon-set-calendar"></i>
									</div>
									
									<div class="content">
										<h5>03 / Start Planning</h5>
									</div>
									
								</div>
								
							</div>
							
						</div>
					
					</div>
					
				</div>
			
			</div>


			<div class="pt-0 pb-50">
			
				<div class="container">

					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<br><h2>Coordinators</h2>
								
							</div>
						
						</div>
					
					</div>
					
					<div class="row top-company-wrapper with-bg">

							
					<?php
					require 'constants/db_config.php';
					try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE role = 'coordinator' ORDER BY rand() LIMIT 8");
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                    foreach($result as $row) {
					$complogo = $row['avatar'];
					?>
					<div class="col-xss-12 col-xs-6 col-sm-4 col-md-3">
							
					<div class="top-company">
					<div class="image">
					<?php 
					if ($complogo == null) {
					print '<center><img class="autofit2" alt="image"  src="images/blank.png"/></center>';
					}else{
					echo '<center><img class="autofit2" alt="image"  src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
					}
					?>
					</div>
					<h6><?php echo $row['first_name'];?></h6>
					<a target="_blank" href="company.php?ref=<?php echo $row['member_no']; ?>">View Coordinator</a>
					</div>
							
					</div>
					<?php
					
                    {

	                }
					  
	                }}catch(PDOException $e)
                    {

                    }
	
					?>
						

						
						
					</div>

				</div>

			</div>
			
			<div class="bg-light pt-80 pb-80">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
								<h2>Packages</h2>
								
							</div>
						
						</div>
					
					</div>
					
					<div class="row">
						
						<div class="col-md-12">
						
							<div class="recent-job-wrapper alt-stripe mr-0">
							<?php
							require 'constants/db_config.php';
							try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM tbl_packages ORDER BY RAND() LIMIT 8");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
  

                            foreach($result as $row) {
							$pkcity = $row['city'];
							$title = $row['title'];
							$price = $row['price'];
							$company_id = $row['company'];

										   
							$stmtb = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = '$company_id' and role = 'coordinator'");
                            $stmtb->execute();
                            $resultb = $stmtb->fetchAll();
							foreach($resultb as $rowb) {
							$complogo = $rowb['avatar'];
							$coorname = $rowb['first_name'];	
							$compname = $rowb['last_name'];	
								
							}
							
							?>
							<a class="recent-job-item clearfix" target="_blank" href="explore-package.php?pkid=<?php echo $row['pk_id']; ?>">
							<div class="GridLex-grid-middle">
							<div class="GridLex-col-5_xs-12">
							<div class="job-position">
							<div class="image">
							<?php 
							if ($complogo == null) {
							print '<center><img alt="image"  src="images/blank.png"/></center>';
							}else{
							echo '<center><img alt="image" title="'.$coorname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
							}
							?>
							</div>
							<div class="content">
							<h4><?php echo "$title"; ?></h4>
							<p><?php echo "$coorname"; ?></p>
							<p><?php echo "$compname"; ?></p>
							</div>
							</div>
							</div>
							<div class="GridLex-col-5_xs-8_xss-12 mt-10-xss">
							<div class="job-location">
							<i class="fa fa-map-marker text-primary"></i> <?php echo "$pkcity" ?></strong>
							</div>
							</div>
							<h4>₱ <?php echo "$price"; ?></h4>
							<div class="GridLex-col-2_xs-4_xss-12">
							</div>
							</div>
							</a>
								
							<?php

                            }
	                        }catch(PDOException $e)
                            { 
                   
                             }
                             ?>
						



							
							</div>
							
						</div>
						
					</div>
					
				</div>
			
			</div>
		</div>
							</div>
			
			<?php
			include "footer.php";                
			?>
			
		</div>


	</div>

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="js/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/jquery.countimator.js"></script>
<script type="text/javascript" src="js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>


</html>