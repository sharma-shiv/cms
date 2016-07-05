<?php 
	include '../includes/config.php';
	$strlogo="select data from website_settings where name='logo'";
	$result=$con->query($strlogo);
	if($row=$result->fetch_assoc())
	{
		$logo=$row['data'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Pages</title>
				 <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
				<script src="../assets/validation.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/style.css" >
		<script>
			function loadcountries()
			{
				$.get('load_countries.php?country=&state=', function(data) {
					$('#countries').append(data);
				});
			}
		</script>
	</head>
<body onload="loadcountries();">
	<div id="outerdiv">
		<div style="height:150px;">
			<?php 
				$path="../assets/upload/logo/".$logo;
				if($logo!=""&& file_exists('../assets/upload/logo/'.$logo))
				{
				echo"<a href='admin.php'><div  style='height:80px; width:100px; left:20px; top:20px; position:relative;   '><img src='".$path."' witdh='100px' ></div></a>";
				}
				else	
				{
					echo "<a href='admin.php'><div  style='height:80px; width:100px; left:20px; top:20px;   position:relative; '><img src='assets/images/no-user.jpg'  witdh='100px' ></div></a>";
				}?>
			<div id="heading">
		