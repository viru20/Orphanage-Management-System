<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");

if($_REQUEST['action']=="appinfo_edit")
{
	

	mysqli_query($con,"update ".TABLE_PREFIX."news_master
	set
		daily_free_coins_news_desc='".htmlentities($_REQUEST['txtname'],ENT_QUOTES)."'
		where
		daily_free_coins_news_id='".$_REQUEST["appinfo_id"]."'	
	");

	$_SESSION["appinfo_alert_message"]="News has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."appinfo");
	exit();
}

?>