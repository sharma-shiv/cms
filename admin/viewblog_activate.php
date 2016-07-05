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
		<div style="top:50px; left: 40%; width:400px; height:400px; position:relative;">
			<table class="table">
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
							$first_name=$rowuser['firstname'];
							$last_name=$rowuser['lastname'];
						}
						echo "<tr><td>Cover Image</td>";
						if($row["cover_image"]!="" && file_exists("../assets/upload/".$row["cover_image"])) 
						{ 
							echo "<td><img src='../assets/upload/".$row['cover_image'].'?'.rand(1000000, 2000000)."' height=40px width=40px/></td></tr>";
						} 
						else 
						{
							echo "<td><img src='../assets/images/no-user.gif' height=40px width=40px/></td></tr>";
						} 
						echo "<tr><td>Title</td><td>".$row['title']."</td></tr>";
						echo "<tr><td>Author</td><td style='width:200px%;'>".$first_name." ".$last_name."</td></tr>";
						echo "<tr><td>Content</td><td style='width:200px%;'>".$row['content']."</td></tr>";
						echo "<tr><td class='td'  align='center'><a href='operator.php?action=activateblog&data=".$row['id']."'>Activate Blog</a></td><tr>";
							
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>