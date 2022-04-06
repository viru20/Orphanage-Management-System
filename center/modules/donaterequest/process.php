<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");


if($_REQUEST['action']=="editapp")
{

    mysqli_query($con,"update ".TABLE_PREFIX."donate_master
            set
            place='".$_REQUEST['place']."'
            where
            donate_id='".$_REQUEST["id"]."'
        ") or die(mysqli_error($con));
		

		
	$_SESSION["app_alert_message"]="Record has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."donaterequest");
	exit();
}


if($_REQUEST['action']=="deleteapp")
{

	mysqli_query($con,"update ".TABLE_PREFIX."donate_master SET donate_is_deleted=1 , donate_datetime='".$datetime."' where donate_id='".$_REQUEST["id"]."'");

	

	
	$_SESSION["app_alert_message"]="Donate Detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."donaterequest");
	exit();
}


if($_REQUEST['action']=="donate_status")
{	
	
	mysqli_query($con,"update ".TABLE_PREFIX."donate_master
	set		
		donate_status=1,
        donate_datetime='".$datetime."'
		where
		donate_id='".$_REQUEST["id"]."'	
	");


	

	$_SESSION["app_alert_message"]="Donate status has been changed successfully.";
	
	header("location:".HTTP_BASE_URL."donaterequest");
	exit();
}
?>