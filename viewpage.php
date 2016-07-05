<!DOCTYPE html>
<html lang="en">
<?php 	include "includes/config.php";
		//include "includes/id_check.php";
?>

<?php 	
		if(isset($_SESSION['id']))
		{	
			$user_id=$_SESSION['id'];
			$str="select * from user_details,users where users.id=user_details.user_id and user_details.user_id=".$user_id;
			$result_profile=$con->query($str);
			if($row_profile=$result_profile->fetch_assoc())
			{
				$fname=$row_profile['firstname'];
				$lname=$row_profile['lastname'];
				$password=$row_profile['password'];
				$mobile=$row_profile['mobile'];
				$city=$row_profile['city'];
				$state=$row_profile['state'];
				$country=$row_profile['country'];
				$profile=$row_profile['profile_pic'];
			}
			
			$str_users="select * from users where id=".$user_id;
			$result_users=$con->query($str_users);
			if($row_users=$result_users->fetch_assoc())
			{
				$uname=$row_users['username'];
				$email=$row_users['email'];
			}
		}
		$str_page="select * from menu where id=".$_REQUEST['p'];
		$result_page=$con->query($str_page);
		$row_page=$result_page->fetch_assoc();
		$str_pages="select * from menu where delete_status=0 limit 0,4";
		$result_pages=$con->query($str_pages);
		$str_t4="select * from blogs where status=1 limit 0,4";
		$result_t=$con->query($str_t4);
		
		
							
		
?>
<!-- Mirrored from demo.warungthemes.com/html/beeanca/post-format-gallery-slideshow.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:00 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="Lorem ipsum dolor sit amet">
    <meta name="keywords" content="beeanca,personal,themeforest,web,design,html,css,html5,development,warungdsgn,warungthemes,responsive">
    <meta name="author" content="Ari Rusmanto - WarungThemes">

    <title>Beeanca - Modern Blogging Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/icon.png">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Load -->
    <link href="assets/css/css-load.css" rel="stylesheet">

    <!-- Plugin Stylesheets -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/plugins/material-icon/material-icons.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="assets/plugins/image-lightbox/imagelightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheets -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Accent Color -->
    <link href="assets/css/colors/default.css" rel="stylesheet">

    <!-- Your own CSS to customize -->
    <link href="assets/css/your-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    
    <body class="has-load-animation">

    <!--
    ==========================
    BEGIN CONTENT
    ==========================
    -->

    
    <div class="wrapper fixed-layout">

         <!-- BEGIN HEADER -->
		<?php 
			include "includes/header.php";
		?>
        <!-- END HEADER -->
	

		
        <!-- BEGIN MAIN CONTENT -->
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">

                    <!-- Begin large content -->
                    <div class="col-md-8">
                        <div class="content">

                            <!-- Begin Post detail content -->
                            <div class="content-inner">

                                <!-- Begin post media -->
                                <div class="post-media has-post-format gallery-post">
                                    <!-- Begin featured image -->
                                    <div class="featured-img">
                                        <a href="" data-imagelightbox="f"><img src="" alt="Image"></a>
                                    </div><!-- /.featured-img -->
                                    <!-- End featured image -->

                                    <!-- Begin gallery slideshow -->
                                    <div class="owl-carousel owl-carousel-single-item inner-pagination">
                                       
                                       </div><!-- .owl-carousel-auto-height -->
                                    <!-- End gallery slideshow -->
									
                                </div><!-- /.post-media -->

                                <!-- Begin post heading -->
                                <div class="post-heading">
                                    <p class="category">
                                        <a href="#fakelink">Travel</a>
                                        <a href="#fakelink">Tips</a>
                                    </p>
                                    <h1 class="post-title">
                                        <?php echo $row_page['page_name'];?>
                                    </h1>
                                    <p class="post-meta">
                                        <span class="author"><a href="#fakelink"></a></span>
                                        <span></span>
                                        <span><a href="#fakelink"><i class="fa fa-heart-o"></i> 351</a></span>
                                    </p>

                                    <!-- Begin share Icons -->
                                    <div class="social-icons">
                                        <a href="#fakelink"><i class="fa fa-facebook"></i></a>
                                        <a href="#fakelink"><i class="fa fa-twitter"></i></a>
                                        <a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
                                        <a href="#fakelink"><i class="fa fa-tumblr"></i></a>
                                        <a href="#fakelink"><i class="fa fa-google-plus"></i></a>
                                        <a href="#fakelink"><i class="fa fa-envelope"></i></a>
                                    </div><!-- /.social-icons -->
                                    <!-- End share Icons -->

                                </div><!-- /.post-heding -->
                                <!-- End post heading -->

                                <!-- Begin post content -->
                                <div class="post-content">

                                    <!-- Begin post text -->
                                    <p>
										<?php echo $row_page['content'];?>
									 </p>
                                    <!-- End post text -->

                                    <!-- Begin tags anda share icons -->
                                    <div class="post-meta-bottom">
                                        <div class="widget-tags">
                                          <!--  <a href='editblog.php?blog_id="<?php /* echo $row['id']; */?>"'>Edit</a>
                                            <a href='operator.php?action=deleteblog&data="<?php /* echo $row['id']; */ ?>"'>Delete</a>-->
                                        </div><!-- /.widget-tags -->
                                        <!-- Begin share Icons -->
                                        <div class="social-icons">
                                            <a href="#fakelink"><i class="fa fa-facebook"></i></a>
                                            <a href="#fakelink"><i class="fa fa-twitter"></i></a>
                                            <a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#fakelink"><i class="fa fa-tumblr"></i></a>
                                            <a href="#fakelink"><i class="fa fa-google-plus"></i></a>
                                            <a href="#fakelink"><i class="fa fa-envelope"></i></a>
                                        </div><!-- /.social-icons -->
                                    </div><!-- /.post-meta-bottom -->
                                    <!-- End tags anda share icons -->

                                    <!-- Begin about author -->
                                   

                                    

                                </div><!-- /.post-content -->
                                <!-- End post content -->

                            </div><!-- /.content-inner -->
                            <!-- End Post detail content -->

                            <!-- Begin related posts -->
                            


                            

                           

                        </div><!-- /.content -->
                    </div><!-- /.col-md-8 -->
                    <!-- End large content -->
					

                    <!-- Begin sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar">

                            <!-- Begin about widget -->
                            <div class="widget">
                                <?php 
									if(isset($_SESSION['id']))
									{	
								?>
								<h4 class="widget-heading">Welcome <?php echo $_SESSION['user']; ?></h4>
                                <div class="widget-content">
									<div class="widget-about">
                                        <div class="avatar">
										<?php	
											if($profile!="" && file_exists("assets/upload/profile/".$profile)) 
											{ 
												echo "<img src='assets/upload/profile/".$profile.'?'.rand(1000000, 2000000)."'>";
											} 
											else 
											{
												echo "<img src='assets/images/no-user.gif' >";
											}
										?>
                                        </div><!-- /.avatra -->
                                        <p class="description">
                                            <form method="POST" action="operator.php">
												<table align="center">	
													<tr><td>User Name</td><td><?php echo $uname;?></td></tr>
													<tr><td>First Name</td><td><?php echo $fname; ?></td></tr>
													<tr><td>Last Name</td><td><?php echo $lname; ?></td></tr>
													<tr><td>Email</td><td><?php echo $email; ?></td></tr>
													<tr><td>City</td><td><?php echo $city;?></td></tr>
													<tr><td>State</td><td><?php echo $state; ?></td></tr>
													<tr><td>Country</td><td><?php echo $country; ?></td></tr>
												</table>
											</form>
										</p>
                                        <p></p>
                                    </div><!-- /.widget-aboutt -->
                                </div><!-- /.widget-content -->
									<?php } else{
									?>
								<h4 class="widget-heading"> User Login</h4>
                                <div class="widget-content">
                                    <div class="widget-about">
                                        <div class="avatar">
                                            <img src="images/login.jpg" alt="Avatar">
                                        </div><!-- /.avatra -->
                                        <p class="description">
											<?php  if(isset($_SESSION['register'])) { echo $_SESSION['register']; $_SESSION['register']="";  } ?>
                                            <form method="POST" action="operator.php">
												<table align="center">	
													<tr><td colspan=2 height="25"><span height="25"><?php  if(isset($_SESSION['error_msg'])) { echo $_SESSION['error_msg']; $_SESSION['error_msg']="";  } ?></span></td></tr>
													<input type="hidden" name="action" value="userlogin">
													<tr><td>User Name:</td><td><input type="text" name="data[uname]"></td></tr>
													<tr><td height="25"><input type="hidden" value="msg"></td><td><?php  if(isset($_SESSION['user_error'])) { echo $_SESSION['user_error']; $_SESSION['user_error']=""; } ?></td></tr>
													<tr><td>Password :</td><td><input  type="password"  name="data[password]"></td></tr>
													<tr><td height="25"><input type="hidden" value="msg"></td><td><?php  if(isset($_SESSION['password_error'])) { echo $_SESSION['password_error']; $_SESSION['password_error']=""; } ?></td></tr>
													<tr><td colspan=2 align="center"><input type="submit" name="submit" value="Login"></td></tr>
													<tr><td colspan=2 align="center">New User  <a href="user_registration.php" title="Registration">click here</a></td></tr>
												</table>
											</form>
										</p>
                                        <p><img src="user_registration.php" alt="Signature" class="signature" width="60"></p>
                                    </div><!-- /.widget-aboutt -->
                                </div><!-- /.widget-content -->
									<?} ?>
                            </div><!-- /.widget -->
                            <!-- End about widget -->

                            <!-- Begin social icons widget -->
                            <div class="widget">
                                <h4 class="widget-heading">Find me on socials</h4>
                                <div class="widget-content">
                                    <div class="widget-social-icons">
                                        <a href="https://goo.gl/9mLNAi"><i class="fa fa-facebook"></i></a>
                                        <a href="#fakelink"><i class="fa fa-twitter"></i></a>
                                        <a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
                                        <a href="#fakelink"><i class="fa fa-vine"></i></a>
                                        <a href="#fakelink"><i class="fa fa-instagram"></i></a>
                                        <a href="#fakelink"><i class="fa fa-dribbble"></i></a>
                                        <a href="#fakelink"><i class="fa fa-vimeo"></i></a>
                                        <a href="#fakelink"><i class="fa fa-google-plus"></i></a>
                                        <a href="#fakelink"><i class="fa fa-youtube"></i></a>
                                        <a href="#fakelink"><i class="fa fa-soundcloud"></i></a>
                                        <a href="#fakelink"><i class="fa fa-digg"></i></a>
                                        <a href="#fakelink"><i class="fa fa-tumblr"></i></a>
                                        <a href="#fakelink"><i class="fa fa-linkedin"></i></a>
                                        <a href="#fakelink"><i class="fa fa-github"></i></a>
                                    </div><!-- /.widget-social-icons -->
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget -->
                            <!-- End social icons widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-md-4 -->
                    <!-- End sidebar -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-wrapper -->
        <!-- END MAIN CONTENT -->

		<?php 
			include "includes/footer.php";
		?>

    </body>

<!-- Mirrored from demo.warungthemes.com/html/beeanca/post-format-gallery-slideshow.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:00 GMT -->
</html>