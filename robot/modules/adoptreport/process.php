<style >
  .table
  {
    margin-top: 40px;
    border:1px solid black;
    width:90%;
  }
</style>
<?php
session_start();
require_once("../../secure/config.php");
require_once("../../secure/function.php");
if($_REQUEST["action"]=="download")
{
   $output="<table border='1' align='center' widht='100%'>
            <tr rowspan='2'>
            <td colspan='7'><h1 align='center'><font color='green'> Adopt Report</font></h1></td>
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
                  $date=date("d-M-Y");
                
                }
                
                $qry1=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$_REQUEST['centerid']."'");
                
                $res=mysqli_fetch_array($qry1);
                $name="Center Name: ".$res['center_name'];
                if($_REQUEST['centerid'] !=="")
                { 
                $output.="<tr><th colspan='7' align='right'>".$name."</th></tr>
                ";
                }
                $output.="<tr><th colspan='7' align='right'>".$date."</th></tr>
                ";
              

             $output.="<thead>
                  <tr>
                    <th>Adopt Id</th>
                    <th>Center Name</th>
                    <th>User Name</th>
                    <th>Children Name</th>
                    <th>Job</th>
                    <th>Salary</th>
                    <th>Date </th>
                  </tr>
                </thead>
             <tbody>";
            
                 if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and CENTER_ID='".$_REQUEST['centerid']."'");
                }

                else if($_REQUEST['from'] !=="" && $_REQUEST['to'] !=="" && $_REQUEST['centerid'] == "" )
                {  
                
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."'");
                }

                else if($_REQUEST['from'] !=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] == "")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0  and DATE='".$_REQUEST['from']."' and ADOPT_STATUS=1");
                }
               else if($_REQUEST['from'] !=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] !=="")
                {  
                 
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE = '".$_REQUEST['from']."' and CENTER_ID='".$_REQUEST['centerid']."'");
                }
                else if($_REQUEST['from']=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] !=="")
                {  
                 
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1 and CENTER_ID='".$_REQUEST['centerid']."'");
                }
               else
               {
                $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE = '".date("Y-m-d")."'");
               }
              while($result_user = mysqli_fetch_array($qry))
                {
                    
                      $dater= strtotime($result_user["DATE"] );
                      $dater = date('d-M-Y',$dater); 
                      
                      $output.='<td>'.$result_user["ADOPT_ID"].'</td>
                      <td>'; 
                          $qry = mysqli_query($con,"SELECT * from orphanage_center_master where center_id ='".$result_user['CENTER_ID']."'");
                          $result = mysqli_fetch_array($qry);
                        $output.=$result['center_name']."
                              
                      </td>

                      
                      <td>";
                          $uqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."user_master where id ='".$result_user['USER_ID']."'");
                          $uresult = mysqli_fetch_array($uqry);
                           $output.=$uresult['username'].
                      "</td>
                      <td>"; 
                          $cqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."children_master where children_id ='".$result_user['CHILDREN_ID']."'");
                          $cresult = mysqli_fetch_array($cqry);
                          $output.= $cresult['children_name'].'
                          </td>
                      <td>'.$result_user["JOB"].'</td>

                      <td>'.$result_user["SALARY"].'</td>

                      <td>'.$dater.'</td>
                    </tr>';
                  }           
              $output.='</tbody></table>';
              echo "$output";
             header("Content-Type: application/xls");
             header("Content-disposition:attachment; filename=report.xls");
}
if($_REQUEST["action"]=="preview")
{
  $output="<table border='1' align='center' widht='100%' class='table'>
            <tr rowspan='2'>
            <td colspan='7'><h1 align='center'><font color='green'> Adopt Report</font></h1></td>
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
                  $date=date("d-M-Y");
                
                }
               
                $qry1=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$_REQUEST['centerid']."'");
                $res=mysqli_fetch_array($qry1);
                 $name="Name: ".$res['center_name'];
                 if($_REQUEST['centerid'] !=="")
                { 
                $output.="<tr><th colspan='7' align='right'>".$name."</th></tr>
                ";
                }
                 $output.="<tr><th colspan='7' align='right'>".$date."</th></tr>
              ";

             $output.="
                  <tr>
                    <th>Adopt Id</th>
                    <th>Center Name</th>
                    <th>User Name</th>
                    <th>Children Name</th>
                    <th>Job</th>
                    <th>Salary</th>
                    <th>Date </th>
                  </tr>
                
             <tbody>";
            
                 if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and CENTER_ID='".$_REQUEST['centerid']."'");
                }

                else if($_REQUEST['from'] !=="" && $_REQUEST['to'] !=="" && $_REQUEST['centerid'] == "" )
                {  
                
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."'");
                }

                else if($_REQUEST['from'] !=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] == "")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0  and DATE='".$_REQUEST['from']."' and ADOPT_STATUS=1");
                }
               else if($_REQUEST['from'] !=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] !=="")
                {  
                 
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE = '".$_REQUEST['from']."' and CENTER_ID='".$_REQUEST['centerid']."'");
                }
                else if($_REQUEST['from']=="" && $_REQUEST['to'] =="" && $_REQUEST['centerid'] !=="")
                {  
                 
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1 and CENTER_ID='".$_REQUEST['centerid']."'");
                }
               else
               {
                $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE = '".date("Y-m-d")."'");
               }
              while($result_user = mysqli_fetch_array($qry))
                {
                    
                       
                      
                      $output.='<td>'.$result_user["ADOPT_ID"].'</td>
                      <td>'; 
                          $qry = mysqli_query($con,"SELECT * from orphanage_center_master where center_id ='".$result_user['CENTER_ID']."'");
                        $result = mysqli_fetch_array($qry);
                        $output.=$result['center_name']."
                              
                      </td>

                      
                      <td>";
                          $uqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."user_master where id ='".$result_user['USER_ID']."'");
                          $uresult = mysqli_fetch_array($uqry);
                           $output.=$uresult['username'].
                      "</td>
                      <td>"; 
                          $cqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."children_master where children_id ='".$result_user['CHILDREN_ID']."'");
                          $cresult = mysqli_fetch_array($cqry);
                $dater= strtotime($result_user["DATE"] );
                $dater= date('d-M-Y',$dater);

                          $output.= $cresult['children_name'].'
                          </td>
                      <td>'.$result_user["JOB"].'</td>

                      <td>'.$result_user["SALARY"].'</td>

                      <td>'.$dater.'</td>
                    </tr>';
                  }           
              $output.='</tbody></table>';
              echo "$output";
?>
<br/>
               <link rel="stylesheet" type="text/css" href="print.css" media="print">
             <center>
                <button onclick="window.print();" id="print-btn">Print</button>
 
               
                <a href="<?php echo HTTP_BASE_URL;?>adoptreport" align="center"><button align="center"  id="print-btn">Back</button></a></center>
        <?php
        }
?>
