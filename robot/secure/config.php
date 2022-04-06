<?php
error_reporting (E_ALL ^ E_NOTICE);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"orphanage_db");
define("TABLE_PREFIX","orphanage_");
define("SESSION_PREFIX","orphanage_");

define("HTTP_BASE_URL","http://localhost/projects/orphanage/robot/");
define("CONTENT","http://localhost/projects/orphanage/content/uploads/");
// Admin Configurations

define("MEDIA",HTTP_BASE_URL."assets/");
define("MODULES",HTTP_BASE_URL."modules/");
define("LOGIN",MODULES."login/");
define("CHANGE_PASSWORD",MODULES."change-password/");
define("DONATION",MODULES."donation/");
define("USER",MODULES."user/");
define("CHILDREN",MODULES."children/");
define("CENTER",MODULES."center/");
define("ADOPT",MODULES."adopt/");
define("DONATE",MODULES."donate/");
define("REPORT",MODULES."report/");
define("ADOPTREPORT",MODULES."adoptreport/");
define("DONATEREPORT",MODULES."donatereport/");
define("DONATIONREPORT",MODULES."donationreport/");
define("CREPORT",MODULES."creport/");
define("CONTACT",MODULES."contact/");
define("SLIDER",MODULES."slider/");
define("NEWSLATTER",MODULES."newslatter/");


/////////////app image path/////////
$app_path="../../../content/uploads/app/";
define("APP_IMAGE",CONTENT."app/");
///////////////////////////////////////

/////////////user image path/////////
$user_path="../../../content/uploads/user/";
define("USER_IMAGE",CONTENT."user/");
///////////////////////////////////////

/////////////children image path/////////
$children_path="../../../content/uploads/children/";
$children_path1="C:/xampp/htdocs/projects/orphanage/content/uploads/children/";
define("CHILDREN_IMAGE",CONTENT."children/");
///////////////////////////////////////


/////////////center image path/////////
$center_path="../../../content/uploads/center/";
define("CENTER_IMAGE",CONTENT."center/");
///////////////////////////////////////

// Upload images path
$product_path="../../content/uploads/user/";
$product_width="355";
$product_height="450";
define("USER_IMAGE",CONTENT."user/");
//////////////////////////////////////
date_default_timezone_set('Asia/Calcutta');
$datetime=date("Y-m-d H:i:s");
?>