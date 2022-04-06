<?php
session_start();
require_once("../../secure/config.php");

if($_SESSION[SESSION_PREFIX.'login-admin-name']!="")
{
   header("location:".HTTP_BASE_URL."");
    exit();
}
?>
<!DOCTYPE html>
<html class=" ">

<head>
       
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Home loan calculator | Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
         <meta name="robots" content="NOINDEX, NOFOLLOW" />

       

        <!-- CORE CSS FRAMEWORK - START -->
        <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="assets/plugins/icheck/skins/square/orange.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

<script language="javascript">
function validation()
{
    with(document.frmadminlogin)
    {
        
            var error=0;
            var message;
            message="Please enter / correct folllowing errors to proceed further";
            message=message+ "\n" + "-------------------------------------------------------------";
            
            if(adminusername.value=='')
            {
                error=1;
                message=message + "\n" + "please enter username";
            }
            
            if(adminpassword.value=='')
            {
                error=1;
                message=message + "\n" + "please enter password";
            }
            
            
            if (error==1)
            {
                alert(message);
                return false;
            }
            else
            {
                return true;        
            }
    }
}
</script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="login_page" style="background-color: rgb(29, 186, 110) !important;">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8" style="background: rgba(213, 215, 222, 0.701961);">
             <div align="center" style="margin-top: 10px;"> 
            <img src="<?php echo HTTP_BASE_URL;?>assets/images/d&d logo.png" class="logo_hi_wi" >
               </div>
                <form method="post" name="frmadminlogin" id="frmadminlogin" action="<?php echo LOGIN;?>loginprocess.php" >
                <?php               
                if(isset($_REQUEST['error']))
                {
                ?>
                <p>
                <label for="user_login"><strong style="color:red">Invalid username or password!</strong></label>
               </p>
               
                <?php
                }
                ?>
                    <p>
                        <label for="user_login">Username<br />
                            <input type="text"  name="adminusername" id="adminusername" class="input" size="20" /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="adminpassword" id="adminpassword" class="input"  size="20" /></label>
                    </p>                   

                    <p class="submit">
                        <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-blue btn-block" value="Sign In" onClick="return validation();" />
                    </p>
                </form>

              

            </div>
        </div>







        <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


        <!-- CORE JS FRAMEWORK - START --> 
        <script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 


        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE TEMPLATE JS - START --> 
        <script src="assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END -->       
    </body>

<!-- Mirrored from jaybabani.com/ultra-admin/ui-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Jun 2015 05:43:50 GMT -->
</html>



