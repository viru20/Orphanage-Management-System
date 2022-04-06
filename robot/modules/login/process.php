<?php
session_start();
require_once("../../secure/config.php");



		$user=$_REQUEST['username'];
    	$pass=$_REQUEST['password'];
		

		$result=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where username ='".$user."' and password ='".$pass."' and user_status=1 and user_is_delete=0") or die(mysqli_error($con));
		$count=mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
        if($count!="")
		{
           
            $adminid=$row["id"];
            $admin_name=$row['username'];
            



            $_SESSION[SESSION_PREFIX.'login-admin-name']=$adminid;
            $_SESSION[SESSION_PREFIX.'login_user_name']=$admin_name;
            
           
            
			
		}
		else
		{
            header('location:'.HTTP_BASE_URL.);
            /*header('location:'.MODULES.'login?error');*/
		}		
?>