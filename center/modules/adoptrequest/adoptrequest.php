
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Adopt Request</h1>
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
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                    
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
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                    
                 </tr>
               </tfoot>
               <tbody>
                <?php
                
                 $qry_adopt = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."adopt_master where CENTER_ID='".$_SESSION[SESSION_PREFIX.'login-center-id']."' and ADOPT_IS_DELETED=0 and ADOPT_STATUS=0");

                 
                
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
                          $qry = mysqli_query($con,"SELECT * from orphanage_children_master where children_id ='".$result_adopt['CHILDREN_ID']."'");
                          
                          
                          $result = mysqli_fetch_array($qry);
                          echo $result['children_name'];
                         ?>
                      </td>
                      <td><?php echo $result_adopt["JOB"];?></td>
                      <td><?php echo $result_adopt["SALARY"];?></td>
                      
                     
                      <td align="center"><a href="<?php echo ADOPTREQUEST;?>process.php?action=ADOPT_STATUS&id=<?php echo $result_adopt["ADOPT_ID"];?>&value=<?php echo $result_adopt["ADOPT_STATUS"];?>&cid=<?php echo $result_adopt['CHILDREN_ID'];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon(1);?>" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>adoptrequest-edit-<?php echo 
                      $result_adopt['ADOPT_ID']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>

                      <td align="center"><a href="<?php echo ADOPTREQUEST;?>process.php?action=deleteapp&id=<?php echo $result_adopt["ADOPT_ID"];?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>
                     
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
  
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."adopt_master where ADOPT_ID='".$_REQUEST['adoptrequestid']."'");
  $result_app=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo ADOPTREQUEST;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>adoptrequest">Adopt Request</a>
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
                <label class="form-label" for="field-1"><b>JOB</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
               <div class="controls">
                    <input type="text" class="form-control" name="ujob" id="ujob" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['JOB']; ?>">
               </div>
            </div>      
          </div>
             
            <div class="col-md-12"> 
             <div class="form-group">
                <label class="form-label" for="field-1"><b>SALARY </b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="usalary" id="usalary" rows="3" style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_app['SALARY']; ?>">
               </div>
             </div>          
            </div>

            <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="editapp">
                 <input type="hidden" name="id" value="<?php echo $_REQUEST['adoptrequestid']; ?>">
                 <button type="submit" class="btn btn-blue  pull-center">Update</button>
                 <a href="<?php echo HTTP_BASE_URL;?>adoptrequest"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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