<?php
	include '../includes/config.php';
	$user_id=$_SESSION['id'];
	$str_getid="select LAST_INSERT_ID(id) as id from user_logs where user_id=".$user_id." ORDER BY `id` DESC ";
	if($row=$con->query($str_getid)->fetch_assoc())
	{
		$id= $row['id'];
	}
	$str_log="update user_logs set logout_time=now() where id=".$id;$con->query($str_log);
	session_destroy();
	header('Location: index.php');
	exit();
?>