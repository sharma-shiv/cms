<?php
	session_start();
	$action=$_REQUEST['action'];
	$data=$_REQUEST['data'];
	include 'classes/operations.php';
	$opr=new operations();

	switch($action)
	{
		case "adminlogin":  		
				$opr->adminlogin($data);
				break;
		case "addblogs":
				$opr->addblogs($data);
				break;
		case "addpages":
				$opr->addpages($data);
				break;
		case "activateblog":
				$opr->activateblog($data);
				break;
		case "updateblog":
				$opr->updateblog($data);
				break;
		case "deleteblog":
				$opr->deleteblog($data);
				break;
		case "updatepage":
				$opr->updatepage($data);
				break;
		case "deletepage":
				$opr->deletepage($data);
				break;
		case "change_logo":
				$opr->change_logo($data);
				break;
		case "adduser":
			
				$opr->adduser($data);
				break;
		case "updateuser":
				$opr->updateuser($data);
				break;
		case "deleteuser";
				$opr->deleteuser($data);
				break;
		default:   	break;
	}
?>