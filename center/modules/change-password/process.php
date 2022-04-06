<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
?>
<?php
if($_REQUEST['action']=="changepassword")
{
	
	$passold=base64_encode($_REQUEST['oldpass']);
	$result=mysqli_query($con,"SELECT * from ".TABLE_PREFIX."center_master where password='".$passold."' and center_status =1") or die(mysqli_error());
	$row=mysqli_fetch_array($result);
	
	$count=mysqli_num_rows($result);
	if($count!="")
	{
		if(strcmp($_REQUEST['newpass'],$_REQUEST['cnfpass'])==0)
		{
			
			$password=base64_encode($_REQUEST['newpass']);
			
			mysqli_query($con,"UPDATE ".TABLE_PREFIX."center_master set password='".$password."' where center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
			


			
			$_SESSION["password_message"]="Password Changed successfully.";
	
			header("location:".HTTP_BASE_URL."change-password");
			exit();			
		}
		else
		{
			$_SESSION["password_alert_message"]="New Password and Confirm Password does not match.";
	
			header("location:".HTTP_BASE_URL."change-password");
			exit();
		}
	}
	else
	{
		$_SESSION["password_alert_message"]="Old Password does not match.";
	
		header("location:".HTTP_BASE_URL."change-password");
		exit();
	}
	
}
?>