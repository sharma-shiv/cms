<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>

			<h2>View blog</h2>
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
				<li class="list-group-item" ><a href="manageusers.php">Back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 40%; width:400px; height:400px; position:relative;">
			<table class="table">
				<?php 
					$user_id=$_REQUEST['id'];
					$str="select * from user_details,users where users.id=user_details.user_id and user_details.user_id=".$user_id;
					$result=$con->query($str);
					if($row=$result->fetch_assoc())
					{
						
							echo "<tr><td>Profile Image</td>";
							if($row["profile_pic"]!="" && file_exists("../assets/upload/profile/".$row["profile_pic"])) 
							{ 
								echo "<td><img src='../assets/upload/profile/".$row['profile_pic'].'?'.rand(1000000, 2000000)."' height=40px width=40px/></td></tr>";
							} 
							else 
							{
								echo "<td><img src='../assets/images/no-user.gif' height=40px width=40px/></td></tr>";
							} 
							echo "<tr><td>User Id</td><td>".$row['user_id']."</td></tr>";
							echo "<tr><td>First Name</td><td>".$row['firstname']."</td></tr>";
							echo "<tr><td>Last Name</td><td>".$row['lastname']."</td></tr>";
							echo "<tr><td>Mobile</td><td>".$row['mobile']."</td></tr>";
							echo "<tr><td>City</td><td>".$row['city']."</td></tr>";
							echo "<tr><td>State</td><td>".$row['state']."</td></tr>";
							echo "<tr><td>Country</td><td>".$row['country']."</td></tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>