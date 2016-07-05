<?php 	
	include "includes/header.php";
	include "includes/id_check.php";
	isset($_GET['page'])?$page_no=$_GET['page']:$page_no=1;
	$id=$_SESSION['id'];
	$str_count="select count(id) as user_count from users where status!=0";
	$result_count=$con->query($str_count);
	if($row=$result_count->fetch_assoc())
	{
		$records=$row['user_count'];
		
	}
	$no_page=ceil($records/10);
	$l1=($page_no-1)*10;
	$l2=10;
	$str_user="select * from user_details,users where status!=0 and users.id=user_details.user_id limit ".$l1.",".$l2;
	$result_user=$con->query($str_user);
	//var_dump($result_user);exit;
?>			<script>
				function confirmation()
				{
					if(confirm('Do you want to delete?'))
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			</script>
			<h2>Manage Users</h2>
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
				<li class="list-group-item"><a href="adduser.php">Add users</a></li>
			</ul>
			<ul class="list-group">
				<li class="list-group-item"><a href="admin.php">back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 30%; width:800px; height:450px; position:relative;">
			<?php if(isset($_SESSION['updateblog'])){echo $_SESSION['updateblog']; $_SESSION['updateblog']="";}?>
			<?php if(isset($_SESSION['deleteblog'])){echo $_SESSION['deleteblog']; $_SESSION['deleteblog']="";}?>
			<?php 
				if($result_user->num_rows>0)
				{
					echo "<table  align='center' class='table' >
					<tr><th>User Image</th><th>User Id</th><th>First Name</th><th>Last Name</th><th>Mobile</th><th>City</th><th>State</th><th>Country</th><th colspan=3 style='width:15%;'>Action</tr></tr>";
					while($row = $result_user->fetch_assoc())
					{
						if($row['status']==2)
						{
							echo "<tr class='danger'>";
							if($row["profile_pic"]!="" && file_exists("../assets/upload/profile/".$row["profile_pic"])) 
							{ 
								echo "<td style='width:8%;'><img src='../assets/upload/profile/".$row['profile_pic'].'?'.rand(1000000, 2000000)."' height=40px width=40px/></td>";
							} 
							else 
							{
								echo "<td style='width:8%;'><img src='../assets/images/no-user.gif' height=40px width=40px/></td>";
							} 
							echo "<td class='td'  style=''>" . $row['user_id'] . "</td>";
							echo "<td class='td' style='' >" . $row['firstname'] . "</td>";
							echo "<td class='td' style='' >" . $row['lastname']. "</td>";
							echo "<td class='td' style='' >" . $row['mobile']. "</td>";
							echo "<td class='td' style='' >" . $row['city']. "</td>";
							echo "<td class='td' style='' >" . $row['state']. "</td>";
							echo "<td class='td' style='' >" . $row['country']. "</td>";
							echo "<td class='td'><a href='viewuser.php?id=".$row['user_id']."'><img src='../assets/images/view.jpg' height=15px width=15px/></a></td>
							<td class='td'><a href='edituser.php?id=".$row['user_id']."'><img src='../assets/images/edit.jpg' height=15px width=15px></a></td>
							<td class='td'><a href='operator.php?action=deleteuser&data=".$row['id']."' onclick='return confirmation();'><img src='../assets/images/delete.jpg' height=15px width=15px /></a></td>";
							echo "</tr>";
						}
						else
						{
							echo "<tr class='success'>";
							if($row["profile_pic"]!="" && file_exists("../assets/upload/profile/".$row["profile_pic"])) 
							{ 
								echo "<td style='width:8%;'><img src='../assets/upload/profile/".$row['profile_pic'].'?'.rand(1000000, 2000000)."' height=40px width=40px/></td>";
							} 
							else 
							{
								echo "<td style='width:8%;'><img src='../assets/images/no-user.gif' height=40px width=40px/></td>";
							} 
							echo "<td class='td'  style=''>" . $row['user_id'] . "</td>";
							echo "<td class='td' style='' >" . $row['firstname'] . "</td>";
							echo "<td class='td' style='' >" . $row['lastname']. "</td>";
							echo "<td class='td' style='' >" . $row['mobile']. "</td>";
							echo "<td class='td' style='' >" . $row['city']. "</td>";
							echo "<td class='td' style='' >" . $row['state']. "</td>";
							echo "<td class='td' style='' >" . $row['country']. "</td>";
							echo "<td class='td'><a href='viewuser.php?id=".$row['user_id']."'><img src='../assets/images/view.jpg' height=15px width=15px/></a></td>
							<td class='td'>	<a href='edituser.php?id=".$row['user_id']."'><img src='../assets/images/edit.jpg' height=15px width=15px /></a></td>
							<td class='td'>	<a href='operator.php?action=deleteuser&data=".$row['id']."' onclick='return confirmation();'><img src='../assets/images/delete.jpg' height=15px width=15px /></a></td>";
							echo "</tr>";
						}
					}
					echo "<tr><td colspan=10 align='center' border=0>";
				?>
				<?php 
					if($page_no>1)
					{
				?>
						<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no-1) ;?>"><<</a>
				<?php 
					}
					for($i=1;$i<=$no_page;$i++) 
					{
				?>
						<a href="<?php echo $_SERVER['PHP_SELF']."?page=".$i ;?>"><?php echo $i;?></a>
				<?php 
					} 
					if($page_no<$no_page)
					{
				?>
						<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no+1) ;?>">>></a>
				<?php	
					}
				}
				else
				{
					echo "<p>no records</p>";
				}
				?>
				</td></tr>
			</table>
		</div>
	</div>
</body>
</html>