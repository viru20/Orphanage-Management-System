<?php
error_reporting (E_ALL ^ E_NOTICE);
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"orphanage_db");
define("TABLE_PREFIX","orphanage_");
define("SESSION_PREFIX","orphanage_");

define("HTTP_BASE_URL","http://localhost/projects/orphanage/");
define("CONTENT","http://localhost/projects/orphanage/content/uploads/");
// Admin Configurations

define("MEDIA",HTTP_BASE_URL."assets/");
define("LOGIN",HTTP_BASE_URL."login/");
define("CENTER",HTTP_BASE_URL."center/");
/////////////app image path/////////
$app_path="../../../content/uploads/app/";
define("APP_IMAGE",CONTENT."app/");
///////////////////////////////////////

/////////////user image path/////////
$user_path="content/uploads/user/";
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