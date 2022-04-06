<link rel="stylesheet" href="<?php echo MEDIA;?>css/summernote.css">
<script type="text/javascript" src="<?php echo MEDIA;?>js/summernote.js"></script>
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Manage Application</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          <?php
          $active=0; 
         
            $active=active_count(TABLE_PREFIX."package_msater","package_status","package_is_deleted");
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
            $inactive=inactive_count(TABLE_PREFIX."package_msater","package_status","package_is_deleted");
          
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
          
            $deleted=deleted_count(TABLE_PREFIX."package_msater","package_is_deleted");
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
         
            <a href="<?php echo HTTP_BASE_URL;?>manage_app-add"><img src="<?php echo MEDIA;?>images/add.png" width="16" height="16" border="0" />&nbsp;&nbsp;Add Record</a>

        </h2> 
                                      
      </header>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>

                  	<th>Logo</th>
                    <th>Developer Name</th>
                    <th>Name</th>
                    <th>Package Name</th>
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    <th width="10%">Status</th>
                    <th  width="10%">Edit</th>
                    <th  width="10%">Delete</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th>Logo</th>
                    <th>Developer Name</th>
                    <th>Name</th>
                    <th>Package Name</th>
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    <th width="10%">Status</th>
                    <th  width="10%">Edit</th>
                    <th  width="10%">Delete</th>
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry_manage_app = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."package_msater where package_is_deleted=0");
                
                while($result_manage_app = mysqli_fetch_array($qry_manage_app))
                {
                    ?>
                    <tr>
                      <td><img src="<?php echo APP_IMAGE.$result_manage_app["package_logo"];?>" height="100" width="100"></td>
                      <td><?php echo $result_manage_app["package_devlopar_name"];?></td>
                      <td><?php echo $result_manage_app["package_app_name"];?></td>
                      <td><?php echo $result_manage_app["package_package_name"];?></td>
                      <!-- <td><?php echo $result_manage_app["package_interstitial_ad_code"];?></td>
                      <td><?php echo $result_manage_app["package_banner_ad_code"];?></td>
                      <td><?php echo $result_manage_app["package_video_ad_code"];?></td> -->
                      <td align="center"><a href="<?php echo MANAGE_APP;?>process.php?action=app_status&app_id=<?php echo $result_manage_app['package_id'];?>&value=<?php echo $result_manage_app["package_status"];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon($result_manage_app["package_status"]);?>" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>manage_app-edit-<?php echo $result_manage_app['package_id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo MANAGE_APP;?>process.php?action=deleteapp&app_id=<?php echo $result_manage_app['package_id']?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>
                     
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



<?php if($_REQUEST["action"]=="add")
{
  ?>    
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
      <header class="panel_header">                           
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
          </li>
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>manage_app">Manage Application</a>
          </li>
          <li class="active">
            <strong>Add Record</strong>
          </li>
        </ol> 
      </header>
      <form method="post" action="<?php echo MANAGE_APP;?>process.php" name="portal-form" enctype="multipart/form-data">
        <div class="content-body">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Developer Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="devname" id="devname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
             
            <div class="col-md-6"> 
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Application Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="appname" id="appname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>          
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Application Package Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="packname" id="packname" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Application link</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="applink" id="applink" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Interstitial Ad</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="interad" id="interad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Banner Ad</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="bannerad" id="bannerad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Video Ad</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="videoad" id="videoad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>
            
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Application Logo</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="file" name="app_logo" id="app_logo" class="form-control">
                </div>
              </div>
              
            </div>


           <div class="clearfix"></div>

          <div class="form-group">
            <label class="form-label" for="field-1"><b>Is Active</b></label>
            <input type="radio" name="app_status" id="active" class="" value="1" checked="checked">
            <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
            <input type="radio" name="app_status" id="inactive" class="" value="0">
            <label class="iradio-label form-label" for="minimal-radio-4">No</label>
          </div>

          <div class="form-group"> 
           <input type="hidden" name="action" id="action" value="newapp">
           <button type="submit" class="btn btn-blue  pull-center">Submit</button>
           <a href="<?php echo HTTP_BASE_URL;?>manage_app"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
         </div>  
       </div>
     </div>
   </div>
 </form>
</section>
</div>                
<?php } ?>
<?php if($_REQUEST["action"]=="edit")
{
  ?>    
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
      <header class="panel_header">                           
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
          </li>
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>manage_app">Manage Application</a>
          </li>
          <li class="active">
            <strong>Edit Record</strong>
          </li>
        </ol>
      </header>
      <form method="post" action="<?php echo MANAGE_APP;?>process.php" name="portal-form" enctype="multipart/form-data">
        <?php
        $qry_manage_app = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."package_msater where package_id='".$_REQUEST["manage_appid"]."'");
        $result_manage_app = mysqli_fetch_array($qry_manage_app);
        
          ?>
          <div class="content-body">
            <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Developer Name</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="devname" id="devname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_devlopar_name']; ?>">
                        </div>
                    </div>
                  </div>  
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Application Name</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="appname" id="appname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_app_name']; ?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Application Package Name</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="packname" id="packname" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_package_name'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Application Link</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="applink" id="applink" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_link'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Interstitial Ad</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="interad" id="interad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_interstitial_ad_code'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Banner Ad</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="bannerad" id="bannerad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_banner_ad_code'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Video Ad</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="text" class="form-control" name="videoad" id="videoad" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_manage_app['package_video_ad_code'];?>">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Uploaded App Logo</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <img src="<?php echo APP_IMAGE.$result_manage_app['package_logo'];?>" style="height: 100px;width: 100px;">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">  
                    <div class="form-group">
                        <label class="form-label" for="field-1"><b>Application Logo</b></label>
                        <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                        <div class="controls">
                            <input type="file" name="app_logo" id="app_logo" class="form-control">
                        </div>
                    </div>
                  </div>  
                </div>


                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="form-label" for="field-1"><b>Is Active</b></label>
                    <input type="radio" name="app_status" id="active" class="" value="1" <?php if($result_manage_app['package_status']==1){?> checked <?php } ?>>
                    <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
                    <input type="radio" name="app_status" id="inactive" class="" value="0" <?php if($result_manage_app['package_status']==0){?> checked <?php } ?>>
                    <label class="iradio-label form-label" for="minimal-radio-4">No</label>
                </div>

            <div class="form-group"> 
             <input type="hidden" name="action" id="action" value="editapp">
             <input type="hidden" name="app_id" value="<?php echo $_REQUEST['manage_appid'];?>"/>
             <button type="submit" class="btn btn-blue  pull-center">Submit</button>
             <a href="<?php echo HTTP_BASE_URL;?>manage_app"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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
<script src="assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="assets/plugins/count-to/countto.js" type="text/javascript"></script> 


<!-- CORE TEMPLATE JS - START --> 
<script src="assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

<!-- Sidebar Graph - START --> 
<script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assets/js/chart-sparkline.js" type="text/javascript"></script> 
<!-- Sidebar Graph - END --> 


<!--TABLE JS --> 
<script src="assets/plugins/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>