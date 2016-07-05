<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
			<h2>Manage Pages</h2>
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
			<ul >
				<li><a href="addpages.php">Add Pages</a></li>
				<li><a href="viewpages.php">View Pages</a></li>
				<li><a href="editPages.php">Edit Pages</a></li>	
				<li><a href="DeletePages.php">Delete Pages</a></li>	
			</ul>
			<ul>
				<li><a href="admin.php">back</a></li>
			</ul>
		</div>
		<div style="top:100px; left: 40%; width:250px; height:120px; position:relative;">
			<?php if(isset($_SESSION['addpages'])){echo $_SESSION['addpages']; $_SESSION['addpages']="";}?>
		</div>
	</div>
</body>
</html>