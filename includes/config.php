<?php
	@session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="cms";
	//$con=mysqli_connect($servername,$username,$password,$dbname);
	$con=new mysqli($servername,$username,$password,$dbname);
	if($con->connect_error)
	{
		die("Connection Error".$con->connect_error);
	}
?>