<?php
session_start();
require_once("../../secure/config.php");



		$name=mysqli_real_escape_string($con,$_POST['adminusername']);
    	$pass=mysqli_real_escape_string($con,$_POST['adminpassword']);
		$pass=base64_encode($pass);
   		
		$result=mysqli_query($con,"select * from ".TABLE_PREFIX."center_master where email='".$name."' and password ='".$pass."' and center_status=1 and center_is_deleted=0") or die(mysqli_error($con));
		$count=mysqli_num_rows($result);
		if($count!="")
		{
            $row = mysqli_fetch_array($result);

            $adminid=$row["center_id"];
            $admin_name=$row['center_name'];
            

            $_SESSION[SESSION_PREFIX.'login-center-id']=$adminid;
            $_SESSION[SESSION_PREFIX.'login_center_name']=$admin_name;
            

			header('location:'.HTTP_BASE_URL);
		}
		else
		{
		    header('location:'.HTTP_BASE_URL.'login?error');
		}		
?>