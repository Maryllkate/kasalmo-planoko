<!doctype html>
<html lang="en">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php';

if (isset($_GET['ref'])) {

$company_id = $_GET['ref'];



    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE member_no = :memberno AND role = 'coordinator'");
	$stmt->bindParam(':memberno', $company_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	
	if ($rec == "0") {
	header("location:./");	
	}else{

    foreach($result as $row)
    {
		
    $coorname = $row['first_name'];
	$compname = $row['last_name'];
	$compesta = $row['byear'];
    $compmail  = $row['email'];
	$comptype = $row['title'];
    $compphone = $row['phone'];
	$compcity = $row['city'];
	$compstreet = $row['street'];
	$compzip = $row['zip'];
    $compbout = $row['about'];
	$complogo = $row['avatar'];
	$compserv = $row['services'];
	$compexp = $row['expertise'];
	$compweb = $row['website'];
	
	}
	
	}

					  
	}catch(PDOException $e)
    {
 
    }
	
}else{
header("location:./");
}

if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 = 0;
$page = 1;
}else{
$page1 = ($page*5)-5;
}					
}else{
$page1 = 0;
$page = 1;	
}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kasal Mo, Plano Ko - <?php echo "$coorname"; ?></title>
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


<body class="not-transparent-header">

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
							<li><a href="'.$myrole.'">Profile</a></li>';
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

			
		</header>

		<div class="main-wrapper">
		
			<div class="breadcrumb-wrapper">
			
				<div class="container">
				
					<ol class="breadcrumb-list booking-step">
						<li><a href="coordinator.php">Coordinators</a></li>
						<li><span><?php echo "$coorname"; ?></span></li>
					</ol>
					
				</div>
				
			</div>

			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-md-10 col-md-offset-1">
							
								<div class="company-detail-wrapper">
								
									<div class="company-detail-header text-center">
										
										<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center>Company Logo Here</center>';
										}else{
										echo '<center><img alt="image" title="'.$coorname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										?>
										</div>
										
										<h2 class="heading mb-15"><?php echo "$coorname"; ?></h2>
									
										<p class="location"><i class="fa fa-map-marker"></i> <?php echo "$compzip"; ?> <?php echo "$compcity"; ?>. <?php echo "$compstreet"; ?> <span class="mh-5">|</span> <i class="fa fa-phone"></i> <?php echo "$compphone"; ?></p>
										
										<ul class="meta-list clearfix">
											<li>
												<h4 class="heading">Company:</h4>
												<?php echo "$compname"; ?>
											</li>
											<li>
												<h4 class="heading">Established In:</h4>
												<?php echo "$compesta"; ?>
											</li>
											<li>
												<h4 class="heading">Website: </h4>
												<a target="_blank" href="https://<?php echo "$compweb"; ?>"><?php echo "$compweb"; ?></a>
											</li>
										</ul>
										
									</div>
						
									<div class="company-detail-company-overview clearfix">
									
										<h3>Company background</h3>
										
										<p><?php echo "$compbout"; ?></p>

										<div class="row">

									</div>

										<h3>Attachments</h3>
												<ul class="couple-detail-list">
												<?php
												require 'constants/db_config.php';
												try {
                                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                $stmt = $conn->prepare("SELECT * FROM tbl_other_attachments WHERE member_no = :memberno ORDER BY id");
	                                            $stmt->bindParam(':memberno', $company_id);
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
	                                            $rec = count($result);
	                                            if ($rec == "0") {
 
	                                            }else{

                                                foreach($result as $row)
                                                {
                                                ?>
												<li>
												<h5><?php echo $row['title']; ?> </h5>
												<p class="font600 text-primary"><?php echo $row['issuer']; ?></p>
												<p><a target="_blank" class="btn btn-primary btn-sm mb-5 mb-0-sm" href="view-attachment.php?id=<?php echo $row['id']; ?>">View Attachment</a></p>
												</li>
												<?php
	                                            }
	
	                                            }

					  
	                                            }catch(PDOException $e)
                                                {

                                                 } ?>
										
										
													
												</ul>
												</ul>
												</div>

										
										<h3>Services</h3>
										
										<p><?php echo "$compserv"; ?></p>
										
										
									</div><br><br>

									
									<div class="section-title mb-40">
						
										<h4 class="text-left">Package offered by <?php echo "$coorname"; ?></h4>
										
									</div>

									<div class="result-list-wrapper">
									<?php
									require 'constants/db_config.php';
									
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                    $stmt = $conn->prepare("SELECT * FROM tbl_packages WHERE company = :compid ORDER BY enc_id DESC LIMIT 5");
                                    $stmt->bindParam(':compid', $company_id);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
									
									?>
										<div class="job-item-list">
										
											<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
										}else{
										echo '<center><img class="autofit3" alt="image" title="'.$coorname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										 ?>
											</div>
											
											<div class="content">
												<div class="job-item-list-info">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														
															<h4 class="heading"><?php echo $row['title']; ?></h4>
															<div class="meta-div clearfix mb-25">
															<span>at <a href="company.php?ref=<?php echo "$company_id"; ?>"><?php echo "$compname"; ?></a></span>
															</div>
														</div>
														
														<div class="col-sm-5 col-md-4">
														<ul class="meta-list">
															<li>
																<span>City:</span>
																<?php echo $row['city']; ?>
															</li>
															<li>
																<span>Price:</span>
																<?php echo $row['price']; ?>
															</li>
														</ul>
														</div>
														
													</div>
												
												</div>
											
												<div class="job-item-list-bottom">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														<div class="sub-category">


														</div>
														</div>
														
													<div class="col-sm-5 col-md-4">
														<a target="_blank" href="explore-package.php?pkid=<?php echo $row['pk_id']; ?>" class="btn btn-primary">View This Package</a>
													</div>
														
													</div>
												
												</div>
											
											
											</div>
										
										</div>
										<?php
		
 
	                                }

					  
									}catch(PDOException $e)
                                    {

                                    }
	                                     ?>

									</div>
								<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
								require'constants/db_config.php';
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                $stmt = $conn->prepare("SELECT * FROM tbl_packages WHERE company = :compid ORDER BY enc_id DESC");
                                $stmt->bindParam(':compid', $company_id);
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach($result as $row)
                                {
		                        $total_records++;
	 
	                            }

					  
	                            }catch(PDOException $e)
                                {
                         
                                 }
	
								$records = $total_records/5;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="company.php?ref='.$company_id.'&page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="company.php?ref=<?php echo "$company_id"; ?>&page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="company.php?ref='.$company_id.'&page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
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