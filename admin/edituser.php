<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
			<h2>Edit blogs</h2>
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
		<div style="top:100px; left: 40%; width:400px; height:500px; position:relative;">
			<?php
				$user_id=$_REQUEST['id'];
				$str="select * from user_details,users where users.id=user_details.user_id and user_details.user_id=".$user_id;
				$result=$con->query($str);
				$row=$result->fetch_assoc();
				
			?>
			<form action="operator.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="updateuser">
				<input type="hidden" name="data[id]" value='<?php echo $row['id'];?>'>
				<input type="hidden" name="data[old_image]" value='<?php echo $row['profile_pic'];?>'>
				<table align="center" class="table">
					<?php	
							echo "<tr><td style='width:8%;'>Profile Image</td>";
							if($row["profile_pic"]!="" && file_exists("../assets/upload/profile/".$row["profile_pic"])) 
							{ 
								echo "<td><img src='../assets/upload/profile/".$row['profile_pic'].'?'.rand(1000000, 2000000)."' height=40px width=40px/><input type='file' name='profile' ></td></tr>";
							} 
							else 
							{
								echo "<td><img src='../assets/images/no-user.gif' height=40px width=40px/><input type='file' name='profile' ></td></tr>";
							} 
							echo "<tr><td style='width:40%;'>User Name</td><td><input type='text' name='data[username]' value='".$row['username']."'></td></tr>";
							echo "<tr><td style='width:25%;'>First Name</td><td><input type='text' name='data[firstname]' value='".$row['firstname']."'></td></tr>";
							echo "<tr><td style='width:25%;'>Last Name</td><td><input type='text' name='data[lastname]' value='".$row['lastname']."'></td></tr>";
							echo "<tr><td style='width:25%;'>Password</td><td><input type='text' name='data[password]' value='".$row['password']."'></td></tr>";
							echo "<tr><td style='width:25%;'>Mobile</td><td><input type='text' name='data[mobile]' value='".$row['mobile']."'></td></tr>";
							echo "<tr><td style='width:25%;'>E-mail</td><td><input type='text' name='data[email]' value='".$row['email']."'></td></tr>";
							echo "<tr><td style='width:25%;'>City</td><td><input type='text' name='data[city]' value='".$row['city']."'></td></tr>";
							echo "<tr><td style='width:25%;'>State</td><td><input type='text' name='data[state]' value='".$row['state']."'></td></tr>";
							echo "<tr><td style='width:25%;'>Country</td><td><input type='text' name='data[country]' value='".$row['country']."'></td></tr>";
					?>
					<tr><td colspan=2 ALIGN="CENTER"><input type="submit" name="submit" value="Update"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>