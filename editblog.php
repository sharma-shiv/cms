<!DOCTYPE html>
<html lang="en">
<?php 	include "includes/config.php";
		include "includes/id_check.php";
?>

<?php 
	$blog_id=$_REQUEST['blog_id'];
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
	}
	$str_pages="select * from menu where delete_status=0";
	$result_pages=$con->query($str_pages);
?>
<!-- Mirrored from demo.warungthemes.com/html/beeanca/pages-contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:01 GMT -->
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

                                <div class="page-heading">
                                    <h2 class="page-title">Add Blogs</h2>
                                </div><!-- /.page-heading -->

                                <!-- Begin post content -->
                                <div class="post-content">
                                    <!-- Begin post text -->
                                    <p>
                                       
                                    </p>
                                    <!-- End post text -->

                                       <form action="operator.php" class="form-horizontal" method="post" enctype="multipart/form-data">
											<input type="hidden" name="data[old_image]" value='<?php echo $row['cover_image'];?>'>
											<input type="hidden" name="action" value="updateblog">
											<input type="hidden" name="data[id]" value='<?php echo $row['id'];?>'>
				
                                            <div class="form-group">
                                                <div class="col-lg-12">
													<span class="col-lg-3">Blog Name:</span><input class="col-lg-9" name="data[title]" type="text" value="<?php echo $row['title']; ?>">
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-12">
													<span class="col-lg-3">Cover Image:</span><input class="col-lg-9" name="cover_image" type="file" >
                                                </div><!-- /.col-lg-6 -->
                                            </div><!-- /.form-group -->
                                            
                                            <div class="form-group">
                                                <div class="col-lg-12">
													<span class="col-lg-3">Content:</span><textarea class="col-lg-9" class="form-control"  name="data[content]"style="height: 150px;" placeholder="Content*"><?php echo $row['content']; ?>"</textarea>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <div class="col-lg-12">
													<div class="col-lg-5">
													</div>
													<div class="col-lg-2">
														<input class="btn btn-main btn-dashed" type="submit" name="submit" value="Edit Blog">
													</div>
													<div class="col-lg-5">
													</div>
                                                </div><!-- /.col-lg-12 -->
                                            </div><!-- /.form-group -->
                                        </form>

                                </div><!-- /.post-content -->
                                <!-- End post content -->

                            </div><!-- /.content-inner -->
                            <!-- End Post detail content -->

                        </div><!-- /.content -->
                    </div><!-- /.col-md-8 -->
                    <!-- End large content -->


                    <!-- Begin sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar">

                            <!-- Begin twitter widget -->
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
                            <!-- End twitter widget -->

                            <!-- Begin subscribe widget -->
                            <div class="widget">
                                <h4 class="widget-heading">Subscribe</h4>
                                <div class="widget-content">
                                    <div class="widget-subscribe">
                                        <p>
                                        <strong>Subscribe</strong> to our newsletter to get interesting stories deliver to your inbox everyday!
                                        </p>
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your email address">
                                            </div><!-- /.form-group -->
                                            <div class="form-group">
                                                <button class="btn btn-main btn-dashed btn-block">SIGN UP</button>
                                            </div><!-- /.form-group -->
                                        </form>
                                    </div><!-- /.widget-subscribe -->
                                </div><!-- /.widget-content -->
                            </div><!-- /.widget -->
                            <!-- End subscribe widget -->

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

<!-- Mirrored from demo.warungthemes.com/html/beeanca/pages-contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:01 GMT -->
</html>