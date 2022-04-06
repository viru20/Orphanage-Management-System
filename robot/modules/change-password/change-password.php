<section id="" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 190px;'>
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">
                            <div class="pull-left" >
                                <h1 class="title">Change Password</h1> 
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
                            if(isset($_SESSION["password_message"]))
                            {
                                ?>
                                 <div class="state iradio_square-green checked" style="color:green;"><?php echo $_SESSION["password_message"]; ?></div> 

                                <?php
                                unset($_SESSION["password_message"]);
                            }
                            ?>
                            <?php 
                            if(isset($_SESSION["password_alert_message"]))
                            {
                                ?>
                                 <div class="state iradio_square-red checked" style="color:red;"><?php echo $_SESSION["password_alert_message"]; ?></div> 

                                <?php
                                unset($_SESSION["password_alert_message"]);
                            }
                            ?>
              <section class="box ">
                <header class="panel_header">
                <h2 class="title pull-left"></h2>
                  <!-- <h2 class="title pull-right"><a href="<?php echo HTTP_BASE_URL;?>portal-add"><img src="<?php echo MEDIA;?>images/add.png" width="16" height="16" border="0" />&nbsp;&nbsp;Add Record</a></h2>                                -->
                </header>
                
                <form method="post" action="<?php echo CHANGE_PASSWORD;?>process.php" name="portal-form">
                  <div class="content-body">
                    <div class="row">
                      <div class="col-md-8 col-sm-9 col-xs-10">             
                        <div class="form-group">
                          <label class="form-label" for="field-1">Old Password</label>
                          <!-- <span class="desc">e.g. "Apparel, Footwear, Electronics etc."</span> -->
                          <div class="controls">
                             <input type="password" class="form-control" name="oldpass" id="oldpass" >
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="form-label" for="field-1">New Password</label>
                          <!-- <span class="desc">e.g. "Ap, FW, Elec etc."</span> -->
                          <div class="controls">
                             <input type="password" class="form-control" name="newpass" id="newpass" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label" for="field-1">Confirm Password</label>
                          <!-- <span class="desc">e.g. "Ap, FW, Elec etc."</span> -->
                          <div class="controls">
                             <input type="password" class="form-control" name="cnfpass" id="cnfpass" >
                          </div>
                        </div>
                        <div class="form-group"> 
                             <input type="hidden" name="action" id="action" value="changepassword">
                              <button type="submit" class="btn btn-blue  pull-center">Change Password</button>
                              <a href="<?php echo HTTP_BASE_URL;?>"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
                        </div>  
                      </div>
                    </div>
                  </div>
                </form>
              </section>
            </div>                
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