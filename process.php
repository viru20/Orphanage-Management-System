<?php
session_start();
require_once("secure/config.php");

        
if($_REQUEST['action']=="login")
{        
    if($_REQUEST['username'] !== "" && $_REQUEST['password'] !== "")
    {
		$user=$_POST['username'];
    	$pass=base64_encode($_POST['password']);
		$result=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where username ='".$user."' and password ='".$pass."' and user_status=1 and user_is_delete=0") or die(mysqli_error($con));
		$count=mysqli_num_rows($result);
		if($count>0)
		{
            $row = mysqli_fetch_array($result);

            $userid=$row["id"];
            $user_name=$row['name'];
            



            $_SESSION[SESSION_PREFIX.'login-user-id']=$userid;
            $_SESSION[SESSION_PREFIX.'login-user-name']=$user_name;
           
            
			header('location:'.HTTP_BASE_URL.'');
		}
		else
		{
		   echo "invalid";
		}
        }
        else
        {
            echo "false";
        }		
}
if($_REQUEST['action']=="reg")
{
	$pass=base64_encode($_REQUEST['password']);
    $qrychk_pk=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where name='".$_REQUEST['name']."' and user_status=1 and user_is_deleted=0");
    
    if(mysqli_num_rows($qrychk_pk)==0)
    {
        mysqli_query($con,"insert into ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            username='".$_REQUEST['username']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$pass."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            datetime='".$datetime."'
            
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


        $_SESSION["app_alert_message1"]="Account created successfully.";
        header("location:".HTTP_BASE_URL."Registration");
        exit();
}
}

?>