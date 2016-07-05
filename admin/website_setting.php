<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
		<h2>Website Setting</h2>
			<div style="top:0px;left:710px; width:200px;position:relative">
				<ul >
					<li ><a href="admin.php">Welcome <?php echo $_SESSION['user'];?></a></li>
					<li ><a href="logout_admin.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="divcontent">
		<div id="sidemenu">
			<ul class="list-group">
				<li class="list-group-item"><a href="admin.php">Dashboard</a></li>
				<li class="list-group-item"><a href="change_logo.php">Change Logo</a></li>
				<li class="list-group-item"><a href="admin.php">Back</a></li>
				<li class="list-group-item"><a href="#">menu3</a></li>
				<li class="list-group-item"><a href="#">menu4</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 30%; width:800px; height:600px; position:relative;">
		</div>
	</div>
</body>
</html>