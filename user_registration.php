<!DOCTYPE html>
<html lang="en">
<?php 	include "includes/config.php";
	
	$str_pages="select * from menu where delete_status=0";
	$result_pages=$con->query($str_pages);
	$str_t5="select * from blogs where status=1 limit 0,5";
	$result_t5=$con->query($str_t5);
	
?>
<!-- Mirrored from demo.warungthemes.com/html/beeanca/pages-contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 May 2016 10:11:01 GMT -->
<head>
	<script>
		function loadcountries()
		{
			$.get('load_countries.php?country=&state=', function(data) {
				$('#countries').append(data);
			});
		}
		function loadstates()
		{
			var country=$('#countries').val();
			$.get('load_countries.php?state=&country='+country , function(data1){
				$('#states').html(data1);
			});
		} 
		function loadcities()
		{
			var state=$('#states').val();
			$.get('load_countries.php?country=&state='+state, function(data2)
			{
				$('#cities').html(data2);
			});
		} 
		$(function()
		{
			$( "#dob" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "1900:2016"
			});
		});
	</script>
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
    
    
    <body class="has-load-animation" onload="loadcountries();">

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


        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">

                    <!-- Begin large content -->
                    <div class="col-md-8">
                        <div class="content">

                            <!-- Begin Post detail content -->
                            <div class="content-inner">

                                <div class="page-heading">
                                    <h2 class="page-title">Registration</h2>
                                </div><!-- /.page-heading -->

                                <!-- Begin post content -->
                                <div class="post-content">
                                    <!-- Begin post text -->
									
									<form method="POST" action="operator.php" enctype="multipart/form-data" onsubmit="return validation()" class="form-horizontal"" >
												<input type="hidden" name="action" value="storedata">
												<div class="form-group">
													<div class="col-lg-12">
													<tr><td>Username</td><td colspan=3><INPUT class="form-control" TYPE="TEXT" NAME="data[uname]" size=45 id="user" ></td><td><?php  if(isset($_SESSION['user_error'])) { echo $_SESSION['user_error'];  } ?></td><td><?php  if(isset($_SESSION['check_user_error'])) { echo $_SESSION['check_user_error'];  } ?></td></tr>
													</div><!-- /.col-lg-6 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Password</td><td colspan=3><INPUT  class="form-control" TYPE="password"  NAME="data[password]" id="password" size=45  onblur="return password_strength()"></td><td><?php  if(isset($_SESSION['password_error'])) { echo $_SESSION['password_error'];  } ?></td></tr>
													</div><!-- /.col-lg-6 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Re Type Password</td><td colspan=3><INPUT  class="form-control" TYPE="password" NAME="rpassword" id="rpassword" size=45  ></td><td><?php  if(isset($_SESSION['rpassword_error'])) { echo $_SESSION['rpassword_error'];  } ?></td></tr>
													</div><!-- /.col-lg-6 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>First Name</td><td colspan=3><INPUT  class="form-control" TYPE="TEXT" NAME="data[fname]" id="fname" size=45  ></td><td><?php  if(isset($_SESSION['fname_error'])) { echo $_SESSION['fname_error'];  } ?></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
												   <tr><td>Last Name</td><td colspan=3><INPUT class="form-control" NAME="data[lname]" id="lname" size=45></td><td><?php  if(isset($_SESSION['lname_error'])) { echo $_SESSION['lname_error'];  } ?></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Email</td><td colspan=3><INPUT  class="form-control" TYPE="TEXT" NAME="data[email]" id="email" size=45></td><td><?php  if(isset($_SESSION['email_error'])) { echo $_SESSION['email_error'];  } ?></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Mobile no.</td><td colspan=3><INPUT  class="form-control" TYPE="TEXT" maxlength=10 onkeypress='return event.charCode >= 48 && event.charCode <= 57 ' NAME="data[mobile]" id="mobile" size=45 onblur="return mobile_validation()"></td><td><?php  if(isset($_SESSION['mobile_error'])) { echo $_SESSION['mobile_error'];  } ?></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Date of Birth</td><td colspan=3><INPUT  class="form-control" TYPE="text" readonly NAME="data[dob]"  id="dob" size=45 ></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>GENDER</td><td  class="form-control" ><INPUT TYPE="RADIO" NAME="data[gender]" id="male" VALUE="male"> <label for="male">MALE</label></td><td><INPUT TYPE="RADIO" NAME="data[gender]" id="female" VALUE="female"> <label for="female">FEMALE</lable></td><td><INPUT TYPE="RADIO" NAME="data[gender]" id="transgender" VALUE="others"> <label for="transgender">TRANSGENDER</label></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>ADDRESS</td><td colspan=3  class="form-control" ><Textarea    class="col-lg-12" name="data[address]"></Textarea></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
												   <tr><td>Countries</td><td colspan=3  class="form-control" >
														<select id="countries" name="data[countries]" onchange="loadstates()" class="col-lg-12" >
														</select>
													</td>  </div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>State</td><td colspan=3  class="form-control" >
																<select id="states" name="data[states]" onchange="loadcities()" class="col-lg-12" >
																	<option value="select" >Select</option>
																</select>
															</td> 
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>City</td><td colspan=3  class="form-control" >
																<select id="cities" name="data[cities]" class="col-lg-12" >
																	<option value="select" >Select</option>
																</select>
															</td>
														</tr>  
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
														<tr><td>Upload Image</td><td colspan=3><input type="file" name="profile" accept="image/*" id="image"></td></tr>
													</div><!-- /.col-lg-12 -->
												</div><!-- /.form-group -->
												<div class="form-group">
													<div class="col-lg-12">
													<tr><td  colspan=5 align="center"><INPUT  class="form-control" class="form-control" TYPE="submit" NAME="submit" VALUE="REGISTER"></td></tr>
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
                                <h4 class="widget-heading">Latest tweets</h4>
                                <div class="widget-content">
                                    <div class="widget-twitter">
                                        <ul>
                                            <li>
                                                <a href="#fakelink">@loremipsum</a> I don't know how I ever lived without these life tips. Never get a mosquito bite again! click here <a href="#fakelink">http://bit.ly/xyzabcd</a>
                                                <p class="date">ABOUT 2 HOURS AGO</p>
                                            </li>
                                            <li>
                                                <a href="#fakelink">@loremipsum</a> I don't know how I ever lived without these life tips. Never get a mosquito bite again! click here <a href="#fakelink">http://bit.ly/xyzabcd</a>
                                                <p class="date">ABOUT 2 HOURS AGO</p>
                                            </li>
                                            <li>
                                                <a href="#fakelink">@loremipsum</a> I don't know how I ever lived without these life tips. Never get a mosquito bite again! click here <a href="#fakelink">http://bit.ly/xyzabcd</a>
                                                <p class="date">ABOUT 2 HOURS AGO</p>
                                            </li>
                                        </ul>
                                    </div><!-- /.widget-twitter -->
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