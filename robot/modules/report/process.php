<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST["action"]=="download")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='8'><h1 align='center'><font color='green'>USER DETAILS</font></h1></td>
            </tr>
            <tr>";
           $date=date("d-M-Y");
            $datef= strtotime($_REQUEST["from"] );
            $datef= date('d-M-Y',$datef);
            $datet= strtotime($_REQUEST["to"] );
            $datet= date('d-M-Y',$datet);
            if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                { 
                 $date=$datef.' TO '.$datet;
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="")
                { 
                 $date=$datef;
                }
   $output.="<th colspan='8' align='right'>Date:".$date."</th>
            </tr>
             <thead>
                  <tr>
                     <th>USER ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>MOBILE_NO</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>DATE</th>
                    <th>UPADATED DATE</th>
                  </tr>
             </thead>
             <tbody>";
              $qry= mysqli_query($con,"select *from orphanage_user_master where user_is_delete=0 and date='".date("y/m/d")."'");
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date ='".$_REQUEST['from']."'");
                }
             while($result_user = mysqli_fetch_array($qry))
                {
             $output.="<td>".$result_user['id']."</td>
                      <td>".$result_user['name']."</td>";
                      if($result_user['gender']=="1")
                      {
                        $gender="Male";
                      }
                      else if($result_user['gender']=="2")
                      {
                        $gender="Female";
                      }
                      $dated= strtotime($result_user['datetime']);
                      $dated= date('d-M-Y',$dated);
                      $dateu= strtotime($result_user['user_update_datetime']);
                      $dateu= date('d-M-Y',$dateu);
                      $output.="<td>".$gender."</td>";
                      $output.="<td>".$result_user['mo_no']."</td>
                      <td>".$result_user['dob']."</td>
                      <td>".$result_user['address']."</td>
                      <td>".$dated."</td>
                      <td>".$dateu."</td>
                    </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
             header("Content-Type: application/xls");
             header("Content-disposition:attachment; filename=report.xls");
}
if($_REQUEST["action"]=="preview")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='8'><h1 align='center'><font color='green'>USER DETAILS</font></h1></td>
            </tr>
            <tr>";
            $date=date("d-M-Y");
            $datef= strtotime($_REQUEST["from"] );
            $datef= date('d-M-Y',$datef);
            $datet= strtotime($_REQUEST["to"] );
            $datet= date('d-M-Y',$datet);
            if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                { 
                 $date=$datef.' TO '.$datet;
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="")
                { 
                 $date=$datef;
                }
   $output.="<th colspan='8'>Date:".$date."</th>
            </tr>
             
                  <tr>
                     <th>USER ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>MOBILE_NO</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>DATE</th>
                    <th>UPADATED DATE</th>
                  </tr>
             
             <tbody>";
             $qry= mysqli_query($con,"select *from orphanage_user_master where user_is_delete=0 and date='".date("y/m/d")."'");
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date ='".$_REQUEST['from']."'");
                }

             while($result_user = mysqli_fetch_array($qry))
                {
             $output.="<td>".$result_user['id']."</td>
                      <td>".$result_user['name']."</td>";
                      if($result_user['gender']=="1")
                      {
                        $gender="Male";
                      }
                      else if($result_user['gender']=="2")
                      {
                        $gender="Female";
                      }
                      $dated= strtotime($result_user['datetime']);
                      $dated= date('d-M-Y',$dated);
                      $dateu= strtotime($result_user['user_update_datetime']);
                      $dateu= date('d-M-Y',$dateu);
                      $output.="<td>".$gender."</td>";
                      $output.="<td>".$result_user['mo_no']."</td>
                      <td>".$result_user['dob']."</td>
                      <td>".$result_user['address']."</td>
                      <td>".$dated."</td>
                      <td>".$dateu."</td>
                    </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
              ?>
              <br/>
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
              <center>
                <button onclick="window.print();" id="print-btn">Print</button>
 
               
                <a href="<?php echo HTTP_BASE_URL;?>report" align="center"><button align="center"  id="print-btn">Back</button></a></center>
        <?php
        }
?>
