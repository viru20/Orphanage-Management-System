<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");

/*if($_REQUEST['action']=="newuser")
{
    /*echo "<pre>";
    print_r($_FILES);
    exit;
    $qrychk_pk=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where name='".$_REQUEST['name']."' and user_status=1 and user_is_deleted=0");
    
    if(mysqli_num_rows($qrychk_pk)==0)
    {
        mysqli_query($con,"insert into ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$_REQUEST['password']."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."'
            
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
    
}*/

if($_REQUEST['action']=="edituser")
{

    mysqli_query($con,"update ".TABLE_PREFIX."donation_master
            set
            amount='".$_REQUEST['amount']."',
            payment_method='".$_REQUEST['pmtd']."'
            
            where id='".$_REQUEST['id']."'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="Donation Request has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."donationrequest");
	exit();
}

if($_REQUEST['action']=="delete")
{
	mysqli_query($con,"update ".TABLE_PREFIX."donation_master 
        SET 
        payment_is_delete=1,datetime='".$datetime."' where id='".$_REQUEST["id"]."'");
	
	$_SESSION["app_alert_message"]="Request Deleted successfully.";
	
	header("location:".HTTP_BASE_URL."donationrequest");
	exit();
}
if($_REQUEST['action']=="payment_status")
{   
    

    mysqli_query($con,"update ".TABLE_PREFIX."donation_master
    set     
        payment_status=1,
        datetime='".$datetime."'
        where
        id='".$_REQUEST["id"]."'

    ");
    
    $_SESSION["app_alert_message"]="Request Accepted Successfully.";
    
    header("location:".HTTP_BASE_URL."donationrequest");
    exit();
}
?>