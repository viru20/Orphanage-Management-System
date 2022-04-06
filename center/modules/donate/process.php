<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");

if($_REQUEST['action']=="children")
{
    
        mysqli_query($con,"insert into ".TABLE_PREFIX."orphanage_adopt_master
            set
            children_name='".$_REQUEST['chname']."',
            children_gender='".$_REQUEST['chgender']."',
            children_dob='".$_REQUEST['chdob']."',
            children_age='".$_REQUEST['chage']."',
            children_height='".$_REQUEST['chheight']."',
            children_weight='".$_REQUEST['chweight']."',
            children_bloodgroup='".$_REQUEST['chbloodgroup']."',
            center_id='".$_REQUEST['ceid']."',
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


        $_SESSION["app_alert_message"]="New application added successfully.";
        header("location:".HTTP_BASE_URL."children");
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

    mysqli_query($con,"update ".TABLE_PREFIX."package_msater
            set
            package_devlopar_name='".$_REQUEST['devname']."',
            package_app_name='".$_REQUEST['appname']."',
            package_package_name='".$_REQUEST['packname']."',
            package_link='".$_REQUEST['applink']."',
            package_ad_type='".$_REQUEST['display_ad']."',
            package_isAdShow='".$_REQUEST['is_ad_show']."',
            package_interstitial_ad_code='".$_REQUEST['g_interstitial']."',
            package_banner_ad_code='".$_REQUEST['g_banner']."',
            package_native_id='".$_REQUEST['g_native']."',
            package_video_ad_code='".$_REQUEST['g_video']."',
            package_fb_interstial='".$_REQUEST['fb_interstitial']."',
            package_fb_banner='".$_REQUEST['fb_banner']."',
            package_fb_native='".$_REQUEST['fb_native']."',
            package_fb_video='".$_REQUEST['fb_video']."',
            package_unity_game_id='".$_REQUEST['game_id']."',
            package_appLovin='".$_REQUEST['appLovin_id']."',
            package_startup_appid='".$_REQUEST['s_app_id']."',
            package_startup_devid='".$_REQUEST['s_dev_id']."',
            package_version='".$_REQUEST['version']."',
            package_isupdate='".$_REQUEST['is_update']."',
            package_spintime='".$_REQUEST['spin_time']."',
            package_totalspin='".$_REQUEST['total_spin']."',
            package_total_search_card='".$_REQUEST['total_search_card']."',
            package_crash_card_random_amt='".$_REQUEST['crash_card_random_amount']."',
            package_min_widharw_amt='".$_REQUEST['MinWidhrawAmount']."',
            package_min_widhdraw_dailog_msg='".$_REQUEST['MinWidhrawwatnmsg']."',
            package_rateus='".$_REQUEST['rateus']."',
            package_rate_bonus='".$_REQUEST['ratebonus']."',
            package_rate_bonus_amt='".$_REQUEST['ratebonusamt']."',
            package_daily_bonus_amt='".$_REQUEST['dailybonusamt']."',
            package_daily_bonus_dailog_msg='".$_REQUEST['dailybonusdailogmsg']."',
            package_rate_rs='".$_REQUEST['dimondrs']."',
            dimond_rate_doller='".$_REQUEST['dimonddoller']."',
            package_rate_euro='".$_REQUEST['dimondero']."',
            package_is_video_btn_show='".$_REQUEST['videobtn']."',
            package_video_cnt='".$_REQUEST['videocount']."',
            package_spin_on_video='".$_REQUEST['spinonvideo']."',
            package_system_datetime='".$_REQUEST['todaydatetime']."',
            package_jackpot_from='".$_REQUEST['jackpotrangfrom']."',
            package_jackpot_to='".$_REQUEST['jackpotrangto']."',
            package_full_next_count='".$_REQUEST['full_next_count']."',
            package_is_full='".$_REQUEST['is_full']."',
            package_is_native='".$_REQUEST['is_native']."',
            package_is_banner='".$_REQUEST['is_banner']."',
            package_privacy_policy='".$_REQUEST['privacy_policy']."',
            package_status='".$_REQUEST['app_status']."'
            where
            package_id='" . $_REQUEST["app_id"] . "'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="Application has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."manage_app");
	exit();
}

if($_REQUEST['action']=="sponsor_app")
{
    $arr_app=implode(',', $_REQUEST['app_name']);
    mysqli_query($con,"update ".TABLE_PREFIX."package_msater
                        set
                        package_sponsor_app='".$arr_app."'
                        where
                        package_id='".$_REQUEST['app_id']."'
                ");
    $_SESSION["app_alert_message"]="Sponsor application edit successfully.";
    
    header("location:".HTTP_BASE_URL."manage_app");
    exit();
}


if($_REQUEST['action']=="deleteapp")
{

	mysqli_query($con,"update ".TABLE_PREFIX."adopt_master SET ADOPT_IS_DELETED=1,DATETIME='".$datetime."' where ADOPT_ID='".$_REQUEST["ADOPT_ID"]."'");

	
	$_SESSION["app_alert_message"]="Adopt Detail has been removed successfully.";
	
	header("location:".HTTP_BASE_URL."adopt");
	exit();
}
if($_REQUEST['action']=="ADOPT_STATUS")
{	
	$value=0;
	
	if($_REQUEST['value']==0)
	{
		$value=1;
	}

	mysqli_query($con,"update ".TABLE_PREFIX."adopt_master
	set		
		ADOPT_STATUS=1,DATETIME='".$datetime."'
		where
		ADOPT_ID='".$_REQUEST["ADOPT_ID"]."'	
	");
	
	$_SESSION["app_alert_message"]="Adopt status has been changed successfully.";
	
	header("location:".HTTP_BASE_URL."adopt");
	exit();
}
?>