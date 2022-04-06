
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Donate Detail</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          <?php
          $active=0; 
         
            $active=active_count(TABLE_PREFIX."donate_master","donate_status","donate_is_deleted");
          ?>

          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-4">
            <div class="tile-counter bg-purple">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $active; ?>">0</h2>
                <div class="clearfix"></div>
                <span>Active</span>
              </div>
            </div>

          </div>

          <?php 
            $inactive=inactive_count(TABLE_PREFIX."donate_master","donate_status","donate_is_deleted");
          
          ?>

          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-4">
            <div class="tile-counter bg-orange">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $inactive; ?>">0</h2>
                <div class="clearfix"></div>
                <span>Inactive</span>
              </div>
            </div>

          </div>

          <?php 
          
            $deleted=deleted_count(TABLE_PREFIX."donate_master","donate_is_deleted");
          ?>
          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-4">
            <div class="tile-counter bg-warning">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $deleted; ?>">0</h2>
                <div class="clearfix"></div>
                <span>Deleted</span>
              </div>
            </div>

          </div>
          <?php 
          $total=0;
          $total= $active+$inactive+$deleted;
          ?>

          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-4">
            <div class="tile-counter bg-primary">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $total; ?>">0</h2>
                <div class="clearfix"></div>
                <span>Total</span>
              </div>
            </div>

          </div>
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
                    
                    
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry_donate = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."donate_master where donate_is_deleted=0");
                
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