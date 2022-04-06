
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Donation Request</h1>
        </div>                           
        
        
        <div class="clearfix"></div>

        
      </div>
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
        <h2 class="title pull-right">
         
         

        </h2> 
                                   
      </header>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                  	<th>AMOUNT</th>
                    <th>PAYMENT_METHOD</th>
                    <th>CENTER_NAME</th>
                    <th>USER_NAME</th>
                    <th>DATE</th>
                    <th width="10%">Confirm</th>
                    <th  width="10%">Edit</th>
                    <th  width="10%">Delete</th>
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
                    <th width="10%">Confirm</th>
                    <th  width="10%">Edit</th>
                    <th  width="10%">Delete</th>
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where payment_is_delete=0 and center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and payment_status=0");
                 
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
                      
                              $user=mysqli_query($con,"select name from ".TABLE_PREFIX."user_master where id='".$result_donation["user_id"]."'");
                       
                       $user_detail= mysqli_fetch_array($user); 
                       ?>
                      <?php echo $user_detail["name"]; ?>
                       
                      </td>
                     <td><?php echo $result_donation["datetime"];?></td>
                     
                     <td align="center"><a href="<?php echo DONATIONREQUEST;?>process.php?action=payment_status&id=<?php echo $result_donation["id"];?>&value=<?php echo $result_donation["payment_status"];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon(1);?>" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>donationrequest-edit-<?php echo $result_donation['id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo DONATIONREQUEST;?>process.php?action=delete&id=<?php echo $result_donation["id"];?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>

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

<?php if($_REQUEST["action"]=="edit")
{
	/*echo "select * from ".TABLE_PREFIX."donation_master where id='".$_REQUEST['rquestid']."'";*/

  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."donation_master where id='".$_REQUEST['rquestid']."'");
  $result_req=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo DONATIONREQUEST;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>donationrequest">Donation Request</a>
            </li>
            <li class="active">
              <strong>Edit Record</strong>
            </li>
          </ol> 
        </header>

 <div class="content-body">
          <div class="row">
            <div class="col-md-12">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>amount</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="amount" id="amount"  rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_req['amount']; ?>">
                </div>
             </div>      
            </div>
             
             <div class="col-md-12">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Payment Method</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="pmtd" id="pmtd">
                      <option value="1"<?php if($result_req['payment_method']=="1"){ echo "selected";} ?>>Online Payment</option>
                      <option value="2"<?php if($result_req['payment_method']=="2"){ echo "selected";} ?>>Cheque</option>
                      <option value="3"<?php if($result_req['payment_method']=="3"){ echo "selected";} ?>>Cash</option>
                      
                    </select>
                </div>
              </div>
            </div>

            
           
                        <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="edituser">
                 <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['rquestid']; ?>">
                 <input type="submit" name="submit" value="Update" class="btn btn-blue  pull-center">
                 <a href="<?php echo HTTP_BASE_URL;?>donationrequest"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>  

            </div>
        </div>
 
      </section>
    </div> 
</form>      
      
<?php } ?>  


</section>
</section>

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