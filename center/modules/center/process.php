<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");

if($_REQUEST['action']=="editcenter")
{

    
     if($_FILES['pimg']['name']!="")
        {
            
            $logo_name=date('Ymdhis').$_FILES['pimg']['name'];
            move_uploaded_file($_FILES['pimg']['tmp_name'], $center_path.$logo_name);
            
            mysqli_query($con,"update ".TABLE_PREFIX."center_master
                                set
                                center_head_image='".$logo_name."'
                                where
                                center_id='".$_REQUEST['id']."'
                ");
        }
        
       $pass= base64_encode($_REQUEST['password']);
    
    mysqli_query($con,"update ".TABLE_PREFIX."center_master
            set
            center_name='".$_REQUEST['cname']."',
            center_mo_no='".$_REQUEST['mono']."',
            center_reg_date='".$_REQUEST['rdate']."',
            center_head_name='".$_REQUEST['pname']."',
            email='".$_REQUEST['email']."',
            password='".$pass."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            history='".$_REQUEST['history']."'
            where center_id='".$_REQUEST['id']."'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="Center Detail has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."center");
	exit();
}
if($_REQUEST['action']=="delete")
{
	mysqli_query($con,"update ".TABLE_PREFIX."center_master SET center_is_deleted=1,datetime='".$datetime."' where center_id='".$_REQUEST["id"]."'");
	
	$_SESSION["app_alert_message"]="Center Detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."center");
	exit();
}
if($_REQUEST['action']=="center_status")
{   
    $value=0;
    
    if($_REQUEST['value']==0)
    {
        $value=1;
    }
    mysqli_query($con,"update ".TABLE_PREFIX."center_master
    set     
        center_status='".$value."',datetime='".$datetime."'
        where
        center_id='".$_REQUEST["id"]."'

    ");
    
    $_SESSION["app_alert_message"]="Center status has been changed successfully.";
    
    header("location:".HTTP_BASE_URL."center");
    exit();
}
?>