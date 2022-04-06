<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST["action"]=="download")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='7'><h1 align='center'><font color='green'>CHILDREN DETAILS</font></h1></td>
            </tr><tr>";
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$_REQUEST['from'].' TO '.$_REQUEST['to'].'<br/>Center:'.$_REQUEST['ceid'];
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
                 $name='Name: '.$_SESSION[SESSION_PREFIX.'login-center-Name'];
                $output.="<th colspan='7' align='center'>".$name."</th></tr>
                ";

             $output.="<thead>
                  <tr>
                   <th>ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>CENTER</th>
                    <th>DOB</th>
                    <th>AGE</th>
                    <th>BLOOD GROUP</th>
                  </tr>
             </thead>
             <tbody>";
            
                 if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                {
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where children_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where children_is_deleted=0 and date='".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where 
                  date='".date("d/m/Y")."'  and children_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             while($result_user = mysqli_fetch_array($qry))
                {
             $output.="<td>".$result_user['children_id']."</td>
                    
                      <td>".$result_user['children_name']."</td>";
                      if($result_user['children_gender']=="1")
                      {
                        $gender="Male";
                      }
                      else if($result_user['children_gender']=="2")
                      {
                        $gender="Female";
                      }
                      $output.="<td>".$gender."</td>";
                       
                      $qry_center=mysqli_query($con,"select center_id,center_name from ".TABLE_PREFIX."center_master where center_status=1 and center_is_deleted=0 and center_id='".$result_user['center_id']."'");
                        while($qry_result=mysqli_fetch_array($qry_center))
                        {
                      $output.="<td>".$qry_result['center_name']."</td>";
                        }
                       $output.="<td>".$result_user['children_dob']."</td>
                      <td>".$result_user['children_age']."</td>
                      <td>".$result_user['children_bloodgroup']."
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
            <td colspan='7'><h1 align='center'><font color='green'>CHILDREN DETAILS</font></h1></td>
            </tr>";
           
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" )
                {  
                 $date='Date:'.$_REQUEST['from'].' TO '.$_REQUEST['to'].'<br/>Center:'.$_REQUEST['ceid'];
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
                 $name='Name: '.$_SESSION[SESSION_PREFIX.'login-center-Name'];
                $output.="<th colspan='7' align='center'>".$name."</th></tr>
                ";

                  $output.="<tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>CENTER</th>
                    <th>DOB</th>
                    <th>AGE</th>
                    <th>BLOOD GROUP</th>
                  </tr>
             <tbody>";
             if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                {
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where children_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" )
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where children_is_deleted=0 and date='".$_REQUEST['from']."' and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
                
                 else if($_REQUEST['from']=="" && $_REQUEST['to']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where 
                  date='".date("d/m/Y")."'  and children_is_deleted=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
                }
             while($result_user = mysqli_fetch_array($qry))
                {
             $output.="<tr><td>".$result_user['children_id']."</td>
                    
                      <td>".$result_user['children_name']."</td>";
                      if($_result_user['children_gender']=="1")
                      {
                        $gender="Male";
                      }
                      else if($_result_user['children_gender']=="2")
                      {
                        $gender="Female";
                      }
                      $output.="
                      <td>".$gender."</td>";
                      $qry_center=mysqli_query($con,"select center_id,center_name from ".TABLE_PREFIX."center_master where center_status=1 and center_is_deleted=0 and center_id='".$result_user['center_id']."'");
                        while($qry_result=mysqli_fetch_array($qry_center))
                        {
                      $output.="<td>".$qry_result['center_name']."</td>";
                        }
                       $output.="<td>".$result_user['children_dob']."</td>
                      <td>".$result_user['children_age']."</td>
                      <td>".$result_user['children_bloodgroup']."</td>
                      </tr>"; 
                   } 
              $output.='</tbody></table>';
              echo "$output";
?>
              <a href="<?php echo HTTP_BASE_URL;?>creport" align="center"><button align="center">Back</button></a>
        <?php
        }
?>
