<?php 	include "/includes/header.php";
		include "includes/id_check.php";
?>
			<h2>Welcome <?php echo $_SESSION['user']; ?></h2>
			<div style="top:0px;left:710px; width:200px;position:relative">
				<ul >
					<li ><a href="admin.php">Welcome <?php echo $_SESSION['user'];?></a></li>
					<li ><a href="logout_admin.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div id="divcontent">
		<div id="sidemenu">
			<ul class="list-group">
				<li class="list-group-item"><a href="#">Dashboard</a></li>
				<li class="list-group-item"><a href="managepages.php">Manage Page</a></li>
				<li class="list-group-item"><a href="manageblogs.php">Manage Blog</a></li>
				<li class="list-group-item"><a href="manageusers.php">Manage Users</a></li>
				<li class="list-group-item"><a href="website_setting.php">Website Setting</a></li>
			</ul>
		</div>
		<div style="top:100px; left: 40%; width:500px; height:500px; position:relative;">
		</div>
	</div>
</body>
</html>