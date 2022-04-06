
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Children Detail</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          <?php
          $active=0; 
         
            $active=active_count(TABLE_PREFIX."children_master","children_status","children_is_deleted");
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
            $inactive=inactive_count(TABLE_PREFIX."children_master","children_status","children_is_deleted");
          
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
          
            $deleted=deleted_count(TABLE_PREFIX."children_master","children_is_deleted");
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
       if(isset($_SESSION["children_alert_message"]))
       {
        ?>
        <div class="state iradio_square-green checked" style="color:green;"> <i class="fa fa-arrow-circle-right"></i><?php echo $_SESSION["children_alert_message"]; ?></div>

        <?php
        unset($_SESSION["children_alert_message"]);
      }
      ?>
    
     <section class="box ">
      <header class="panel_header">
        <h2 class="title pull-right">
         
            <a href="<?php echo HTTP_BASE_URL;?>children-add"><img src="<?php echo MEDIA;?>images/add.png" width="16" height="16" border="0" />&nbsp;&nbsp;Add Record</a>

        </h2> 
                                      
      </header>  
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>

                  	<th>Children Image</th>
                    <th>Children Name</th>
                    <th>Children AGE</th>
                    <th>Center Name</th>
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
                    
                    <th>Children Image</th>
                    <th>Children Name</th>
                    <th>Children AGE</th>
                    <th>Center Name</th>
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
                

                
                 $qry_children_data = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."children_master where children_is_deleted=0 and adopt=0 ORDER BY `children_id` DESC");
                

                while($qry_children = mysqli_fetch_array($qry_children_data))
                {

                    ?>
                    <tr>
                      <td><img src="<?php echo CHILDREN_IMAGE.$qry_children["children_img"];?>" height="100" width="100"></td>
                      <td><?php echo $qry_children["children_name"];?></td>
                      <td><?php echo $qry_children["children_age"];?></td>
                      <td><?php 
                      
                              $center=mysqli_query($con,"select center_name from ".TABLE_PREFIX."center_master where center_id='".$qry_children["center_id"]."'");

                       $center_detail= mysqli_fetch_array($center); 
                       echo $center_detail["center_name"];
                       ?>
                      </td>

                      
                     
                      <td align="center"><a href="<?php echo CHILDREN;?>process.php?action=app_status&app_id=<?php echo $qry_children['children_id'];?>&value=<?php echo $qry_children["children_status"];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon($qry_children["children_status"]);?>" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>children-edit-<?php echo $qry_children['children_id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo CHILDREN;?>process.php?action=deleteapp&app_id=<?php echo $qry_children['children_id']?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>
                     
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
  <form method="post" action="<?php echo CHILDREN;?>process.php" name="portal-form" enctype="multipart/form-data">

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>children">Children Detail</a>
            </li>
            <li class="active">
              <strong>Add Record</strong>
            </li>
          </ol> 
        </header>
      
        <div class="content-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chname" id="chname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div> 
            </div>     
            
             
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Gender</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chgender" id="chgender" class="" value="1" checked="checked">
                      <label class="iradio-label form-label" for="minimal-radio-4">Male</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chgender" id="chgender" class="" value="1">
                      <label class="iradio-label form-label" for="minimal-radio-4">Female</label>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children DOB</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="date" class="form-control" name="chdob" id="chdob" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children AGE</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chage" id="chage" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Image</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="file" name="chimg" id="chimg" class="form-control">
                </div>
              </div>
              
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Height</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chheight" id="chheight" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Weight</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chweight" id="chweight" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Bloodgroup</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chbloodgroup" id="chbloodgroup" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Center ID</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="ceid" id="ceid">
                      <?php
                       $qry_center=mysqli_query($con,"select center_id,center_name from ".TABLE_PREFIX."center_master where center_status=1 and center_is_deleted=0");
                        while($qry_result=mysqli_fetch_array($qry_center))
                        {
                          ?>
                            <option value="<?php echo $qry_result['center_id'];  ?>"><?php echo $qry_result['center_name']; ?></option>      
                          <?php
                        }
                      ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
                        
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Status</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chstatus" id="chstatus" class="" value="1" checked="checked">
                      <label class="iradio-label form-label" for="minimal-radio-4">Active</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chstatus" id="chstatus" class="" value="0">
                      <label class="iradio-label form-label" for="minimal-radio-4">Inactive</label>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
            <div class="col-md-3">
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3">
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="children">
                 <button type="submit" class="btn btn-blue  pull-center">Submit</button>
                 <a href="<?php echo HTTP_BASE_URL;?>children"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>
            </div>
      
            </div>
            
          </div>
        </div>
 
      </section>
    </div>    
</form>   


<?php } ?>
<?php if($_REQUEST["action"]=="edit")
{
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."children_master where children_id='".$_REQUEST['childrenid']."'");
  $result_app=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo CHILDREN;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>children">Children Detail</a>
            </li>
            <li class="active">
              <strong>Edit Record</strong>
            </li>
          </ol> 
        </header>
      
        <div class="content-body">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chname" id="chname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_name']; ?>">
               </div>
             </div>      
            </div>     
            
             
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Gender</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chgender" id="chgender" class="" value="1" <?php if($result_app['children_gender']=='1'){ echo "checked"; } ?>>
                      <label class="iradio-label form-label" for="minimal-radio-4">Male</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chgender" id="chgender" class="" value="0" <?php if($result_app['children_gender']=='0'){ echo "checked"; } ?>>
                      <label class="iradio-label form-label" for="minimal-radio-4">Female</label>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children DOB</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="date" class="form-control" name="chdob" id="chdob" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_dob']; ?>">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children AGE</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chage" id="chage" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_age']; ?>">
                </div>
              </div>
            </div>  
            
            

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Height</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chheight" id="chheight" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_height']; ?>">
                </div>
              </div>
            </div>  

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Weight</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chweight" id="chweight" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_weight']; ?>">
                </div>
              </div>
            </div>  

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Bloodgroup</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="chbloodgroup" id="chbloodgroup" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['children_bloodgroup']; ?>">
                </div>
              </div>
            </div>  

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Center Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="ceid" id="ceid">
                      <?php
                       $qry_center=mysqli_query($con,"select center_id,center_name from ".TABLE_PREFIX."center_master where center_status=1 and center_is_deleted=0");
                        while($qry_result=mysqli_fetch_array($qry_center))
                        {
                          ?>
                            <option value="<?php echo $qry_result['center_id']; ?>" <?php if($qry_result['center_id']==$result_app['center_id']) { echo "selected"; } ?>><?php echo $qry_result['center_name']; ?></option>      
                          <?php
                        }
                      ?>
                      
                    </select>
                </div>
              </div>
            </div>

            
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Children Image</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="file" name="chimg" id="chimg" class="form-control">
                    
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
                    <img src="<?php echo CHILDREN_IMAGE.$result_app["children_img"];?>" height="100" width="100">   
            </div>
            <div class="clearfix"></div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Status</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chstatus" id="chstatus" class="" value="1" <?php if($result_app['children_status']=='1'){ echo "checked"; } ?>>
                      <label class="iradio-label form-label" for="minimal-radio-4">Active</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chstatus" id="chstatus" class="" value="0" <?php if($result_app['children_status']=='0'){ echo "checked"; } ?>>
                      <label class="iradio-label form-label" for="minimal-radio-4">Inactive</label>
                    </div>
                  </div>
                </div>
              </div>          
            </div>
            <div class="clearfix"></div>
           
            <div class="col-md-6">
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="edit">
                 <input type="hidden" name="child_id" value="<?php echo $_REQUEST['childrenid']; ?>">
                 <button type="submit" class="btn btn-blue  pull-center">Submit</button>
                 <a href="<?php echo HTTP_BASE_URL;?>children"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>
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