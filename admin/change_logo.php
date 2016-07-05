<?php	
	include "includes/header.php";
	include "includes/id_check.php";
	$str="select data from website_settings where name='logo'";
	$result=$con->query($str);
	if($row=$result->fetch_assoc())
	{
		$image=$row['data'];
	}
	$path="../assets/upload/logo/".$image;
?>
			<h2>Change Logo</h2>
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
				<li class="list-group-item" ><a href="admin.php">Dashboard</a></li>
				<li class="list-group-item" ><a href="website_setting.php">Back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 40%; width:500px; height:500px; position:relative;">
			<?php if(isset($_SESSION['addlogo'])){echo $_SESSION['addlogo'];} $_SESSION['addlogo']="";?>
			<form method="POST" action="operator.php" enctype="multipart/form-data">
				<input type="hidden" name="action" value="change_logo">
				<table cellspacing="10">
					<tr><td>Current Logo</td><td><img src="<?php echo $path;?>" width="130px" height="130px"/></td></tr>
					<tr><td>Choose new Logo</td><td><input type="file" name="data"></td></tr>
					<tr><td colspan=2 align=center><input type="submit" name="submit" value="CHANGE LOGO"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>