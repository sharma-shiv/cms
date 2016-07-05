<!DOCTYPE html>
<html lang="en">
<?php 	
	include "includes/config.php"; 
	if(isset($_SESSION['id']))
	{	
	//include "includes/id_check.php";
	$strblog="select * from blogs where status=1";
	$result=$con->query($strblog);
	isset($_GET['page'])?$page_no=$_GET['page']:$page_no=1;
	$str_count="select count(id) as user_count from blogs where delete_status=0 and status=1";
	$result_count=$con->query($str_count);
	if($row_rec=$result_count->fetch_assoc())
	{
		$records=$row_rec['user_count'];
	}
	$no_page=ceil($records/4);
	$l1=($page_no-1)*4;
	$l2=4;
	$str_blog="select * from blogs where status=1 and delete_status=0 limit ".$l1.",".$l2;
	$result=$con->query($str_blog);
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
	$str_pages="select * from menu where delete_status=0";
	$result_pages=$con->query($str_pages);
	$str_t5="select * from blogs where status=1 limit 0,5";
	$result_t5=$con->query($str_t5);
	
?>
<!-- Mirrored from demo.warungthemes.com/html/beeanca/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:08:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Lorem ipsum dolor sit amet">
    <meta name="keywords" content="beeanca,personal,themeforest,web,design,html,css,html5,development,warungdsgn,warungthemes,responsive">
    <meta name="author" content="Ari Rusmanto - WarungThemes">
	<title>Beeanca - Modern Blogging</title>

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

                            <!-- Begin Post archive -->
                            <div class="post-archive list-style left-img">
                                <ul><?php
											
											while($row=$result->fetch_assoc())
											{
												
										?>
										<li>
                                        <div class="post-item">
                                            <div class="featured-img">
                                                <a href="#fakelink"><img src="assets/upload/<?php echo $row['cover_image'];?>" alt="Image" height="150" width="150"></a>
                                            </div><!-- /.featured-img -->

                                            <div class="caption">
                                                <p class="category">
                                                    <a href="#fakelink"></a>
                                                </p>
                                                <h3 class="post-title">
                                                    <a href="#fakelink"><?php echo $row['title']; ?></a>
                                                </h3>
                                                <p class="post-meta">
                                                    <span class="author"><a href="#fakelink"><?php echo $fname." ".$lname;  ?></a></span>
                                                    <span><?php echo $row['created_at']; ?></span>
                                                    <span><a href="#fakelink"><i class="fa fa-heart-o"></i> 2k</a></span>
                                                </p>
                                                <p>
                                                    <?php echo substr($row['content'],0,160); ?>
                                                </p>
                                                <a class="btn btn-main btn-sm btn-dashed" href="viewblog.php?id=<?php echo $row['id'];?>">READ MORE</a>
                                            </div><!-- /.caption -->
                                            <!-- Begin share Icons -->
                                            <div class="social-icons">
                                                <a href="#fakelink"><i class="fa fa-facebook"></i></a>
                                                <a href="#fakelink"><i class="fa fa-twitter"></i></a>
                                                <a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
                                                <a href="#fakelink"><i class="fa fa-tumblr"></i></a>
                                                <a href="#fakelink"><i class="fa fa-google-plus"></i></a>
                                                <a href="#fakelink"><i class="fa fa-envelope"></i></a>
                                            </div><!-- /.social-icons -->
                                        </div><!-- /.post-item -->
                                    </li>
									<?php } ?>
                                    
                                    </li>

                                </ul>
                            </div><!-- /.post-archive -->
                            <!-- End Post archive -->

                            <!-- Begin pagination -->
                            <nav>
							
                                <ul class="pagination pagination-flat pagination-separated-np">
                                <?php
									if($page_no>1)
									{
								?>
								   <li class="active">
                                        <a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no-1) ;?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
								<?php 
									}
									for($i=1;$i<=$no_page;$i++) 
									{
								?>
									<li><a href="<?php echo $_SERVER['PHP_SELF']."?page=".$i ;?>"><?php echo $i;?></a></li>
								
                                    
								<?php 
									} 
									if($page_no<$no_page)
									{
								?>
                                    <li>
                                        <a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no+1) ;?>">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
									<?php } ?>
                                </ul>
                            </nav>
                            <!-- End pagination -->

                        </div><!-- /.content -->
                    </div><!-- /.col-md-8 -->
                    <!-- End large content -->


                    <!-- Begin sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar">

                            <!-- Begin about widget -->
                            <div class="widget">
                                <h4 class="widget-heading">Welcome <?php echo $_SESSION['user']; ?></h4>
                                <div class="widget-content">
									<div class="widget-about">
                                        <div class="avatar">
										<?php	
											if($profile!="" && file_exists("assets/upload/profile/".$profile)) 
											{ 
												echo "<a href='editprofile.php'><img src='assets/upload/profile/".$profile.'?'.rand(1000000, 2000000)."'></a>";
											} 
											else 
											{
												echo "<a href='editprofile.php'><img src='assets/images/no-user.gif' ></a>";
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
                            </div><!-- /.widget -->
                            <!-- End about widget -->

                            <!-- Begin social icons widget -->
                            <div class="widget">
                                <h4 class="widget-heading">Find me on socials</h4>
                                <div class="widget-content">
                                    <div class="widget-social-icons">
                                        <a href="https://goo.gl/9mLNAi"><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
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

                            <div class="widget">
                                <h4 class="widget-heading">Popupar Blogs</h4>
                                <div class="widget-content">
                                    <div class="widget-post-list list-numbering">
                                        <ul>
                                            <?php
											
											while($row5=$result_t5->fetch_assoc())
											{
											?>
											<li class="has-post-format gallery-post">
                                                <div class="featured-img">
                                                    <a href="#fakelink"><img src="" alt="Image" ></a>
                                                </div><!-- /.featured-img -->
                                                <div class="caption">
                                                    <p class="category">
                                                        <a href="#fakelink"><?php echo $fname;  ?></a>
                                                        <a href="#fakelink"><?php echo $lname;  ?></a>
                                                    </p>
                                                    <h5 class="post-title"><a href="viewblog.php?id=<?php echo $row5['id'];?>"><?php echo substr($row5['title'],0,30); ?></a></h5>
                                                    <p class="post-meta">
                                                        <span>Feb 22, 2016</span>
                                                        <span><a href="#fakelink">2k views</a></span>
                                                    </p>
                                                </div><!-- /.caption -->
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div><!-- /.widget-post-list right-img large-first -->
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget -->
                            <!-- End post list widget -->

                           

                            <!-- Begin image banner widget -->
                            
                            <!-- End image banner widget -->

                            <!-- Begin tags widget -->
                            
                            <!-- End tags widget -->

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

<!-- Mirrored from demo.warungthemes.com/html/beeanca/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:10:10 GMT -->
<?php }
		else
		{
?>
	<?php	$strblog="select * from blogs where status=1";
		$result=$con->query($strblog);
		isset($_GET['page'])?$page_no=$_GET['page']:$page_no=1;
	$str_count="select count(id) as user_count from blogs where delete_status=0";
	$result_count=$con->query($str_count);
	if($row=$result_count->fetch_assoc())
	{
		$records=$row['user_count'];
	}
	$no_page=ceil($records/4);
	$l1=($page_no-1)*4;
	$l2=4;
	$str_blog="select * from blogs where delete_status=0 limit ".$l1.",".$l2;
	$result=$con->query($str_blog);
	$str_pages="select * from menu where delete_status=0";
	$result_pages=$con->query($str_pages);
	$str_t5="select * from blogs where status=1 limit 0,5";
	$result_t5=$con->query($str_t5);
	$str_t4="select * from blogs where status=1 limit 0,4";
	$result_t=$con->query($str_t4);
?>
<!-- Mirrored from demo.warungthemes.com/html/beeanca/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:08:35 GMT -->
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

                            <!-- Begin Post archive -->
                            <div class="post-archive list-style left-img">
                                <ul><?php
											
										while($row=$result->fetch_assoc())
										{	
											$struser="select * from user_details where user_id=".$row['user_id'];
											$result_user=$con->query($struser);
											if($rowuser=$result_user->fetch_assoc())
											{
												$fname=$rowuser['firstname'];
												$lname=$rowuser['lastname'];
											}
									?>
									<li>
                                        <div class="post-item">
                                            <div class="featured-img">
                                                <a href="#fakelink"><img src="assets/upload/<?php echo $row['cover_image'];?>" alt="Image" height="150" width="150"></a>
                                            </div><!-- /.featured-img -->

                                            <div class="caption">
                                                <p class="category">
                                                    <a href="#fakelink"></a>
                                                </p>
                                                <h3 class="post-title">
                                                    <a href="#fakelink"><?php echo $row['title']; ?></a>
                                                </h3>
                                                <p class="post-meta">
                                                    <span class="author"><a href="#fakelink"><?php echo $fname." ".$lname;  ?></a></span>
                                                    <span><?php echo $row['created_at']; ?></span>
                                                    <span><a href="#fakelink"><i class="fa fa-heart-o"></i> 2k</a></span>
                                                </p>
                                                <p>
                                                    <?php echo substr($row['content'],0,160); ?>
                                                </p>
                                                <a class="btn btn-main btn-sm btn-dashed" href="viewblog.php?id=<?php echo $row['id'];?>">READ MORE</a>
                                            </div><!-- /.caption -->
                                            <!-- Begin share Icons -->
                                            <div class="social-icons">
                                                <a href="#fakelink"><i class="fa fa-facebook"></i></a>
                                                <a href="#fakelink"><i class="fa fa-twitter"></i></a>
                                                <a href="#fakelink"><i class="fa fa-pinterest-p"></i></a>
                                                <a href="#fakelink"><i class="fa fa-tumblr"></i></a>
                                                <a href="#fakelink"><i class="fa fa-google-plus"></i></a>
                                                <a href="#fakelink"><i class="fa fa-envelope"></i></a>
                                            </div><!-- /.social-icons -->
                                        </div><!-- /.post-item -->
                                    </li>
									<?php } ?>
                                    
										
                                        
                                    </li>

                                </ul>
                            </div><!-- /.post-archive -->
                            <!-- End Post archive -->

                            <!-- Begin pagination -->
                            <nav>
								<ul class="pagination pagination-flat pagination-separated-np">
                                <?php
									if($page_no>1)
									{
								?>
										<li class="active">
											<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no-1) ;?>" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
								<?php 
									}
									for($i=1;$i<=$no_page;$i++) 
									{
								?>
										<li><a href="<?php echo $_SERVER['PHP_SELF']."?page=".$i ;?>"><?php echo $i;?></a></li>
								<?php 
									} 
									if($page_no<$no_page)
									{
								?>
										<li>
											<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no+1) ;?>">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
								<?php 
									} 
								?>
                                </ul>
                            </nav>
                            <!-- End pagination -->

                        </div><!-- /.content -->
                    </div><!-- /.col-md-8 -->
                    <!-- End large content -->

					<!-- Begin sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar">

                            <!-- Begin about widget -->
                            <div class="widget">
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
                                        
                                    </div><!-- /.widget-aboutt -->
                                </div><!-- /.widget-content -->
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

                            <div class="widget">
                                <h4 class="widget-heading">Popupar Blogs</h4>
                                <div class="widget-content">
                                    <div class="widget-post-list list-numbering">
                                        <ul>
                                            <?php
											
											while($row5=$result_t5->fetch_assoc())
											{
											?>
											<li class="has-post-format gallery-post">
                                                <div class="featured-img">
                                                    <a href="#fakelink"><img src="" alt="Image" ></a>
                                                </div><!-- /.featured-img -->
                                                <div class="caption">
                                                    <p class="category">
                                                        <a href="#fakelink"><?php echo $fname;  ?></a>
                                                        <a href="#fakelink"><?php echo $lname;  ?></a>
                                                    </p>
                                                    <h5 class="post-title"><a href="viewblog.php?id=<?php echo $row5['id'];?>"><?php echo substr($row5['title'],0,30); ?></a></h5>
                                                    <p class="post-meta">
                                                        <span>Feb 22, 2016</span>
                                                        <span><a href="#fakelink">2k views</a></span>
                                                    </p>
                                                </div><!-- /.caption -->
                                            </li>
                                            <?php }?>
                                        </ul>
                                    </div><!-- /.widget-post-list right-img large-first -->
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget -->
                            <!-- End post list widget -->
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

<!-- Mirrored from demo.warungthemes.com/html/beeanca/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:10:10 GMT -->
		<?php }?>
</html>