<?php 	include "includes/header.php";
		include "includes/id_check.php";
		//include "../includes/config.php";
		isset($_GET['page'])?$page_no=$_GET['page']:$page_no=1;
		$id=$_SESSION['id'];
		$str_count="select count(id) as user_count from menu where delete_status=0";
		$result_count=$con->query($str_count);
		if($row=$result_count->fetch_assoc())
		{
			$records=$row['user_count'];
		}
		$no_page=ceil($records/10);
		$l1=($page_no-1)*10;
		$l2=10;
		$str_page="select * from menu where delete_status=0 limit ".$l1.",".$l2;
		$result_page=$con->query($str_page);
		//var_dump($result_blog);exit;
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
			<ul class="list-group">
				<li class="list-group-item"><a href="addpages.php">Add Pages</a></li>

			</ul>
			<ul class="list-group">
				<li class="list-group-item"><a href="admin.php">back</a></li>
			</ul>
		</div>
		<div style="top:50px; left: 30%; width:800px; height:450px; position:relative;">
			<?php if(isset($_SESSION['updatepage'])){echo $_SESSION['updatepage']; $_SESSION['updatepage']="";}?>
			<?php if(isset($_SESSION['deletepage'])){echo $_SESSION['deletepage']; $_SESSION['deletepage']="";}?>
				<?php 
					if($result_page->num_rows>0)
					{
						
						echo "<table  align='center' class='table' >
						<tr><th>Page Name</th><th>Content</th><th colspan=3>Action</th></tr>";
						while($row = $result_page->fetch_assoc())
						{
							
								echo "<tr>";
								echo "<td class='td' style='width:20%;'>" . substr($row['page_name'],0,10) . "..</td>";
								echo "<td class='td' style='width:60%;'>" .  substr($row['content'],0,50) . "....</td>";
								echo "<td class='td'><a href='viewpages.php?page_id=".$row['id']."'><img src='../assets/images/view.jpg' height=15px width=15px/></a></td>
								<td class='td'>	<a href='editpages.php?page_id=".$row['id']."'><img src='../assets/images/edit.jpg' height=15px width=15px /></a></td>
								<td class='td'>	<a href='operator.php?action=deletepage&data=".$row['id']."' onclick='return confirmation();'><img src='../assets/images/delete.jpg' height=15px width=15px /></a></td>";
								echo "</tr>";
							
						}
					
				
						echo "<tr><td colspan=10 align='center' border=0>";
					?>
						<?php 
							if($page_no>1)
							{
						?>
							<a href="<?php echo $_SERVER['PHP_SELF']."?page=".($page_no-1) ;?>"><<</a>
						<?php }for($i=1;$i<=$no_page;$i++) {?>
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