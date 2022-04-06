<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST['action']=="newuser")
{
    /*echo "<pre>";
    print_r($_FILES);
    exit;*/
    $pass=base64_encode($_REQUEST['password']);
    $qrychk_pk=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where name='".$_REQUEST['name']."' and user_status=1 and user_is_deleted=0");
    
    if(mysqli_num_rows($qrychk_pk)==0)
    {
        mysqli_query($con,"insert into ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            username='".$_REQUEST['username']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$pass."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            datetime='".$datetime."'
            
        ") or die(mysqli_error($con));
        $id=mysqli_insert_id($con);
        if($_FILES['img']['name']!="")
        {
            $logo_name=date('Ymdhis').$_FILES['img']['name'];
            move_uploaded_file($_FILES['img']['tmp_name'], $user_path.$logo_name);
            
            mysqli_query($con,"update ".TABLE_PREFIX."user_master
                                set
                                image='".$logo_name."'
                                where
                                id='".$id."'
                ");
        }


        $_SESSION["app_alert_message"]="New User added successfully.";
        header("location:".HTTP_BASE_URL."user");
        exit();
    }
    else
    {
        $_SESSION["app_alert_message"]="This package name is already exists!";
        header("location:".HTTP_BASE_URL."user");
        exit(); 
    }
    
}

if($_REQUEST['action']=="edituser")
{
    if($_FILES['img']['tmp_name']!="") {

        $image_name = date('Ymdhis') . $_FILES['img']["name"];

        move_uploaded_file($_FILES['img']["tmp_name"], $user_path . $image_name);
        mysqli_query($con, "update " . TABLE_PREFIX . "user_master
        set
            image='" .$image_name. "'
            where
            id='" . $_REQUEST["id"] . "'	
        ");
    }
$pass=base64_encode($_REQUEST['password']);
    mysqli_query($con,"update ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            username='".$_REQUEST['username']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$pass."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            user_update_datetime='".$datetime."'
            where id='".$_REQUEST['id']."'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="User Detail has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."user");
	exit();
}
if($_REQUEST['action']=="delete")
{
	mysqli_query($con,"update ".TABLE_PREFIX."user_master SET user_is_delete=1,datetime='".$datetime."' where id='".$_REQUEST["id"]."'");
	
	$_SESSION["app_alert_message"]="User Detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."user");
	exit();
}
if($_REQUEST['action']=="user_status")
{   
    $value=0;
    
    if($_REQUEST['value']==0)
    {
        $value=1;
    }

    mysqli_query($con,"update ".TABLE_PREFIX."user_master
    set     
        user_status='".$value."',datetime='".$datetime."'
        where
        id='".$_REQUEST["id"]."'

    ");
    
    $_SESSION["app_alert_message"]="User status has been changed successfully.";
    
    header("location:".HTTP_BASE_URL."user");
    exit();
}
?>