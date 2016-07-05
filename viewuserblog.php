<!DOCTYPE html>
<html lang="en">
<?php 	include "includes/config.php";
		include "includes/id_check.php";
?>

<?php 
	$blog_id=$_REQUEST['id'];
	$str="select * from blogs where id=".$blog_id;
	$result=$con->query($str);
	if($row=$result->fetch_assoc())
	{
		$struser="select * from user_details where user_id=".$row['user_id'];
		$result_user=$con->query($struser);
		if($rowuser=$result_user->fetch_assoc())
		{
			$fname=$rowuser['firstname'];
			$lname=$rowuser['lastname'];
			
			$mobile=$rowuser['mobile'];
			$city=$rowuser['city'];
			$state=$rowuser['state'];
			$country=$rowuser['country'];
			$profile=$rowuser['profile_pic'];
		}
		$str_users="select * from users where id=".$row['user_id'];
		$result_users=$con->query($str_users);
		if($row_users=$result_users->fetch_assoc())
		{
			$uname=$row_users['username'];
			$email=$row_users['email'];
			$password=$row_users['password'];
		}
		$str_t5="select * from blogs where status=1 limit 0,5";
		$result_t5=$con->query($str_t5);
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
                                        <div class="item"><a href="images/12.jpg" data-imagelightbox="f"><img src="assets/upload/<?php echo $row['cover_image']?>" alt="Image"></a></div>
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
                                        <?php echo $row['title'];?>
                                    </h1>
                                    <p class="post-meta">
                                        <span class="author"><a href="#fakelink"><?php echo $fname." ".$lname;  ?></a></span>
                                        <span><?php echo $row['created_at']; ?></span>
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
										<?php echo $row['content'];?>
									 </p>
                                    <!-- End post text -->

                                    <!-- Begin tags anda share icons -->
                                    <div class="post-meta-bottom">
                                        <div class="widget-tags">
                                            <a href='editblog.php?blog_id="<?php echo $row['id'];?>"'>Edit</a>
                                            <a href='operator.php?action=deleteblog&data="<?php echo $row['id']; ?>"'>Delete</a>
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


                                   

                                </div><!-- /.post-content -->
                                <!-- End post content -->

                            </div><!-- /.content-inner -->
                            <!-- End Post detail content -->

                           


                            <h3 class="large-heading">No Comment</h3>

                             <!-- Begin comment form -->
                            <div class="content-inner">
                                <div class="widget">
                                    <h4 class="widget-heading">Leave a reply</h4>
                                    <div class="widget-comment-form">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                <input type="text" class="form-control" placeholder="Your name*">
                                                </div><!-- /.col-lg-6 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                <input type="email" class="form-control" placeholder="Email address*">
                                                </div><!-- /.col-lg-6 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                <input type="url" class="form-control" placeholder="Website">
                                                </div><!-- /.col-lg-6 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                <textarea class="form-control" style="height: 150px;" placeholder="Comment*"></textarea>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                <button class="btn btn-main btn-dashed">SUBMIT COMMENT</button>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.form-group -->
                                        </form>
                                        <div class="alert alert-info">
                                            Your email address will not be published. Required fields are marked *
                                        </div><!-- /.alert alert-info -->
                                    </div><!-- /.widget-comment-form -->
                                </div><!-- /.widget -->
                            </div><!-- /.content-inner -->
                            <!-- End comment form -->

                        </div><!-- /.content -->
                    </div><!-- /.col-md-8 -->
                    <!-- End large content -->
<?php 
	} 
?>

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

<!-- Mirrored from demo.warungthemes.com/html/beeanca/post-format-gallery-slideshow.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:00 GMT -->
</html>