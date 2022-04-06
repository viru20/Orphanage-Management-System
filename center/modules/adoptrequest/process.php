<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");


if($_REQUEST['action']=="editapp")
{

    mysqli_query($con,"update ".TABLE_PREFIX."adopt_master
            set
            JOB='".$_REQUEST['ujob']."',
            SALARY='".$_REQUEST['usalary']."'
            where
            ADOPT_ID='".$_REQUEST["id"]."'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="Record has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."adoptrequest");
	exit();
}


if($_REQUEST['action']=="deleteapp")
{

	mysqli_query($con,"update ".TABLE_PREFIX."adopt_master SET ADOPT_IS_DELETED=1,DATETIME='".$datetime."' where ADOPT_ID='".$_REQUEST["id"]."'");

	
	$_SESSION["app_alert_message"]="Adopt Detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."adoptrequest");
	exit();
}


if($_REQUEST['action']=="ADOPT_STATUS")
{	
	
	mysqli_query($con,"update ".TABLE_PREFIX."adopt_master
	set		
		ADOPT_STATUS=1,
        DATETIME='".$datetime."'
		where
		ADOPT_ID='".$_REQUEST["id"]."'	
	");

	mysqli_query($con,"update ".TABLE_PREFIX."children_master
	set		
		adopt='1',
        date='".$datetime."'
		where
		children_id='".$_REQUEST["cid"]."'	
	");

	

	$_SESSION["app_alert_message"]="Adopt status has been changed successfully.";
	
	header("location:".HTTP_BASE_URL."adoptrequest");
	exit();
}
?>