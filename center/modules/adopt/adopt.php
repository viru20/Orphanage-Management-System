
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Adopt Detail</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          <?php
          $active=0; 
         
            $active=active_count(TABLE_PREFIX."adopt_master","ADOPT_STATUS","ADOPT_IS_DELETED");
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
            $inactive=inactive_count(TABLE_PREFIX."adopt_master","ADOPT_STATUS","ADOPT_IS_DELETED");
          
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
          
            $deleted=deleted_count(TABLE_PREFIX."adopt_master","ADOPT_IS_DELETED");
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
         
           <!-- <a href="<?php echo HTTP_BASE_URL;?>adopt-add"><img src="<?php echo MEDIA;?>images/add.png" width="16" height="16" border="0" />&nbsp;&nbsp;Add Record</a> -->

        </h2> 
                                      
      </header>  
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>

                   <th>ADOPT ID</th>
                    <th>USER_NAME</th>
                    <th>CENTER_NAME</th>
                    <th>CHILDREN_NAME</th>
                    <th>JOB</th>
                    <th>SALARY</th> 
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    <th width="10%">Status</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    
                    <th>ADOPT ID</th>
                    <th>USER_NAME</th>
                    <th>CENTER_NAME</th>
                    <th>CHILDREN_NAME</th>
                    <th>JOB</th>
                    <th>SALARY</th> 
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                    
                    <th width="10%">Status</th>
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry_adopt = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."adopt_master where CENTER_ID='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and ADOPT_IS_DELETED=0");
                
                while($result_adopt = mysqli_fetch_array($qry_adopt))
                {
                    ?>
                    <tr>
                      <td><?php echo $result_adopt["ADOPT_ID"];?></td>
                      <td>
                        <?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_user_master where id ='".$result_adopt['USER_ID']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['name'];
                         ?>
                      </td>
                      <td>
                        <?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_center_master where center_id ='".$result_adopt['CENTER_ID']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['center_name'];
                         ?>
                      </td>
                      <td>
                        <?php 
                          $qry = mysqli_query($con,"SELECT * from orphanage_children_master where children_id ='".$result_adopt['USER_ID']."'");
                          $result = mysqli_fetch_array($qry);
                          echo $result['children_name'];
                         ?>
                      </td>
                      <td><?php echo $result_adopt["JOB"];?></td>
                      <td><?php echo $result_adopt["SALARY"];?></td>
                      
                     
                      <td align="center"><a href="<?php echo ADOPT;?>process.php?action=ADOPT_STATUS&ADOPT_ID=<?php echo $result_adopt['ADOPT_ID'];?>&value=<?php echo $result_adopt["ADOPT_STATUS"];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon($result_adopt["ADOPT_STATUS"]);?>" width="14" height="14" border="0" /></a></td>
                      
                     
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
                    <input type="text" class="form-control" name="chdob" id="chdob" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
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
                       /* $qry;
                        while()
                        {
                          ?>
                            <option value="<?php echo  ?>"><?php echo  ?></option>      
                          <?php
                        }*/
                      ?>
                      <option value="1">Bardoli</option>
                      <option value="2">Surat</option>
                      <option value="3">Navsari</option>
                      <option value="4">Ahmdabad</option>
                      <option value="5">Mumbai</option> 
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
                      <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <input type="radio" name="chstatus" id="chstatus" class="" value="0">
                      <label class="iradio-label form-label" for="minimal-radio-4">No</label>
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
                 <a href="<?php echo HTTP_BASE_URL;?>manage_app"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_ID='".$_REQUEST['adoptid']."'");
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
                <label class="form-label" for="field-1"><b>Developer Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="devname" id="devname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_devlopar_name']; ?>">
               </div>
             </div>      
            </div>
             
            <div class="col-md-6"> 
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Application Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="appname" id="appname" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_app_name']; ?>">
               </div>
             </div>          
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Application Package Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="packname" id="packname" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_package_name']; ?>">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Application link</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="applink" id="applink" rows="10" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_link']; ?>">
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

            

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Ad Type</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="display_ad" id="display_ad">
                      <option value="1" <?php if($result_app['package_ad_type']=='1'){ echo "selected"; } ?>>Facebook</option>
                      <option value="2" <?php if($result_app['package_ad_type']=='2'){ echo "selected"; } ?>>Google</option>
                      <option value="3" <?php if($result_app['package_ad_type']=='3'){ echo "selected"; } ?>>Unity</option>
                      <option value="4" <?php if($result_app['package_ad_type']=='4'){ echo "selected"; } ?>>AppLovin</option>
                      <option value="5" <?php if($result_app['package_ad_type']=='5'){ echo "selected"; } ?>>StartUp</option> 
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
               
                <div class="controls">
                    <img src="<?php echo APP_IMAGE.$result_app['package_logo']; ?>" height="100" width="100">
                </div>
              </div>
              
            </div>

            
           <div class="clearfix"></div>

            <div class="form-group">
              <label class="form-label" for="field-1"><b>Is AD Show?</b></label>
              <input type="radio" name="is_ad_show" id="active" class="" value="1" <?php if($result_app['package_isAdShow']=='1'){ echo "checked"; } ?>>
              <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
              <input type="radio" name="is_ad_show" id="inactive" class="" value="0" <?php if($result_app['package_isAdShow']=='0'){ echo "checked"; } ?>>
              <label class="iradio-label form-label" for="minimal-radio-4">No</label>
            </div>

            
          </div>
        </div>
 
      </section>
    </div> 

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>Google App ID</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Banner AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="g_banner" id="g_banner" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_banner_ad_code']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Native AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="g_native" id="g_native" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_native_id']; ?>">
                </div>
              </div>      
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Interstitial</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="g_interstitial" id="g_interstitial" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_interstitial_ad_code']; ?>">
                </div>
              </div>      
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Video AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="g_video" id="g_video" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_video_ad_code']; ?>">
                </div>
              </div>      
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>Facebook App ID</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Banner AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="fb_banner" id="fb_banner" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_fb_banner']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Native AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="fb_native" id="fb_native" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_fb_native']; ?>">
                </div>
              </div>      
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Interstitial</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="fb_interstitial" id="fb_interstitial" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_fb_interstial']; ?>">
                </div>
              </div>      
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Video AD</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="fb_video" id="fb_video" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_fb_video']; ?>">
                </div>
              </div>      
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>Unity App ID</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Game ID</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="game_id" id="game_id" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_unity_game_id']; ?>">
               </div>
              </div>          
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>AppLovin App ID</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>AppLovin ID</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="appLovin_id" id="appLovin_id" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_appLovin']; ?>">
               </div>
              </div>          
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>StartUp App ID</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>APP ID</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="s_app_id" id="s_app_id" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_startup_appid']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>DEV ID</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="s_dev_id" id="s_dev_id" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_startup_devid']; ?>">
               </div>
              </div>          
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
            <h3>Configration</h3>
        </header>
      
        <div class="content-body">
          <div class="row">

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Version</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="version" id="version" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_version']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Update</b></label>
                <span class="desc">0-optional, 1-Force fully Update</span>
                <div class="controls">
                    <input type="text" class="form-control" name="is_update" id="is_update" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_isupdate']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Spin Time</b></label>
                <div class="controls">
                    <input type="text" class="form-control" name="spin_time" id="spin_time" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_spintime']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Total Spin</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="total_spin" id="total_spin" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_totalspin']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Total Search Card</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="total_search_card" id="total_search_card" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_total_search_card']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Crash Card Random amount</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="crash_card_random_amount" id="crash_card_random_amount" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_crash_card_random_amt']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Min Widhraw Amount </b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="MinWidhrawAmount" id="MinWidhrawAmount" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_min_widharw_amt']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-8"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Min Withdraw Warning Dialog Message</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="MinWidhrawwatnmsg" id="MinWidhrawwatnmsg" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_min_widhdraw_dailog_msg']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Rate US</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="rateus" id="rateus" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_rateus']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Rate Bonus</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="ratebonus" id="ratebonus" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_rate_bonus']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Rate Bonus Amount</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="ratebonusamt" id="ratebonusamt" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_rate_bonus_amt']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Daily Bonus Amount</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="dailybonusamt" id="dailybonusamt" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_daily_bonus_amt']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-8"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Daily Bonus Dailog Message</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="dailybonusdailogmsg" id="dailybonusdailogmsg" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_daily_bonus_dailog_msg']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Dimond Rate Rs.</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="dimondrs" id="dimondrs" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_rate_rs']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Dimond Rate $.</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="dimonddoller" id="dimonddoller" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['dimond_rate_doller']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Dimond Rate E.</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="dimondero" id="dimondero" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_rate_euro']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Video Button Show?</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="videobtn" id="videobtn" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_is_video_btn_show']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Video Count</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="videocount" id="videocount" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_video_cnt']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Spin on Video</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="spinonvideo" id="spinonvideo" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_spin_on_video']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Full Next Count</b></label>
                <span class="desc">(use for Add show after 2 spin )</span>
                <div class="controls">
                    <input type="text" class="form-control" name="full_next_count" id="full_next_count" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_full_next_count']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Privacy Policy</b></label>
                <div class="controls">
                    <input type="text" class="form-control" name="privacy_policy" id="privacy_policy" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['package_privacy_policy']; ?>">
               </div>
              </div>          
            </div>

            <div class="col-md-4"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Today datetime</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="todaydatetime" id="todaydatetime" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo date('Y-m-d H:i:s');?>">
               </div>
              </div>          
            </div>

            <div class="col-md-8"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Jackpot Diamon Range Randomly</b></label>
                <div class="clearfix"></div>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls col-md-4">
                    <input type="text" class="form-control" name="jackpotrangfrom" id="jackpotrangfrom" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" placeholder="From" value="<?php echo $result_app['package_jackpot_from']; ?>">
                </div>
                    
                <div class="controls col-md-4">
                    <input type="text" class="form-control" name="jackpotrangto" id="jackpotrangto" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" placeholder="To" value="<?php echo $result_app['package_jackpot_to']; ?>">
                </div>
               </div>
              </div> 
              <div class="clearfix"></div>

              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Full?</b></label>
                <input type="radio" name="is_full" id="active" class="" value="1" <?php if($result_app['package_is_full']=='1'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
                <input type="radio" name="is_full" id="inactive" class="" value="0" <?php if($result_app['package_is_full']=='0'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">No</label>
              </div>

              <div class="clearfix"></div>

              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Native?</b></label>
                <input type="radio" name="is_native" id="active" class="" value="1" <?php if($result_app['package_is_native']=='1'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
                <input type="radio" name="is_native" id="inactive" class="" value="0" <?php if($result_app['package_is_native']=='0'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">No</label>
              </div>
              <div class="clearfix"></div>

              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Banner?</b></label>
                <input type="radio" name="is_banner" id="active" class="" value="1" <?php if($result_app['package_is_banner']=='1'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
                <input type="radio" name="is_banner" id="inactive" class="" value="0" <?php if($result_app['package_is_banner']=='0'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">No</label>
              </div>
              <div class="clearfix"></div>

              <div class="form-group">
                <label class="form-label" for="field-1"><b>Is Active?</b></label>
                <input type="radio" name="app_status" id="active" class="" value="1" <?php if($result_app['package_status']=='1'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">Yes</label>&nbsp;
                <input type="radio" name="app_status" id="inactive" class="" value="0" <?php if($result_app['package_status']=='0'){ echo "checked"; } ?>>
                <label class="iradio-label form-label" for="minimal-radio-4">No</label>
              </div>
              <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="editapp">
                 <input type="hidden" name="app_id" value="<?php echo $result_app['package_id']; ?>">
                 <button type="submit" class="btn btn-blue  pull-center">Submit</button>
                 <a href="<?php echo HTTP_BASE_URL;?>manage_app"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>  

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