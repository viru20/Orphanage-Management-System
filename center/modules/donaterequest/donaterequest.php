
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Donate Request</h1>
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

                 
                   <th>DONATE ID</th>
                    <th>USER NAME</th>
                    <th>PLACE</th>
                    <th>CENTER NAME</th>
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    <th width="10%">Status</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                   
                   <th>DONATE ID</th>
                    <th>USER NAME</th>
                    <th>PLACE</th>
                    <th>CENTER NAME</th>
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    
                    <th width="10%">Status</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry_donate = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."donate_master where center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and donate_is_deleted=0 and donate_status=0");

                  while($result_donate = mysqli_fetch_array($qry_donate))
                {
                    ?>
                    <tr>
                      <td><?php echo $result_donate["donate_id"];?></td>
                      <td>
                        <?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_user_master where id ='".$result_donate['user_id']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['name'];
                         ?>
                      </td>
                              <td><?php echo $result_donate["place"];?></td>
                      <td>
                        <?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_center_master where center_id ='".$result_donate['center_id']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['center_name'];
                         ?>
                      </td>
                     
                     
                      
                       <td align="center"><a href="<?php echo DONATEREQUEST;?>process.php?action=donate_status&id=<?php echo $result_donate["donate_id"];?>&value=<?php echo $result_donate["donate_status"];?>&cid=<?php echo $result_donate['CHILDREN_id'];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon(1);?>" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>donaterequest-edit-<?php echo
                      $result_donate['donate_id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo DONATEREQUEST;?>process.php?action=deleteapp&id=<?php echo $result_donate["donate_id"];?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>
                     
                     
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
<?php  }  ?>





<?php if($_REQUEST["action"]=="edit")
{
  
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."donate_master where donate_id='".$_REQUEST['donaterequestid']."'");
  $result_app=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo DONATEREQUEST;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>donaterequest">Donate Request</a>
            </li>
            <li class="active">
              <strong>Edit Record</strong>
            </li>
          </ol> 
        </header>
      
        <div class="content-body">
          <div class="row">
           
          </div>
             
            <div class="col-md-12"> 
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Place</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                   <input class="form-control" name="place" id="place" type="text" value="<?php echo $result_app['place']; ?>" required>
               </div>
             </div>          
            </div>

            <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="editapp">
                 <input type="hidden" name="id" value="<?php echo $_REQUEST['donaterequestid']; ?>">
                  <button type="submit" class="btn btn-blue  pull-center">Update</button>
                 <a href="<?php echo HTTP_BASE_URL;?>donaterequest"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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