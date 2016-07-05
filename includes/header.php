<header>
		
	  <!-- Begin header content -->
	<div class="header-content">

		<!-- Begin Main Logo -->
		
		<div class="main-logo">
			<a href="index.php">

				<!-- Image logo -->
				<?php 
					$strlogo="select data from website_settings where name='logo'";
					$resultlogo=$con->query($strlogo);
					if($rowlogo=$resultlogo->fetch_assoc())
					{
						$logo=$rowlogo['data'];
					} 
					$path="assets/upload/logo/".$logo;
					if($logo!=""&& file_exists('assets/upload/logo/'.$logo))
					{
					echo"<img src='".$path."' class='img-retina' alt='Logo'>";
					}
					else	
					{
						echo "<img src='assets/images/no-user.jpg' alt='Logo'>";
					}
				?>
				<!-- Text logo + description -->
				<h1>Beeanca</h1><!-- Will be Site Name -->
				<p>Modern Blogging Template</p><!-- Will be site description -->

			</a>
		</div><!-- /.main-logo -->
		<!-- End Main Logo -->


		<div class="icons-and-search">

			<!-- Begin Social Icons -->
			<div class="social-icons">
				<?php 
					if(isset($_SESSION['id']))
					{
				?>
						<a href="logout_user.php" data-toggle="tooltip" data-placement="bottom" title="Vimeo">Logout</a>
				<?php
					}
					else
					{
				?>
						<a href="https://goo.gl/9mLNAi" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Vine"><i class="fa fa-vine"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble"></i></a>
						<a href="#fakelink" data-toggle="tooltip" data-placement="bottom" title="Vimeo"><i class="fa fa-vimeo"></i></a>
				<?php 
					}
				?>
			</div><!-- /.social-icons -->
			<!-- End Social Icons -->

			<!-- Begin Search Form -->
			<div class="search-form">
				<form action="http://www.google.com">
					<div class="form-group">
					   <div class="btn-form"></div>
						<input type="text" class="form-control" placeholder="Type and hit enter">
					</div><!-- /.form-group -->
				</form>
			</div><!-- /.search-form -->
			<!-- End Search Form -->

		</div><!-- /.icons-and-search -->
	</div><!-- /.header-content -->
	<!-- End header content -->

	<!-- Begin Main Nav -->
	<div class="nav-wrapper">
		<div class="nav-menu">
			<ul>
				<li class="active"><a href="index.php">Home</a>
					
				</li>
				
				<?php 
					$str_pages="select * from menu where delete_status=0 limit 0,4";
					$result_pages=$con->query($str_pages);
					while($row_pages=$result_pages->fetch_assoc())
					{
					
				?>
						<li><a href="viewpage.php?p=<?php echo $row_pages['id'];?>"><?php echo substr($row_pages['page_name'],0,20);?></a>
						</li>
				<?php
					}
				?>
				<li><a href="#fakelink">More Pages</a>
					<ul>
						<?php 
							$str_allpages="select * from menu where delete_status=0 limit 4,99999999999999";
							$result_allpages=$con->query($str_allpages);
							while($row_allpages=$result_allpages->fetch_assoc())
							{
						?>
								<li><a href="viewpage.php?p=<?php echo $row_allpages['id'];?>"><?php echo substr($row_allpages['page_name'],0,20);?></a></li>
						<?php 
							}
						?>
					</ul>
				</li>
				
				<li><a href="#fakelink">Blogs</a>
					<ul>
						<li><a href="addblog.php">Add Blogs</a>
						</li>
						<li><a href="manageblogs.php">Manage Blogs</a>
						</li>
					</ul>
				</li>
				<li><a href="">About Us</a></li>
			</ul>
		</div><!-- /.nav-menu -->
	</div><!-- /.nav-wrapper -->
	<!-- End Main Nav -->
</header>

<!-- BEGIN SPLIT FEATURED POSTS -->
<div class="featured-posts featured-posts-split">

	<!-- Begin main slide -->
	<div class="owl-carousel owl-main-slide">
		<div class="item">
			<img src="images/6.jpg" alt="Images">
		</div><!-- /.item -->
		<div class="item">
			<img src="images/14.jpg" alt="Images">
		</div><!-- /.item -->
		<div class="item">
			<img src="images/13.jpg" alt="Images">
		</div><!-- /.item -->
		<div class="item">
			<img src="images/15.jpg" alt="Images">
		</div><!-- /.item -->
	</div><!-- /.owl-carousel owl-main-slide -->
	<!-- End main slide -->

	<!-- Begin slide split pagination -->
	<div class="owl-carousel owl-post-nav-content">
	   
		<?php
			$str_t4="select * from blogs where status=1 limit 0,4";
			$result_t=$con->query($str_t4);
			while($row4=$result_t->fetch_assoc())
			{
		?>
	   <div class="item">
			<div class="caption">
				<p class="category">
					<a href="#fakelink"></a>
				</p>
				<h3 class="post-title"><a href="viewblog.php?id=<?php echo $row4['id']; ?>"><?php echo substr($row4['title'],0,10);  ?></a></h3>
				<p class="post-meta">
					<span><?php echo $row4['created_at'] ?></span>
					<span><a href="#fakelink"><i class="fa fa-heart-o"></i> 8</a></span>
				</p>
				<a class="btn btn-main btn-sm btn-dashed" href="viewblog.php?id=<?php echo $row4['id']; ?>">READ MORE</a>
			</div><!-- /.caption -->
		</div><!-- /.item -->
	
		<?php 
			}
		?> 
		   
	</div><!-- /.owl-carousel owl-main-slide -->
	<!-- End slide split pagination -->

</div><!-- /.featured-posts -->
<!-- END SPLIT FEATURED POSTS -->