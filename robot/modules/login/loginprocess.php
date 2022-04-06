<?php
session_start();
require_once("../../secure/config.php");



		$user=mysqli_real_escape_string($con,$_POST['adminusername']);
    	$pass=mysqli_real_escape_string($con,$_POST['adminpassword']);
		//$pass=base64_encode($pass);
   		
		$result=mysqli_query($con,"select * from ".TABLE_PREFIX."admin_master where admin_username ='".$user."' and admin_password ='".$pass."' and admin_status=1 and admin_is_delete=0") or die(mysqli_error($con));
		$count=mysqli_num_rows($result);
		if($count!="")
		{
            $row = mysqli_fetch_array($result);

            $adminid=$row["admin_id"];
            $admin_name=$row['admin_name'];
            $admin_type=$row['admin_is_master'];



            $_SESSION[SESSION_PREFIX.'login-admin-name']=$adminid;
            $_SESSION[SESSION_PREFIX.'login_user_name']=$admin_name;
            $_SESSION[SESSION_PREFIX.'login_user_type']=$admin_type;
            
			header('location:'.HTTP_BASE_URL);
		}
		else
		{
		    header('location:'.HTTP_BASE_URL.'login?error');
		}		
?>