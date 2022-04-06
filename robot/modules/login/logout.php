<?php
session_start();
require_once("../../secure/config.php");

$qry_get_user=mysqli_query($con,"select tracking_id from ".TABLE_PREFIX."login_tracking_master where tracking_user_id='".$_SESSION[SESSION_PREFIX.'login-admin-name']."' order by tracking_id DESC LIMIT 1");
$result_get_user=mysqli_fetch_array($qry_get_user);

$qry_admin=mysqli_query($con,"select * from ".TABLE_PREFIX."admin_master where admin_id='".$_SESSION[SESSION_PREFIX.'login-admin-name']."'");
$result_admin=mysqli_fetch_array($qry_admin);

if($result_admin['admin_email_verify']=="1") {
    mysqli_query($con, "update " . TABLE_PREFIX . "login_tracking_master
                        SET
                        tacking_logout_datetime='" . $datetime . "'
                        where
                        tracking_id='" . $result_get_user['tracking_id'] . "'
               ");
}

mysqli_close($con);

unset($_SESSION[SESSION_PREFIX.'login-user-name']);
unset($_SESSION[SESSION_PREFIX.'login-user-type']);
session_destroy();
header('location:'.HTTP_BASE_URL.'login');
exit;
?>