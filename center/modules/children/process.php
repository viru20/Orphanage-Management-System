<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST['action']=="children")
{
            mysqli_query($con,"insert into ".TABLE_PREFIX."children_master
            set
            children_name='".$_REQUEST['chname']."',
            children_gender='".$_REQUEST['chgender']."',
            children_dob='".date('Y-m-d',strtotime($_REQUEST['chdob']))."',
            children_age='".$_REQUEST['chage']."',
            children_height='".$_REQUEST['chheight']."',
            children_weight='".$_REQUEST['chweight']."',
            children_bloodgroup='".$_REQUEST['chbloodgroup']."',
            center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."',
            children_status='".$_REQUEST['chstatus']."',
            children_datetime='".$datetime."'
        ") or die(mysqli_error($con));
        $id=mysqli_insert_id($con);

        if($_FILES['chimg']['name']!="")
        {
            $logo_name=date('Ymdhis').$_FILES['chimg']['name'];
            move_uploaded_file($_FILES['chimg']['tmp_name'], $children_img_path.$logo_name);
            mysqli_query($con,"update ".TABLE_PREFIX."children_master
                                set
                                children_img='".$logo_name."'
                                where
                                children_id='".$id."'
                ");
        }


        $_SESSION["children_alert_message"]="New children-detail added successfully.";
        header("location:".HTTP_BASE_URL."children");
        exit();
    
    
}

if($_REQUEST['action']=="edit")
{
    if($_FILES['chimg']['tmp_name']!="") {

        $image_name = date('Ymdhis') . $_FILES['chimg']["name"];

        move_uploaded_file($_FILES['chimg']["tmp_name"], $children_path . $image_name);
        mysqli_query($con, "update " . TABLE_PREFIX . "children_master
        set
            children_img='" .$image_name. "'
            where
            children_id='" . $_REQUEST["child_id"] . "'	
        ");
    }

    mysqli_query($con,"update ".TABLE_PREFIX."children_master
            set
            children_name='".$_REQUEST['chname']."',
            children_gender='".$_REQUEST['chgender']."',
            children_dob='".date('Y-m-d',strtotime($_REQUEST['chdob']))."',
            children_age='".$_REQUEST['chage']."',
            children_height='".$_REQUEST['chheight']."',
            children_weight='".$_REQUEST['chweight']."',
            children_bloodgroup='".$_REQUEST['chbloodgroup']."',
            center_id='".$_REQUEST['ceid']."',
            children_status='".$_REQUEST['chstatus']."',
            children_updated_datetime='".$datetime."'
            where
            center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and
             children_id='" . $_REQUEST["child_id"] . "'
        ") or die(mysqli_error($con));
		
	$_SESSION["children_alert_message"]="children-detail updated successfully.";
	
	header("location:".HTTP_BASE_URL."children");
	exit();
}




if($_REQUEST['action']=="deleteapp")
{
	mysqli_query($con,"update ".TABLE_PREFIX."children_master SET children_is_deleted=1,children_datetime='".$datetime."' where children_id='".$_REQUEST["app_id"]."'");
	
	$_SESSION["children_alert_message"]="children-detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."children");
	exit();
}


if($_REQUEST['action']=="app_status")
{	
	$value=0;
	
	if($_REQUEST['value']==0)
	{
		$value=1;
	}

	mysqli_query($con,"update ".TABLE_PREFIX."children_master
	set		
		children_status='".$value."',children_updated_datetime='".$datetime."'
		where
		children_id='".$_REQUEST["app_id"]."'	
	");
	
	$_SESSION["children_alert_message"]="children-detail status has been changed successfully.";
	
	header("location:".HTTP_BASE_URL."children");
	exit();
}
?>