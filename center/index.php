<?php

session_start();
require_once("secure/config.php");
require_once("secure/function.php");
//require_once("secure/validate.php");

if(empty($_SESSION[SESSION_PREFIX.'login-center-id']))
{
    header("location:login");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
       
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Orphanage - Center Panel</title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo HTTP_BASE_URL;?>favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />      
        <meta name="robots" content="NOINDEX, NOFOLLOW" />

        <!-- CORE CSS FRAMEWORK - START -->
       <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <!-- <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/> -->
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->
       
         <!-- DATA TABLE CSS - END -->
        <link href="assets/plugins/datatables/css/jquery.dataTables.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen"/> 

         <link href="assets/plugins/bootstrap3-wysihtml5/css/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/css/uikit.min.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/vendor/codemirror/codemirror.css" rel="stylesheet" type="text/css" media="screen"/><link href="assets/plugins/uikit/css/components/htmleditor.css" rel="stylesheet" type="text/css" media="screen"/>
  
        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!--<link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>-->
        
        <!-- CORE CSS TEMPLATE - END -->

         <!--Widgets -->
         <!-- <link href="assets/plugins/icheck/skins/minimal/white.css" rel="stylesheet" type="text/css" media="screen"/>
         <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen"/>   -->
       <!-- <script src="assets/js/jquery-1.10.2.js" ></script> 
        <script src="assets/js/jquery-ui.js"></script>-->
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body><!-- START TOPBAR -->
    <?php include("themes/topbar.php"); ?>

        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <div class="page-sidebar ">
                <!-- MAIN MENU - START -->

                <?php include("themes/leftmenu.php"); ?>               
                <!-- MAIN MENU - END -->
            </div>
            
           <?php
        $module=$_GET['module'];
        switch($module)
        {
                 
            case 1:
            include("modules/change-password/change-password.php"); 
            break; 

            case 2:
            include("modules/donation/donation.php");
            break;
            
            case 3:
            include("modules/user/user.php");
            break;
            
            case 4:
            include("modules/children/children.php");
            break;
            
            case 5:
            include("modules/center/center.php");
            break;

            case 6:
            include("modules/adopt/adopt.php");
            break;

            case 7:
            include("modules/donationreport/donationreport.php");
            break;

            case 8:
            include("modules/childrenreport/childrenreport.php");
            break;

            case 9:
            include("modules/donate/donate.php");
            break;

            case 10:
            include("modules/adoptreport/adoptreport.php");
            break;

            case 11:
            include("modules/donatereport/donatereport.php");
            break;

            case 12:
            include("modules/adoptrequest/adoptrequest.php");
            break;

            case 13:
            include("modules/donationrequest/donationrequest.php");
            break; 

            case 14:
            include("modules/donaterequest/donaterequest.php");
            break;           

            default:
            include("main.php"); 
            break;
        }                           
        ?>
            <!-- END CONTENT -->
            

       </div>
        <!-- END CONTAINER -->
        <?php //include("themes/footer.php"); ?> 
    </body>
</html>
