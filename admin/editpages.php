<?php 	include "includes/header.php";
		include "includes/id_check.php";
?>
			<h2>Edit Pages</h2>
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
		<div style="top:100px; left: 40%; width:250px; height:120px; position:relative;">
		<?php
				$id=$_REQUEST['page_id'];
				$str="select page_name,content from menu where id=".$id;
				$result=$con->query($str);
				$row=$result->fetch_assoc();
			?>
			<form action="operator.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="action" value="updatepage">
				<input type="hidden" name="data[id]" value='<?php echo $id;?>'>
				<table align="center">
					<tr><td>Page Name</td><td><input name="data[page_name]" type="text" value='<?php echo $row['page_name'];?>' size=45></td></tr>
					<tr><td>Content</td><td><textarea name="data[content]"  cols=34 rows=10 ><?php echo $row['content'];?></textarea></td></tr>
					<tr><td colspan=2 ALIGN="CENTER"><input type="submit" name="submit" value="Update"></td></tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>