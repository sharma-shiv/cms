<?php 
	include 'includes/config.php';
	$country=$_GET['country'];
	$state=$_GET['state'];
	if($country==""&& $state=="")
	{
		$strsql="select * from countries";
		$result=$con->query($strsql);
		echo "<option value='select'>Select</option>";
		while($row=$result->fetch_assoc())
		{
			echo "<option value='".$row['country_code']."'>".$row['country_name']."</option>";
		}
	}
	elseif($state==""&&$country!="")
	{	
		$strsql="select * from states where country_id='".$country."'";
		$result=$con->query($strsql);
		echo "<option value='select'>Select</option>";
		while($row=$result->fetch_assoc())
		{
			echo "<option value='".$row["id"]."'>".$row['state_name']."</option>";
		}
	}  
	else
	{
		$strsql="select * from cities where state_id=".$state;
		$result=$con->query($strsql);
		echo "<option value='select'>Select</option>";
		while($row=$result->fetch_assoc())
		{
			echo "<option value='".$row["city_name"]."'>".$row['city_name']."</option>";
		}
	}
?>