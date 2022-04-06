
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Donation Report</h1>
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
            <!-- <form method="post" action=""> -->
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
               <thead>
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
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>AMOUNT</th>
                    <th>PAYMENT_METHOD</th>
                    <th>CENTER_NAME</th>
                    <th>USER_NAME</th>
                    <th>DATE</th>
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
          
                 </tr>
               </tfoot>
               <tbody>
                <?php
}
				
        $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date ='".date('Y-m-d')."'");


				if(isset($_REQUEST['genrate']))
          {
                
           if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' and center_id='".$_REQUEST['centerid']."'");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']!=="" && $_REQUEST['centerid']=="")
                {  
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
            else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']=="")
                {  
                   $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."'");
                }
             else if($_REQUEST['from']!=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and date = '".$_REQUEST['from']."' and center_id='".$_REQUEST['centerid']."' ");
                }
             else if($_REQUEST['from']=="" && $_REQUEST['to']=="" && $_REQUEST['centerid']!=="")
                {  
                  
                  $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and payment_status=1 and center_id='".$_REQUEST['centerid']."' ");
                } 
             
               else 
                {
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and donation_status=1 and date = '".date('Y-m-d')."'");
                } 
                }
                ?>
                
                <h2 class="title pull-right">
                <a href="<?php echo DONATIONREPORT;?>process.php?action=download&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>&centerid=<?php echo $_REQUEST['centerid'];?>"onclick="return confirm('Are you sure?\n\nDo you want to download this?')"><img src="<?php echo MEDIA;?>images/download.png" width="32" height="32" border="0" />&nbsp;&nbsp;Download</a>|
                <a href="<?php echo DONATIONREPORT;?>process.php?action=preview&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>&centerid=<?php echo $_REQUEST['centerid'];?>"><img src="<?php echo MEDIA;?>images/view.png" width="32" height="32" border="0" />&nbsp;&nbsp;Preview</a>
      </h2>                                
      </header>
      <?php
                while($result_donation = mysqli_fetch_array($qry))
                {
                    ?>
                    
                      <td><?php echo $result_donation["id"];?></td>
                      <td><?php echo $result_donation["amount"];?></td>
                      <td><?php  
                      if($result_donation["payment_method"]=="1")
                      {
                        echo "ONLINE PAYMENT";
                      }
                      if($result_donation["payment_method"]=="2")
                      {
                        echo "CHEQUE";
                      }
                      if($result_donation["payment_method"]=="3")
                      {
                        echo "CASH";
                      }
                      ?></td>
                      
                         <td><?php 
                      
                              $center=mysqli_query($con,"select center_name from ".TABLE_PREFIX."center_master where center_id='".$result_donation["center_id"]."'");

                       $center_detail= mysqli_fetch_array($center); 
                       echo $center_detail["center_name"];
                       ?>
                      </td>
                      
                       <td><?php 
                      
                              $user=mysqli_query($con,"select name from ".TABLE_PREFIX."user_master where id='".$result_donation["center_id"]."'");

                       $user_detail= mysqli_fetch_array($user); 
                       echo $user_detail["name"];
                       ?>
                      </td>
                     <td><?php $date= strtotime($result_donation["date"] );
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
<?php

?>
</div>               


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