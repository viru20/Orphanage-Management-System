
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Adopt Report</h1>
        </div>                           
        
        
     <?php 
    if($_REQUEST["action"]=="")
    {
      ?>
      <div class="col-lg-12">
       <?php 
       if(isset($_SESSION["app_alert_message"]))
       {
        ?>
        <div class="state iradio_square-green checked" style="color:green;"> <i class="fa fa-arrow-circle-right"></i><?php echo $_SESSION["app_alert_message"]; ?></div>

        <?php
        unset($_SESSION["app_alert_message"]);
       }
         
      ?>
     <section class="box ">
      <header class="panel_header">
        <h2 class="title pull-left">
          <form action="" Method="POST">
            <div class="row">
              <div class="col-md-12">
           <div class="col-md-3">
           <input type="date" name="from" id="from" class="form-control" style="height:40px;">
           </div>
           <div class="col-md-3">
           <input type="date" name="to" id="to" class="form-control" style="height:40px;">
         </div>
           <div class="col-md-3">
           <select name="centerid" id="centerid" class="form-control" style="height:40px;">
           <option value="">Select center</option>
           <?php
          $qry=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master");
          while($result_c=mysqli_fetch_array($qry))
          {
          ?>
          <option value="<?php echo $result_c['center_id'];?>"><?php echo $result_c['center_name'];?></option>
          <?php
          }
           ?>
           </select>
         </div>
         <div class="col-md-3">
           <input type="submit" class="btn btn-successfull" name="genrate" id="genrate" value="Submit">
         </div>
         </div>
       </div>
          </form>       
        </h2> 
       <h4 class="title pull-center">
               
      </h4>                                
      </header>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
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
                <tfoot>
                  <tr>
                    <th>Adopt Id</th>
                    <th>Center Name</th>
                    <th>User Name</th>
                    <th>Children Name</th>
                    <th>Job</th>
                    <th>Salary</th>
                    <th>Date </th>
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE = '".date("Y-m-d")."'");
        if(isset($_REQUEST['genrate']))
        {
          // echo "select * from ".TABLE_PREFIX."adopt_master where ADOPT_IS_DELETED=0 and ADOPT_STATUS=1  and DATE BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."'";
                  
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
                ?>
                
                <h2 class="title pull-right">
                <a href="<?php echo ADOPTREPORT;?>process.php?action=download&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>&centerid=<?php echo $_REQUEST['centerid'];?>"onclick="return confirm('Are you sure?\n\nDo you want to download this?')"><img src="<?php echo MEDIA;?>images/download.png" width="32" height="32" border="0" />&nbsp;&nbsp;Download</a>|
                <a href="<?php echo ADOPTREPORT;?>process.php?action=preview&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>&centerid=<?php echo $_REQUEST['centerid'];?>"><img src="<?php echo MEDIA;?>images/view.png" width="32" height="32" border="0" />&nbsp;&nbsp;Preview</a>
        
      </h2>                                
      </header>
      <?php
        }
                while($result_user = mysqli_fetch_array($qry))
                {
                    ?>
                    
                      <td><?php echo $result_user["ADOPT_ID"];?></td>
                      <td><?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_center_master where center_id ='".$result_user['CENTER_ID']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['center_name'];
                          ?>    
                      </td>

                      
                      <td><?php 
                          $uqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."user_master where id ='".$result_user['USER_ID']."'");
                          $uresult = mysqli_fetch_array($uqry);
                          echo $uresult['username'];
                          ?>
                      </td>
                      <td><?php 
                          $cqry = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."children_master where children_id ='".$result_user['CHILDREN_ID']."'");
                          $cresult = mysqli_fetch_array($cqry);
                          echo $cresult['children_name'];
                          ?></td>
                      <td><?php echo $result_user["JOB"];?></td>

                      <td><?php echo $result_user["SALARY"];?></td>

                      <td><?php  $date= strtotime($result_user["DATE"] );
                      $date = date('d-M-Y',$date); 
                      echo $date;?></td>
                    </tr>                          
                    <?php   
                }            
                
                ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </section>

</div>               
<?php } ?>

<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->

<!-- CORE JS FRAMEWORK - START --> 
<script src="assets/js/jquery-1.11.2.min.js" type="text/javascript"></script> 
<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
<script src="assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
<!-- CORE JS FRAMEWORK - END --> 


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="assets/plugins/count-to/countto.js" type="text/javascript"></script> 


<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 


<!--TABLE JS --> 
<script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>