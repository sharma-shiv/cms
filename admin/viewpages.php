<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
			<h2>View Page</h2>
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
				<li class="list-group-item" ><a href="managepages.php">Back</a></li>
			</ul>
		</div>
		<div style="top:100px; left: 40%; width:400px; height:400px; position:relative;">
			<table class="table">
				
				<?php 
					$id=$_REQUEST['page_id'];
					$str="select * from menu where id=".$id;
					$result=$con->query($str);
					while($row=$result->fetch_assoc())
					{
						echo "<tr><th>Title</th><td>".$row['page_name']."</td></tr><tr><th>Content</th><td style='width:200px%;'>".$row['content']."</td></tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>