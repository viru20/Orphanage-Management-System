<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST['action']=="export")
{   
    $output='';
    $sql=mysqli_query($con,"select *from orphanage_donation_master;");
    if($sql)
    {
       $output='
       <table class="table" border="1" align="center">
       <tr>
       <th colspan="6"><h1 align="center">Donation Details</h1></th>
       </tr>
       <tr>
       <th colspan="6"><h4 align="right">'.$datetime.'
       </th>
       </tr>
       <tr>
                    <th>ID</th>
                    <th>AMOUNT</th>
                    <th>PAYMENT_METHOD</th>
                    <th>CENTER_NAME</th>
                    <th>USER_NAME</th>
                    <th>DATE</th>
       </tr>';

     while($result_donation = mysqli_fetch_array($sql))
                {
                    
                    
                     $output .='<td>1</td>
                      <td>100000</td>
                      <td>cash</td>
                      <td>test1</td>
                      <td>jay</td>
                        <td>21 dec</td>
                    </tr>';                          
                  }   
                  $output .='</table>';
}                 
                  echo $output;
                  header("Content-Type: application/xls");
                  header("Content-disposition:attachment; filename='".$datetime."'report.xls"); 
}

 


if($_REQUEST['action']=="newuser")
{
    /*echo "<pre>";
    print_r($_FILES);
    exit;*/
    $qrychk_pk=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where name='".$_REQUEST['name']."' and user_status=1 and user_is_deleted=0");
    
    if(mysqli_num_rows($qrychk_pk)==0)
    {
        mysqli_query($con,"insert into ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$_REQUEST['password']."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."'
            
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


        $_SESSION["app_alert_message"]="New User added successfully.";
        header("location:".HTTP_BASE_URL."user");
        exit();
    }
    else
    {
        $_SESSION["app_alert_message"]="This package name is already exists!";
        header("location:".HTTP_BASE_URL."user");
        exit(); 
    }
    
}

if($_REQUEST['action']=="edituser")
{
    if($_FILES['img']['tmp_name']!="") {

        $image_name = date('Ymdhis') . $_FILES['img']["name"];

        move_uploaded_file($_FILES['img']["tmp_name"], $user_path . $image_name);
        mysqli_query($con, "update " . TABLE_PREFIX . "user_master
        set
            image='" .$image_name. "'
            where
            id='" . $_REQUEST["id"] . "'	
        ");
    }

    mysqli_query($con,"update ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mono']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            password='".$_REQUEST['password']."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            datetime='".$datetime."'
            where id='".$_REQUEST['id']."'
        ") or die(mysqli_error($con));
		
	$_SESSION["app_alert_message"]="User Detail has been updated successfully.";
	
	header("location:".HTTP_BASE_URL."user");
	exit();
}
if($_REQUEST['action']=="delete")
{
	mysqli_query($con,"update ".TABLE_PREFIX."donation_master SET payment_is_delete=1,datetime='".$datetime."' where id='".$_REQUEST["id"]."'");
	
	$_SESSION["app_alert_message"]="Delete Request successfully.";
	
	header("location:".HTTP_BASE_URL."request");
	exit();
}
if($_REQUEST['action']=="payment_status")
{   

     
    $value=0;
    
    if($_REQUEST['value']==0)
    {
        $value=1;
    }

    mysqli_query($con,"update ".TABLE_PREFIX."donation_master
    set     
        payment_status='".$value."',datetime='".$datetime."'
        where
        id='".$_REQUEST["id"]."'

    ");
    
    $_SESSION["app_alert_message"]="REQUEST ACCEPTED Successfully.";
    
    header("location:".HTTP_BASE_URL."request");
    exit();
}
?>