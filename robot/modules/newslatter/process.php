 <?php
 session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
require("./src/class.phpmailer.php");
require("./src/PHPMailerAutoload.php");
require("./src/SMTP.php");
 if($_REQUEST['action']=="send")
  {
    $qry=mysqli_query($con,"select * from orphanage_center_master");
    $email=$res1['email'];
    $to="";
    $full_name="Orphanage";
    $subject=$_REQUEST['subject'];
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
                                                <div style="font-size:24px"></div>
                                                <div style="font-size:18px"><span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;"></span></div>
                                            </div>
                                            <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">'.$_REQUEST['msg'].'</div>
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
        
       while($res=mysqli_fetch_array($qry))
          {
            $mail->AddAddress($res['email']);
          }


        
        $mail->addReplyTo("orphanage.contact@gmail.com");
        /*$file_tmp  = $_FILES['recipient-resume']['tmp_name'];
        $file_name = $_FILES['recipient-resume']['name'];
        $mail->AddAttachment($file_tmp, $file_name);*/
         if(!$mail->Send()) {
            echo  $mail->ErrorInfo;
         } else {
            
            echo "Send mail successfully";
         }

          $_SESSION["app_alert_message"]="Send Mail successfully.";
  
          header("location:".HTTP_BASE_URL."newslatter");
  }
  ?>