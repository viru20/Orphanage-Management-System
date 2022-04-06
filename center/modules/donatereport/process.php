<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST["action"]=="download")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='7'><h1 align='center'><font color='green'>DONATE REPORT</font></h1></td>
            </tr><tr>";
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$_REQUEST['from'].' TO '.$_REQUEST['to'];
                }
               
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                  $date='Date:'.$_REQUEST['from'];
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                  $date=date("d/m/Y");
                
                }
                
                $output.="<th colspan='7' align='center'>".$date."</th></tr>
                <tr> ";
                 $name="Name: ".$_SESSION[SESSION_PREFIX.'login_center_name'];
                $output.="<th colspan='7' align='center'>".$name."</th></tr>
                ";

             $output.="<thead>
                  <tr>
                   <th>DONATE ID</th>
                    <th>USER NAME</th>
                    <th>PLACE</th>
                    <th>CENTER NAME</th>
                    <th>DATE</th>
                  </tr>
             </thead>
             <tbody>";
              $qry= mysqli_query($con,"select *from ".TABLE_PREFIX."donate_master where donate_is_deleted=0 and date='".date("y/m/d")."'");

                 if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                {
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where donate_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where donate_is_deleted=0 and date='".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where date='".date("d/m/Y")."'  and donate_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             while($result_user = mysqli_fetch_array($qry))
                {
                      $output.="<td>".$result_user['donate_id'].

                      "</td>
                      <td>"; 
                          $uqry = mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id ='".$result_user['user_id']."'");
                          $uresult = mysqli_fetch_array($uqry);
                          $output.=$uresult['username'].
                      "</td>";
                      
                      
                      $output.="<td>".$result_user['place']."</td>
                      <td>";
                      $center=mysqli_query($con,"select * from ".TABLE_PREFIX."center_master where center_id='".$result_user["center_id"]."'");
                      $center_detail= mysqli_fetch_array($center); 
                      $output.=$center_detail["center_name"].
                      "</td>";
                        
                      $output.="<td>".$result_user['date']."</td>
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
            <td colspan='7'><h1 align='center'><font color='green'>DONATE REPORT</font></h1></td>
            </tr><tr>";
           
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$_REQUEST['from'].' TO '.$_REQUEST['to'];
                }
               
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                  $date='Date:'.$_REQUEST['from'];
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                  $date=date("d/m/Y");
                
                }
                $output.="<th colspan='7' align='center'>".$date."</th></tr>
                <tr>";
                 $name="Name: ".$_SESSION[SESSION_PREFIX.'login_center_name'];
                $output.="<th colspan='7' align='center'>".$name."</th></tr>
                ";

                  $output.="<tr>
                    <th>DONATE ID</th>
                    <th>USER NAME</th>
                    <th>PLACE</th>
                    <th>CENTER NAME</th>
                    <th>DATE</th>
                  </tr>
             <tbody>";
             

             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                {
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where donate_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where donate_is_deleted=0 and date='".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where date='".date("d/m/Y")."'  and donate_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
                
                while($result_user = mysqli_fetch_array($qry))
                {
                    
                      $output.="<tr><td>".$result_user['donate_id'].
                      "</td>
                      <td>"; 
                          $uqry = mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id ='".$result_user['user_id']."'");
                          $uresult = mysqli_fetch_array($uqry);
                          $output.=$uresult['username'].
                      "</td>";
                      $output.="<td>".$result_user['place']."</td>
                      <td>";
                      $center=mysqli_query($con,"select * from ".TABLE_PREFIX."center_master where center_id='".$result_user["center_id"]."'");
                      $center_detail= mysqli_fetch_array($center); 
                       $output.=$center_detail["center_name"].
                      "</td>";
                        
                       $output.="<td>".$result_user['date']."</td>
                    </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
              ?>
              <link rel="stylesheet" type="text/css" href="print.css" media="print">
             <center>
                <button onclick="window.print();" id="print-btn">Print</button>
 
               
                <a href="<?php echo HTTP_BASE_URL;?>donatereport" align="center"><button align="center"  id="print-btn">Back</button></a></center>
        <?php
        }
?>
