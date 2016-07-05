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
	function storedata($data)
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
				if(!(file_exists("assets/upload/profile")))
				{
					mkdir("assets/upload/profile");
				}
				$valid_formats = array("jpg", "png");
				$max_file_size = 1024*1000; 
				$path = "assets/upload/profile/";
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
				header('Location: index.php');
			}
		}
	}		
	function userlogin($data)
	{  
		
		$data['uname']==""?$_SESSION['user_error']="Please Fill User Name":"";
		$data['password']==""?$_SESSION['password_error']="Please Fill Password":"";
		if($data['uname']==""||$data['password']=="")
		{
			header('Location: index.php');
		}
		else
		{
			$str="select * from users where usertype='user' and username='".$data['uname']."' and password='".$data['password']."'";
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
				$str_active="update users set active=1 where id=".$id;
				$this->con->query($str_active);
				header('Location: index.php');
			}
			else
			{
				$_SESSION['error_msg']="UserId or password incorrect";
				header('Location: index.php');
			}
		}
	}	
	function addblogs($data)
	{	
		$image=time().$_FILES['cover_image']['name'];
		$content=mysql_real_escape_string($data['content']);
		$str="insert into blogs (user_id,title,cover_image,content)values(".$_SESSION['id'].",'".$data['title']."','".$image."','".$content."')";
		if($this->con->query($str))
		{
			if(!(file_exists("assets/upload")))
			{
				mkdir("assets/upload");
			}
			$valid_formats = array("jpg", "png");
			$max_file_size = 1024*1000; 
			$path = "assets/upload/";
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{     
					       
				if ($_FILES['cover_image']['error'] == 0)
				{	           
					 										// No error found! Move uploaded files 
						if(move_uploaded_file($_FILES["cover_image"]["tmp_name"], $path.$image))
						{
							$_SESSION['addblog']="Blog Added Successfully";
							header('Location: index.php');
						}
					
				}
				
			}
			
		}
	}
	function addpages($data)
	{	
		$content=mysql_real_escape_string($data['content']);
		$str="insert into menu (page_name,content)values('".$data['page_name']."','".$content."')";
		if($this->con->query($str))
		{
			$_SESSION['addpages']="page Added Successfully";
			header('Location: admin/managepages.php');
		}
	}
	
	function updateblog($data)
	{
		$id=$data['id'];
		$old_image=$data['old_image'];
		$image=time().$_FILES['cover_image']['name'];
		//$content=mysql_real_escape_string($data['content']);
		if($_FILES['cover_image']['name'])
		{
			
			$str="update blogs set title='".$data['title']."',cover_image='".$image."',content='".$data['content']."' where id=".$id;
		}
		else
		{	
			$str="update blogs set title='".$data['title']."',content='".$data['content']."' where id=".$id;
		}
		if($this->con->query($str))
		{
			if(!(file_exists("assets/upload")))
			{
				mkdir("assets/upload");
			}
			$valid_formats = array("jpg","png");
			$max_file_size = 1024*1000; 
			$path = "assets/upload/";
			$removeimage=$path.$old_image;
			if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
			{     
					       
				if ($_FILES['cover_image']['error'] == 0)
				{	           
					 										// No error found! Move uploaded files 
						if(move_uploaded_file($_FILES["cover_image"]["tmp_name"], $path.$image))
						{									// No error found! Move uploaded files 
							
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
	function editprofile($data)
	{
		
		
		$id=$data['id'];
		$old_image=$data['old_image'];
		$image=time().$_FILES['profile']['name'];
		$str_users="update users set username='".$data['username']."',email='".$data['email']."',password='".$data['password']."' where id=".$data['id'];
		if($_FILES['profile']['name']!='')
		{
			$str_userdetails="update user_details set firstname='".$data['firstname']."',lastname='".$data['lastname']."',mobile=".$data['mobile']." ,city='".$data['city']."',state='".$data['state']."',country='".$data['country']."',profile_pic='".$image."' where user_id=".$data['id'];
		}
		else
		{	
			$str_userdetails="update user_details set firstname='".$data['firstname']."',lastname='".$data['lastname']."',mobile=".$data['mobile']." ,city='".$data['city']."',state='".$data['state']."',country='".$data['country']."' where user_id=".$data['id'];
		
		}
		if($this->con->query($str_userdetails))
		{
			if($this->con->query($str_users))
			{
				if(!(file_exists("assets/upload/profile")))
				{
					mkdir("assets/upload/profile");
				}
				$valid_formats = array("jpg","png");
				$max_file_size = 1024*1000; 
				$path = "assets/upload/profile/";
				$removeimage=$path.$old_image;
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
					$_SESSION['updateuser']="User Updated Successfully";
					header('Location: index.php');
				}
				
			}
				
		}
	}
	
}

?>
