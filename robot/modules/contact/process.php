 <?php
 session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
 if($_REQUEST['action']=="edit")
  {
    mysqli_query($con,"update config
            set
            phone='".$_REQUEST['phone']."',
            email='".$_REQUEST['email']."',
            facebook='".$_REQUEST['facebook']."',
            twitter='".$_REQUEST['twitter']."',
            linkin='".$_REQUEST['linkin']."',
            google='".$_REQUEST['google']."',
            map='".$_REQUEST['map']."',
            address='".$_REQUEST['address']."'
        ") or die(mysqli_error($con));
    
  $_SESSION["app_alert_message"]="Updated successfully.";
  
  header("location:".HTTP_BASE_URL."contact");
  exit();
  }
  ?>