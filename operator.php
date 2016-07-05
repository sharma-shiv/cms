<?php 
	session_start();
	$action=$_REQUEST['action'];
	$data=$_REQUEST['data'];
	include 'classes/operations.php';
	$opr=new operations();
	
	switch($action)
	{
		
		case "storedata":  		
				$opr->storedata($data);
				break;
		case "adminlogin":  		
				$opr->adminlogin($data);
				break;
		case "userlogin":  		
				$opr->userlogin($data);
				break;
		case "addblogs":
				$opr->addblogs($data);
				break;
		case "addpages":
				$opr->addpages($data);
				break;
		case "updateblog":
				$opr->updateblog($data);
				break;
		case "deleteblog":
				$opr->deleteblog($data);
				break;
		case "editprofile":
				$opr->editprofile($data);
				break;
		default:   	break;
	
	}
?>