<?php
include('secure/config.php');
session_start();
require("./src/class.phpmailer.php");
require("./src/PHPMailerAutoload.php");
require("./src/SMTP.php");

if($_REQUEST['action']=="adopt")
{
if($_REQUEST['cid']!="" && $_REQUEST['job']!="" && $_REQUEST['salary']!="")
{	
    require("./src/class.phpmailer.php");
    require("./src/PHPMailerAutoload.php");
    require("./src/SMTP.php");
	$qry=mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where center_id='".$_REQUEST['cid']."'");
	$res=mysqli_fetch_array($qry);

    mysqli_query($con,"insert into ".TABLE_PREFIX."adopt_master
            set
            USER_ID='".$_SESSION[SESSION_PREFIX.'login-user-id']."',
            CHILDREN_ID='".$_REQUEST['cid']."',
            CENTER_ID='".$res['center_id']."',
            JOB='".$_REQUEST['job']."',
            SALARY='".$_REQUEST['salary']."',
            ADOPT_STATUS=0,
            DATETIME='".$datetime."'

        ") or die(mysqli_error($con));
    $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
    $res1=mysqli_fetch_array($qry1);

   $email=$res1['email'];
        $to="";
    $full_name="Orphanage";
    $subject="Thank you for Inquiry - Orphanage";
    	$message='<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#023ea1">
                            <table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="8" style="width:8px"></td>
                                        <td>
                                            <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
                                        </td>
                                        <td width="8" style="width:8px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
                                            <img src="http://jptv.epizy.com/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="Orphanage">
                                            <div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="font-size:24px">Dear , '.$res1['name'].'</div>
                                                <div style="font-size:18px">Thank you for Request to Adopt Children.<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></div>
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Your Request is sent to center successfully.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Center will contact you in 24 hours.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Kind regards<br><a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);text-decoration:inherit">Orphanage<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></a>
                                            </div>
                                        </div>
                                        <!-- <div style="text-align:left">
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
                                                <div style="direction:ltr">Copyright © 2021, Medical 24 Global S.L., <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">C/ San Jaime 49, 1 Santa Eulalia del Riu, Islas Baleares</a></div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>';
    send_mail($email,$subject,$message,$to,$full_name);

    echo "true";


    /*$mail = new PHPMailer;

    $mail->SMTPDebug = 1;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom(EMAIL,'Orphanage');
    $mail->addAddress($res1['email']);  // Add a recipient
                 // Name is optional
    $mail->addReplyTo(EMAIL);

    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body    = '<div style="font-size:28px;">'.$message.'</div>';
    $mail->AltBody = $message;
    $mail->send();
    // if(!$mail->send()) {
    //     echo 'Message could not be sent.';
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message has been sent';
    // }
     echo "true";*/


}
else
{
    echo "false";
}
}

if($_REQUEST['action']=="donation")
{
if($_REQUEST['ceid']!="" && $_REQUEST['amount']!=""  && $_REQUEST['message']!="")
{
 mysqli_query($con,"insert into ".TABLE_PREFIX."donation_master
            set
            user_id='".$_SESSION[SESSION_PREFIX.'login-user-id']."',
            center_id='".$_REQUEST['ceid']."',
            amount='".$_REQUEST['amount']."',
            message='".$_REQUEST['message']."',
            payment_status='0',
            datetime='".$datetime."'

        ") or die(mysqli_error($con));

  $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
    $res1=mysqli_fetch_array($qry1);

   $email=$res1['email'];
        $to="";
    $full_name="Orphanage";
    $subject="Thank you for Inquiry - Orphanage";
    $message='<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#023ea1">
                            <table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="8" style="width:8px"></td>
                                        <td>
                                            <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
                                        </td>
                                        <td width="8" style="width:8px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
                                            <img src="http://jptv.epizy.com/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="Orphanage">
                                            <div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="font-size:24px">Dear , '.$res1['name'].'</div>
                                                <div style="font-size:18px">Thank You For Your Donation Request.<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></div>
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Your Request is sent to center successfully.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Center will contact you in 24 hours.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Kind regards<br><a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);text-decoration:inherit">Orphanage<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></a>
                                            </div>
                                        </div>
                                        <!-- <div style="text-align:left">
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
                                                <div style="direction:ltr">Copyright © 2021, Medical 24 Global S.L., <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">C/ San Jaime 49, 1 Santa Eulalia del Riu, Islas Baleares</a></div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>';
    send_mail($email,$subject,$message,$to,$full_name);

    echo "true";
}
else
{
    echo "false";
}
}
if($_REQUEST['action']=="volunteer")
{
 
    if($_REQUEST['name']!=="" && $_REQUEST['gender']!=="" && $_REQUEST['Age']!=="" && $_REQUEST['email']!=="" && $_REQUEST['phone']!=="" && $_REQUEST['country']!=="" && $_REQUEST['region']!=="" && $_REQUEST['city']!=="") 
    {
    mysqli_query($con,"insert into ".TABLE_PREFIX."volunteer_master
            set
           name='".$_REQUEST['name']."',
           gender='".$_REQUEST['gender']."',
           age='".$_REQUEST['Age']."',
           email='".$_REQUEST['email']."',
           phone='".$_REQUEST['phone']."',
           country='".$_REQUEST['country']."',
           region='".$_REQUEST['region']."',
           city='".$_REQUEST['city']."',
           date='".$date."'
            

        ") or die(mysqli_error($con));

     $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
    $res1=mysqli_fetch_array($qry1);

   $email=$res1['email'];
        $to="";
    $full_name="Orphanage";
    $subject="Thank you for Inquiry - Orphanage";
    $message='<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#023ea1">
                            <table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="8" style="width:8px"></td>
                                        <td>
                                            <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
                                        </td>
                                        <td width="8" style="width:8px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
                                            <img src="http://jptv.epizy.com/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="Orphanage">
                                            <div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="font-size:24px">Dear , '.$res1['name'].'</div>
                                                <div style="font-size:18px">Thank You For Join With  orphanage.<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></div>
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Now You are volunteer of Orphanage.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center"></div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Kind regards<br><a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);text-decoration:inherit">Orphanage<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></a>
                                            </div>
                                        </div>
                                        <!-- <div style="text-align:left">
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
                                                <div style="direction:ltr">Copyright © 2021, Medical 24 Global S.L., <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">C/ San Jaime 49, 1 Santa Eulalia del Riu, Islas Baleares</a></div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>';
    send_mail($email,$subject,$message,$to,$full_name);

    echo "true";
    }
    else
    {
    echo "false";
    }
}
if($_REQUEST['action']=="contact")
{
   
     mysqli_query($con,"insert into ".TABLE_PREFIX."contact_master
            set
            name='".$_REQUEST['name']."',
            email='".$_REQUEST['email']."',
            phone_no='".$_REQUEST['phone']."',
            message='".$_REQUEST['message']."'

        ") or die(mysqli_error($con));
     echo "true";
}
if($_REQUEST['action']=="donate")
{
    if($_REQUEST['ceid']!=="" && $_REQUEST['place']!=="" )
    {
    mysqli_query($con,"insert into ".TABLE_PREFIX."donate_master
            set
            user_id='".$_SESSION[SESSION_PREFIX.'login-user-id']."',
            center_id='".$_REQUEST['ceid']."',
            place='".$_REQUEST['place']."'

        ") or die(mysqli_error($con));
    echo "true";
   }
   else
   {
    echo "false";
   }

}
if($_REQUEST['action'] == "changepass")
{
    $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
    $res1=mysqli_fetch_array($qry1);

     $cpass=base64_encode($_REQUEST['cpassword']);
     $pass=base64_encode($_REQUEST['rpassword']);
     // $cupass=base64_decode($res1['password']);

     if($cpass!== $res1['password'])
     {
        echo "mpass";
        exit;        
     }  
     if($_REQUEST['npassword'] !== $_REQUEST['rpassword'])
     {
        echo "rpass";
        exit;
     }
     else
     {
        mysqli_query($con,"update ".TABLE_PREFIX."user_master
            set
            password='".$pass."'
            where password='".$cpass."'
            and id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'

        ") or die(mysqli_error($con));
        echo "true";
     }
}

if($_REQUEST['action']=="reg")
 {
     $qry=mysqli_query($con,"select *from orphanage_user_master");
     while($res=mysqli_fetch_array($qry))
     {
     if($_REQUEST['username'] == $res['username'])
      {
        echo "username";
        exit();
      }       
     }

if($_REQUEST['re_password'] !== $_REQUEST['password'])
 {
    echo "rpass";
    exit();
 }
else if ($_REQUEST['agree-term'] == "")
 {
    echo "agree";
    exit(); 
 }
else if($_REQUEST['name'] !== "" && $_REQUEST['username'] !== "" && $_REQUEST['gender'] !== "" && $_REQUEST['mono'] !== "" && $_REQUEST['dob'] !== "" && $_REQUEST['country'] !== "" && $_REQUEST['region'] !== "" && $_REQUEST['city'] !== "" && $_REQUEST['email'] !== "" && $_REQUEST['password'] !== "" && $_REQUEST['re_password'] !== "" && $_REQUEST['address'] !== "" && $_REQUEST['img'] !== "" && $_REQUEST['agree-term'] !== "" )
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
       } 

        $qry1=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
    $res1=mysqli_fetch_array($qry1);

   $email=$res1['email'];
        $to="";
    $full_name="Orphanage";
    $subject="Thank you for Inquiry - Orphanage";
    $message='<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
        <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#023ea1">
                            <table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
                                <tbody>
                                    <tr>
                                        <td width="8" style="width:8px"></td>
                                        <td>
                                            <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
                                        </td>
                                        <td width="8" style="width:8px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
                                            <img src="http://jptv.epizy.com/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="Orphanage">
                                            <div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="font-size:24px">Dear , '.$res1['name'].'</div>
                                                <div style="font-size:18px">Thank You For Registration in orphanage.<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></div>
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Your Account is created successfully.</div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center"></div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Kind regards<br><a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);text-decoration:inherit">Orphanage<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></a>
                                            </div>
                                        </div>
                                        <!-- <div style="text-align:left">
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
                                                <div style="direction:ltr">Copyright © 2021, Medical 24 Global S.L., <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">C/ San Jaime 49, 1 Santa Eulalia del Riu, Islas Baleares</a></div>
                                            </div>
                                        </div> -->
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>';
    send_mail($email,$subject,$message,$to,$full_name);
       
      echo "true";
}
 }

if($_REQUEST['action']=="profile")
{


    
           $qry2=mysqli_query($con,"select *from orphanage_user_master where id !='".$_SESSION[SESSION_PREFIX.'login-user-id']."'");
            
            while($res3=mysqli_fetch_array($qry2))
            {
        
            if($_REQUEST['username'] == $res3['username'])
            {
                echo "username";
                exit();
            }

            }              
         if($_REQUEST['name']!=="" && $_REQUEST['username']!=="" && $_REQUEST['mo_no']!=="" && $_REQUEST['gender']!=="" && $_REQUEST['dob']!=="" && $_REQUEST['region']!=="" && $_REQUEST['city']!=="" && $_REQUEST['address']!=="" && $_REQUEST['email']!=="" )  
         {
   if($_FILES['img']['tmp_name']!="") {

        $image_name = date('Ymdhis') . $_FILES['img']["name"];

        move_uploaded_file($_FILES['img']["tmp_name"], $user_path . $image_name);
        mysqli_query($con, "update " . TABLE_PREFIX . "user_master
        set
            image='" .$image_name. "'
            where
            id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'    
        ");
    }

    mysqli_query($con,"update ".TABLE_PREFIX."user_master
            set
            name='".$_REQUEST['name']."',
            username='".$_REQUEST['username']."',
            gender='".$_REQUEST['gender']."',
            mo_no='".$_REQUEST['mo_no']."',
            dob='".$_REQUEST['dob']."',
            email='".$_REQUEST['email']."',
            country='".$_REQUEST['country']."',
            region='".$_REQUEST['region']."',
            city='".$_REQUEST['city']."',
            address='".$_REQUEST['address']."',
            user_update_datetime='".$datetime."'
            where id='".$_SESSION[SESSION_PREFIX.'login-user-id']."'
        ") or die(mysqli_error($con));
       echo "true";
    }
    else
    {
        echo "false";
    }
}

if($_REQUEST['action'] == "email")
{
    $qry=mysqli_query($con,"select * from email");
    while($res=mysqli_fetch_array($qry))
    {
        if($_REQUEST['EMAIL'] == $res['email'])
        {
            echo "yes";
            exit;
        }
    }

  if($_REQUEST['email'] !== "")
  {
    
       mysqli_query($con,"insert into email
            set
            email='".$_REQUEST['EMAIL']."'
            
            
        ") or die(mysqli_error($con));
    echo "true";
  }
  else
  {
    echo "false";
  }
}

function send_mail($email,$subject,$message,$to,$full_name)
    {
        //************Send mail process*************//  
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        
        $mail->Username = "orphanage.contact@gmail.com";
        $mail->Password = "321#Orphanage";
        $mail->From = $email;
        $mail->FromName = $full_name;
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AddAddress($email);
        //$mail->AddAddress("vetron.marketing@gmail.com");
        $mail->addReplyTo("orphanage.contact@gmail.com");
        /*$file_tmp  = $_FILES['recipient-resume']['tmp_name'];
        $file_name = $_FILES['recipient-resume']['name'];
        $mail->AddAttachment($file_tmp, $file_name);*/
         if(!$mail->Send()) {
            echo  $mail->ErrorInfo;
         } else {
            
            echo "Send mail successfully";
         }
    }
?>