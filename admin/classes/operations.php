<?php
//include 'includes/config.php';
class operations
{		
	function __construct()
	{
		
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="cms";
		//$con=mysqli_connect($servername,$username,$password,$dbname);
		$this->con=new mysqli($servername,$username,$password,$dbname);
		if($this->con->connect_error)
		{
			die("Connection Error".$con->connect_error);
		}
	}
	function adminlogin($data)
	{  
		$str="select * from users where usertype='admin' and username='".$data['uname']."' and password='".$data['password']."'";
		$result=$this->con->query($str);
		if($result->num_rows>0)
		{
			if($row=$result->fetch_assoc())
			{
				$id=$row['id'];
				$user=$row['username'];
			}
			$_SESSION['id']=$id;
			$_SESSION['user']=$user;
			$view=getenv("HTTP_USER_AGENT");
			if(preg_match("/Edge/i",$view))
			{
				$browser="Internet Explorer";
			}
			elseif(preg_match("/Netscape/i",$view))
				{
					$browser="Netscape";
				}
			elseif(preg_match("/FireFox/i",$view))
				{
					$browser="Mozilla FireFox";
				} 
			elseif(preg_match("/Chrome/i",$view))
				{
					$browser="Chrome";
				}
			if(preg_match("/Windows/i",$view))
			{
				$os="Windows";
			}
			elseif(preg_match("/Linux/i",$view))
				{
					$os="Linux";
				}
			$local_ip = getHostByName(getHostName());
			$str_log="INSERT INTO `user_logs`(`user_id`, `login_time`,os,browser,`ip`) VALUES (".$id.",now(),'".$os."','".$browser."','".$local_ip."')";
			
			$this->con->query($str_log);
			header('Location: admin.php');
		}
		else
		{
			header('Location: index.php');
		}
	}	
	function addblogs($data)
	{	
		$image=time().$_FILES['data']['name']['cover_image'];
		$str="insert into blogs (user_id,title,cover_image,content,status)values(".$_SESSION['id'].",'".$data['title']."','".$image."','".$data['content']."',1)";
		if($this->con->query($str))
		{
			if(!(file_exists("../assets/upload")))
				{
					mkdir("../assets/upload");
				}
				$valid_formats = array("jpg", "png");
				$max_file_size = 1024*1000; 
				$path = "../assets/upload/";
				$count = 0;
				if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
				{
					foreach ($_FILES['data']['name'] as $f => $name) 
					{     
						if ($_FILES['data']['error'][$f] == 4) 
						{
							continue; 										// Skip file if any error found
						}	       
						if ($_FILES['data']['error'][$f] == 0)
						{	           
							if ($_FILES['data']['size'][$f] > $max_file_size)
							{
								$message[] = "$name is too large!.";
								continue; 									// Skip large files
							}
							elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) )
							{
								$message[] = "$name is not a valid format";
								continue; 									// Skip invalid file formats
							}
							else
							{ 											// No error found! Move uploaded files 
								if(move_uploaded_file($_FILES["data"]["tmp_name"][$f], $path.$image))
								{
									$count++; 	
								}
							}
						}
					}
				}
			
			$_SESSION['addblog']="Blog Added Successfully";
			header('Location: manageblogs.php');
		}
		
	}
	function addpages($data)
	{	
		$content=mysql_real_escape_string($data['content']);
		$str="insert into menu (page_name,content)values('".$data['page_name']."','".$content."')";
		if($this->con->query($str))
		{
			$_SESSION['addpages']="page Added Successfully";
			header('Location: managepages.php');
		}
		
	}
		
	function activateblog($data)
	{
		$str="update blogs set status=1 where id=".$data;
		if($this->con->query($str))
		{
			$_SESSION['activate']="blog Activated Successfully";
			header('Location: manageblogs.php');
		}
	}
	
	function updateblog($data)
	{
		$id=$data['id'];
		$old_image=$data['old_image'];
		$image=time().$_FILES['data']['name']['cover_image'];
		if($_FILES['data']['name']['cover_image'])
		{
			
			$str="update blogs set title='".$data['title']."',cover_image='".$image."',content='".$data['content']."' where id=".$id;
		}
		else
		{	
			$str="update blogs set title='".$data['title']."',content='".$data['content']."' where id=".$id;
		}
		if($this->con->query($str))
		{
			if(!(file_exists("../assets/upload")))
			{
				mkdir("../assets/upload");
			}
			$valid_formats = array("jpg","png");
			$max_file_size = 1024*1000; 
			$path = "../assets/upload/";
			$removeimage=$path.$old_image;
			$count = 0;
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{
				foreach ($_FILES['data']['name'] as $f => $name) 
				{     
					if ($_FILES['data']['error'][$f] == 4) 
					{
						continue; 										// Skip file if any error found
					}	       
					if ($_FILES['data']['error'][$f] == 0)
					{	           
						if ($_FILES['data']['size'][$f] > $max_file_size)
						{
							$message[] = "$name is too large!.";
							continue; 									// Skip large files
						}
						elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) )
						{
							$message[] = "$name is not a valid format";
							continue; 									// Skip invalid file formats
						}
						else
						{ 											// No error found! Move uploaded files 
							if(move_uploaded_file($_FILES["data"]["tmp_name"][$f], $path.$image))
							{
								if(file_exists($removeimage))
								{
									if($_FILES['data']['name']['cover_image'])
									{
										
										unlink($removeimage);
									}
								} 	
							}
						}
					}
				}
			}
			
			$_SESSION['updateblog']="Blog Updated Successfully";
			header('Location: manageblogs.php');
		}
		
	}
	function deleteblog($data)
	{
		$str="update blogs set delete_status=1 where id=".$data;
		if($this->con->query($str))
		{
			$_SESSION['deleteblog']="Blog deleted Successfully";
			header('Location: manageblogs.php');
		}
		
	}
	function updatepage($data)
	{
		$id=$data['id'];
		$str="update menu set page_name='".$data['page_name']."',content='".$data['content']."' where id=".$id;
		if($this->con->query($str))
		{
			$_SESSION['updatepage']="Page Updated successfully";
			header('Location: managepages.php');
		}
	}
	function deletepage($data)
	{
		$str="update menu set delete_status=1 where id=".$data;
		if($this->con->query($str))
		{
			$_SESSION['deletepage']="page deleted Successfully";
			header('Location: managepages.php');
		}
		
	}
	function change_logo($data)
	{
		$image=time().$_FILES['data']['name'];
		$str="update website_settings set data='".$image."', updated_at=now() where name='logo'";
		if($this->con->query($str))
		{
			if(!(file_exists("../assets/upload/logo")))
			{
				mkdir("../assets/upload/logo");
			}
			$valid_formats = array("jpg", "png");
			$max_file_size = 1024*1000; 
			$path = "../assets/upload/logo/";
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{     	       
				if ($_FILES['data']['error'] == 0)
				{	           
					if ($_FILES['data']['size'] > $max_file_size)
					{
						echo "alert('$name is too large!.')";
						return false; 									// Skip large files
					}
					elseif( ! in_array(pathinfo($image, PATHINFO_EXTENSION), $valid_formats) )
					{
						echo "alert('$name is not a valid format')";
						return false; 									// Skip invalid file formats
					}
					else
					{ 										// No error found! Move uploaded files 
						if(move_uploaded_file($_FILES['data']['tmp_name'], $path.$image))
						{
							$_SESSION['addlogo']="Logo Changed Successfully";
						}
					}
				}
		
			}
			
			header('Location: change_logo.php');
		}
	}
	function adduser($data)
	{  
		$image=time().$_FILES['profile']['name'];
		$str="insert into users (username,password,email,token,usertype)values('".$data['uname']."','".$data['password']."','".$data['email']."','welcome','user')";
		$str_state="select * from states where id=".$data['states'];
				$result_state=$this->con->query($str_state);
				$row_state=$result_state->fetch_assoc();
		if($this->con->query($str))
		{
			
			$str_getid="select LAST_INSERT_ID(id) as id from users ORDER BY `id` DESC ";
			if($row=$this->con->query($str_getid)->fetch_assoc())
			{
				$id= $row['id'];
			}
			$str_userdetails="insert into user_details (user_id,firstname,lastname,mobile,city,state,country,profile_pic)values('".$id."','".$data['fname']."','".$data['lname']."','".$data['mobile']."','".$data['cities']."','".$row_state['state_name']."','".$data['countries']."','".$image."')";

			if($this->con->query($str_userdetails))
			{
				if(!(file_exists("../assets/upload/profile")))
				{
					mkdir("../assets/upload/profile");
				}
				$valid_formats = array("jpg", "png");
				$max_file_size = 1024*1000; 
				$path = "../assets/upload/profile/";
				if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
				{     	       
					if ($_FILES['data']['error'] == 0)
					{	           
						if ($_FILES['data']['size'] > $max_file_size)
						{
							echo "alert('$name is too large!.')";
							return false; 									// Skip large files
						}
						elseif( ! in_array(pathinfo($image, PATHINFO_EXTENSION), $valid_formats) )
						{
							echo "alert('$name is not a valid format')";
							return false; 									// Skip invalid file formats
						}
						else
						{ 										// No error found! Move uploaded files 
							if(move_uploaded_file($_FILES['profile']['tmp_name'], $path.$image))
							{
								$_SESSION['register']="Successfully Registered Please Login";
								
							}
						}
					}
			
				}
				header('Location: manageusers.php');
			}
		}
	}		
	function updateuser($data)
	{
		
		
		$id=$data['id'];
		$old_image=$data['old_image'];
		$image=time().$_FILES['profile']['name'];
		$str_users="update users set username='".$data['username']."',email='".$data['email']."',password='".$data['password']."' where id=".$data['id'];
		if($_FILES['profile']['name']!='')
		{
			$str_userdetails="update user_details set firstname='".$data['firstname']."',lastname='".$data['lastname']."',mobile=".$data['mobile']." ,city='".$data['city']."',state='".$data['state']."',country='".$data['country']."',profile_pic='".$image."' where user_id=".$data['id'];
			if(!(file_exists("../assets/upload/profile")))
			{
				mkdir("../assets/upload/profile");
			}
			$valid_formats = array("jpg","png");
			$max_file_size = 1024*1000; 
			$path = "../assets/upload/profile/";
			$removeimage=$path.$old_image;
			$count = 0;
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{
				if ($_FILES['profile']['error']== 0)
				{	           
														// No error found! Move uploaded files 
					if(move_uploaded_file($_FILES["profile"]["tmp_name"], $path.$image))
					{
						if(file_exists($removeimage))
						{
							if($_FILES['profile']['name']!="")
							{
								
								unlink($removeimage);
								
							}
						} 	
					}
					
				}
				
			}
		}
		else
		{	
			$str_userdetails="update user_details set firstname='".$data['firstname']."',lastname='".$data['lastname']."',mobile=".$data['mobile']." ,city='".$data['city']."',state='".$data['state']."',country='".$data['country']."' where user_id=".$data['id'];
		
		}
		if($this->con->query($str_userdetails))
		{	
			if($this->con->query($str_users))
			{
				
				$_SESSION['updateuser']="User Updated Successfully";
				header('Location: manageusers.php');
			}
				
		}
	}
	function deleteuser($data)
	{
		$str="update users set status=0 where id=".$data;
		if($this->con->query($str))
		{
			$_SESSION['deleteuser']= "user deleted successfully";
			header('Location:manageusers.php');
		}		
	}
}
?>