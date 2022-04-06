<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST['action']=="newapp")
{
        mysqli_query($con,"insert into ".TABLE_PREFIX."package_msater
            set
            package_devlopar_name='".$_REQUEST['devname']."',
            package_app_name='".$_REQUEST['appname']."',
            package_package_name='".$_REQUEST['packname']."',
            package_link='".$_REQUEST['applink']."',
            package_interstitial_ad_code='".$_REQUEST['interad']."',
            package_banner_ad_code='".$_REQUEST['bannerad']."',
            package_video_ad_code='".$_REQUEST['videoad']."',
            package_logo='noimage.png',
            package_status='".$_REQUEST['app_status']."',
            package_datetime='".$datetime."'
        ") or die(mysqli_error($con));
        $id=mysqli_insert_id($con);
        if($_FILES['app_logo']['name']!="")
        {
            $logo_name=date('Ymdhis').$_FILES['app_logo']['name'];
            move_uploaded_file($_FILES['app_logo']['tmp_name'], $app_path.$logo_name);
            mysqli_query($con,"update ".TABLE_PREFIX."package_msater
                                set
                                package_logo='".$logo_name."'
                                where
                                package_id='".$id."'
                ");
        }

    $_SESSION["app_alert_message"]="New application added successfully.";
    header("location:".HTTP_BASE_URL."manage_app");
    exit();
    
}

if($_REQUEST['action']=="editapp")
{
    if($_FILES['app_logo']['tmp_name']!="") {

        $image_name = date('Ymdhis') . $_FILES['app_logo']["name"];

        move_uploaded_file($_FILES['app_logo']["tmp_name"], $app_path . $image_name);
        mysqli_query($con, "update " . TABLE_PREFIX . "package_msater
        set
            package_logo='" .$image_name. "'
            where
            package_id='" . $_REQUEST["app_id"] . "'	
        ");
    }

    mysqli_query($con, "update " . TABLE_PREFIX . "package_msater
        set
            package_devlopar_name='".$_REQUEST['devname']."',
            package_app_name='" .$_REQUEST['appname']. "',
            package_package_name='" .$_REQUEST['packname']. "',
            package_link='".$_REQUEST['applink']."',
            package_interstitial_ad_code='".$_REQUEST['interad']."',
            package_banner_ad_code='".$_REQUEST['bannerad']."',
            package_video_ad_code='".$_REQUEST['videoad']."',
            package_status='" . $_REQUEST['app_status'] . "',
            package_updated_datetime='" . $datetime . "'
            where
            package_id='" . $_REQUEST["app_id"] . "'	
        ");
		
	$_SESSION["app_alert_message"]="Application has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."manage_app");
	exit();
}
if($_REQUEST['action']=="deleteapp")
{
	mysqli_query($con,"update ".TABLE_PREFIX."package_msater SET package_is_deleted=1,package_datetime='".$datetime."' where package_id='".$_REQUEST["app_id"]."'");
	
	$_SESSION["app_alert_message"]="Application has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."manage_app");
	exit();
}
if($_REQUEST['action']=="app_status")
{	
	$value=0;
	
	if($_REQUEST['value']==0)
	{
		$value=1;
	}

	mysqli_query($con,"update ".TABLE_PREFIX."package_msater
	set		
		package_status='".$value."',package_updated_datetime='".$datetime."'
		where
		package_id='".$_REQUEST["app_id"]."'	
	");
	
	$_SESSION["app_alert_message"]="Application status has been changed successfully.";
	
	header("location:".HTTP_BASE_URL."manage_app");
	exit();
}
?>