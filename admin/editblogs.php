<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
			<h2>Edit blogs</h2>
			<div style="top:0px;left:710px; width:200px;position:relative">
				<ul >
					<li ><a href="admin.php">Welcome <?php echo $_SESSION['user'];?></a></li>
					<li ><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="divcontent">
		<div id="sidemenu">
			<ul class="list-group">
				<li class="list-group-item" ><a href="admin.php">Dashboard</a></li>
				<li class="list-group-item" ><a href="manageblogs.php">Back</a></li>
			</ul>
		</div>
			<?php
				$id=$_REQUEST['blog_id'];
				$str="select * from blogs where id=".$id;
				$result=$con->query($str);
				$row=$result->fetch_assoc();
			?>
		<div style="left:400px;top:250px; width:150px;height:150px; position:relative;"> <?php
						if($row["cover_image"]!="" && file_exists("../assets/upload/".$row["cover_image"])) 
						{ 
							echo "<td><img src='../assets/upload/".$row['cover_image'].'?'.rand(1000000, 2000000)."' height=150px width=150px/></td>";
						} 
						else 
						{
							echo "<td><img src='../assets/images/no-user.gif' height=150px width=150px/></td>";
						}
					?>
			</div>
		<div style="top:0px; left: 40%; width:500px; height:500px; position:relative;">
			
			
			<form action="operator.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="updateblog">
				<input type="hidden" name="data[id]" value='<?php echo $id;?>'>
				<input type="hidden" name="data[old_image]" value='<?php echo $row['cover_image'];?>'>
				<table align="center">
					<tr><td>Blog Name</td><td><input name="data[title]" type="text" value='<?php echo $row['title'];?>' size=45></td></tr>
					<tr><td>Cover Image</td><td><input name="data[cover_image]" type="file" size=45></td></tr>	
					</tr>
					<tr><td>Content</td><td><textarea name="data[content]"  cols=34 rows=10 ><?php echo $row['content'];?></textarea></td></tr>
					<tr><td colspan=2 ALIGN="CENTER"><input type="submit" name="submit" value="Update"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>