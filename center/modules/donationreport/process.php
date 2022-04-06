<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST["action"]=="download")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='6'><h1 align='center'><font color='green'>DONATION REPORT</font></h1></td>
            </tr>";
            $datef= strtotime($_REQUEST["from"] );
            $datef= date('d-M-Y',$datef);
            $datet= strtotime($_REQUEST["to"] );
            $datet= date('d-M-Y',$datet); 
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$datef.' TO '.$datet;
                }
               
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                  $date='Date:'.$datef;
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                  $date='Date : '.date("d-M-Y");
                
                }
                
                $qry1=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$_REQUEST['centerid']."'");
                $res=mysqli_fetch_array($qry1);
                $name="Center Name : ".$_SESSION[SESSION_PREFIX.'login_center_name'];
              
                $output.="<tr><th colspan='6    ' align='right'>".$name."</th></tr>
                ";
             
                $output.="<tr><th colspan='6' align='right'>".$date."</th></tr>
                 ";

             $output.="
                  <tr>
                    <th>ID</th>
                    <th>AMOUNT</th>
                    <th>PAYMENT_METHOD</th>
                    <th>CENTER_NAME</th>
                    <th>USER_NAME</th>
                    <th>DATE</th>
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                  </tr>
             <tbody>";
              if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and center_id='".$_REQUEST['centerid']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']=="")
                {  
                   $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."' and center_id='".$_REQUEST['centerid']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             else if($_REQUEST['from']=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and center_id='".$_REQUEST['centerid']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                } 
             
               else 
                {
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".date('Y-m-d')."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             while($result_donation = mysqli_fetch_array($qry))
                {
                    $dater= strtotime($result_donation["date"] );
                      $dater = date('d-M-Y',$dater);
                     $output.=" <td>".$result_donation["id"]."</td>
                      <td>".$result_donation["amount"]."</td>
                      <td>"; 
                      if($result_donation["payment_method"]=="1")
                      {
                        $method = "ONLINE PAYMENT";
                      }
                      if($result_donation["payment_method"]=="2")
                      {
                        $method = "CHEQUE";
                      }
                      if($result_donation["payment_method"]=="3")
                      {
                        $method = "CASH";
                      }
                          $output.=$method.
                      "</td>";

                       $center=mysqli_query($con,"select center_name from ".TABLE_PREFIX."center_master where center_id='".$result_donation["center_id"]."'");

                       $center_detail= mysqli_fetch_array($center); 
                       

                      $output.="<td>".$center_detail["center_name"]."</td>
                      ";
                      


                              $user=mysqli_query($con,"select name from ".TABLE_PREFIX."user_master where id='".$result_donation["center_id"]."'");

                       $user_detail= mysqli_fetch_array($user); 
                      

                        $output.="<td>". $user_detail["name"].
                      "</td>";
                        
                       $output.="<td>".$dater."</td>
                    </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
             header("Content-Type: application/xls");
             header("Content-disposition:attachment; filename=report.xls");
}
if($_REQUEST["action"]=="preview")
{
  $output="<table border='2' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='7'><h1 align='center'><font color='green'>DONATION REPORT</font></h1></td>
            </tr>";
           $datef= strtotime($_REQUEST["from"] );
            $datef= date('d-M-Y',$datef);
            $datet= strtotime($_REQUEST["to"] );
            $datet= date('d-M-Y',$datet); 
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$datef.' TO '.$datet;
                }
               
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                  $date='Date:'.$datef;
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                  $date='Date : '.date("d-M-Y");            
                }
               
               $qry1=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$_REQUEST['centerid']."'");
                
                $res=mysqli_fetch_array($qry1);
                $name="Center Name : ".$_SESSION[SESSION_PREFIX.'login_center_name'];
                
                $output.="<tr><th colspan='7' align='right'>".$name."</th></tr>
                ";
                
                 $output.="<tr><th colspan='7' align='right'>".$date."</th></tr>
                ";
                  $output.="
                  <tr>
                    <th>ID</th>
                    <th>AMOUNT</th>
                    <th>PAYMENT_METHOD</th>
                    <th>CENTER_NAME</th>
                    <th>USER_NAME</th>
                    <th>DATE</th>
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                  </tr>
            
             <tbody>";
             

            if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and center_id='".$_REQUEST['centerid']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']=="")
                {  
                   $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."' and center_id='".$_REQUEST['centerid']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             else if($_REQUEST['from']=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and center_id='".$_REQUEST['centerid']."'  and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                } 
             
               else 
                {
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".date('Y-m-d')."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                } 
                
                while($result_donation = mysqli_fetch_array($qry))
                {
                    $dater= strtotime($result_donation["date"] );
                      $dater = date('d-M-Y',$dater);
                     $output.=" <td>".$result_donation["id"]."</td>
                      <td>".$result_donation["amount"]."</td>
                      <td>"; 
                      if($result_donation["payment_method"]=="1")
                      {
                        $method = "ONLINE PAYMENT";
                      }
                      if($result_donation["payment_method"]=="2")
                      {
                        $method = "CHEQUE";
                      }
                      if($result_donation["payment_method"]=="3")
                      {
                        $method = "CASH";
                      }
                          $output.=$method.
                      "</td>";

                       $center=mysqli_query($con,"select center_name from ".TABLE_PREFIX."center_master where center_id='".$result_donation["center_id"]."'");

                       $center_detail= mysqli_fetch_array($center); 
                       

                      $output.="<td>".$center_detail["center_name"]."</td>
                      ";
                      


                              $user=mysqli_query($con,"select name from ".TABLE_PREFIX."user_master where id='".$result_donation["center_id"]."'");

                       $user_detail= mysqli_fetch_array($user); 
                      

                        $output.="<td>". $user_detail["name"].
                      "</td>";
                        
                       $output.="<td>".$dater."</td>
                    </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
              ?>
              <link rel="stylesheet" type="text/css" href="print.css" media="print">
             <center>
                <button onclick="window.print();" id="print-btn">Print</button>
 
               
                <a href="<?php echo HTTP_BASE_URL;?>donationreport" align="center"><button align="center"  id="print-btn">Back</button></a></center>
        <?php
        }
?>
