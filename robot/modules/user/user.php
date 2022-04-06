
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">User Details</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          <?php
          $active=0; 
         
            $active=active_count(TABLE_PREFIX."user_master","user_status","user_is_delete");
          ?>

          <div class="col-lg-3 col-md-4 col-xs-6 col-sm-4">
            <div class="tile-counter bg-purple">
              <div class="content">                                              
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $active; ?>"></h2>
                <div class="clearfix"></div>
                <span>Active</span>
              </div>
            </div>

          </div>

          <?php 
            $inactive=inactive_count(TABLE_PREFIX."user_master","user_status","user_is_delete");
          
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
          
            $deleted=deleted_count(TABLE_PREFIX."user_master","user_is_delete");
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
                <h2 class="number_counter" data-speed="3000" data-from="0" data-to="<?php echo $total; ?>"></h2>
                <div class="clearfix"></div>
                <span>Total</span>
              </div>
            </div>
            <div class="clearfix"></div>
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
         
            <a href="<?php echo HTTP_BASE_URL;?>user-add"><img src="<?php echo MEDIA;?>images/add.png" width="16" height="16" border="0" />&nbsp;&nbsp;Add Record</a>

        </h2> 
                                      
      </header>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    
                  	<th>User IMG</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Mo_No</th>
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
                   
                    <th>User IMG</th>
                    <th>User Name</th>
                    <th>Gender</th>
                    <th>Mo_No</th>
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
                
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0
                  and user_status=1 ORDER BY `id` DESC");
                
                while($result_user = mysqli_fetch_array($qry))
                {
                    ?>
                    
                     
                      <td><img src="<?php echo USER_IMAGE.$result_user['image'];?>" height="100" width="100"></td>
                      <td><?php echo $result_user["name"];?></td>
                      <td><?php  
                      if($result_user["gender"]=="1")
                      {
                        echo "Male";
                      }
                      if($result_user["gender"]=="2")
                      {
                        echo "Female";
                      }
                      ?></td>
                      <td><?php echo $result_user["mo_no"];?></td>
                     
                      <td align="center"><a href="<?php echo USER;?>process.php?action=user_status&id=<?php echo $result_user['id'];?>&value=<?php echo $result_user["user_status"];?>" onclick="return confirm('Are you sure to change current status?')"><img src="<?php echo MEDIA;?>images/<?php echo display_status_icon($result_user["user_status"]);?>" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>user-edit-<?php echo $result_user['id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>
                      <td align="center"><a href="<?php echo USER;?>process.php?action=delete&id=<?php echo $result_user['id']?>" title="Delete" onclick="return confirm('Are you sure?\n\nDo you want to remove this?')"><img src="<?php echo MEDIA;?>images/delete.png" width="14" height="14" border="0" /></a></td>
                     
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
<?php if($_REQUEST["action"]=="add")
{
  ?>    
  <form method="post" action="<?php echo USER;?>process.php" name="portal-form" enctype="multipart/form-data">

    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>user">user</a>
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
                <label class="form-label" for="field-1"><b>Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="name" id="name" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
             
              <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Username</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="username" id="username" value=""  style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>

 <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Gender</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="gender" id="gender">
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Mobile_no</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="mono" id="mono" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Date Of Birth</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="date" class="form-control" name="dob" id="dob" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>User IMG</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="file" name="img" id="img" class="form-control">
                </div>
              </div>
              
            </div>

             <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Country</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="country" id="country" style="height:40px;">
                      <option value="">Select Country</option>
<?php
$qry1=mysqli_query($con,"select *from country");
while($res=mysqli_fetch_array($qry1))
{
?>
  <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
<?php
}
?>  
                    </select>
                </div>
              </div>
            </div>

 <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>region</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="region" id="region" style="height:40px;">
                      <option value="">Select Region</option>
<?php
$qry=mysqli_query($con,"select *from states");
while($res=mysqli_fetch_array($qry))
{
?>
  <option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
<?php
}
?>
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>City</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    
                      <input type="text" class="form-control" name="city" id="city"  style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>

<div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Address</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <textarea class="form-control" name="address" id="address" rows="6" style="border: 2px solid #ccc;border-radius: 10px;"></textarea>
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Email Id</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="email" class="form-control" name="email" id="email" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Password</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="password" class="form-control" name="password" id="password" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>
           
                        <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="newuser">
                 <input type="submit" name="submit" value="Submit" class="btn btn-blue  pull-center">
                 <a href="<?php echo HTTP_BASE_URL;?>user"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>  

            </div>
        </div>
 
      </section>
    </div> 
</form>               
<?php } ?>
<?php if($_REQUEST["action"]=="edit")
{
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where id='".$_REQUEST['userid']."'");
  $result_user=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo USER;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
        <header class="panel_header">                           
          <ol class="breadcrumb">
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
              <a href="<?php echo HTTP_BASE_URL;?>user">User Details</a>
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
                <label class="form-label" for="field-1"><b>Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $result_user['name']; ?>" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>

              <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Username</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $result_user['username']; ?>" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
             
 <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Gender</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="gender" id="gender">
                      <option value="1" <?php if($result_user['gender']=="1"){ echo "selected";} ?>>Male</option>
                      <option value="2" <?php if($result_user['gender']=="2"){ echo "selected";} ?>>Female</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Mobile_no</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="mono" id="mono" value="<?php echo $result_user['mo_no']; ?>" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Date Of Birth</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $result_user['dob']; ?>"rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>User IMG</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <img src="<?php echo USER_IMAGE.$result_user['image'];?>" height="100" width="100">
                    <input type="file" name="img" id="img" class="form-control">
                </div>
              </div>
              
            </div>

             <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Country</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="country" id="country">
                     
<?php
$qry=mysqli_query($con,"select *from country");
while($res=mysqli_fetch_array($qry))
{
?>
  <option value="<?php if($res['id'] == $result_user['country']){echo "selected";}?>"><?php echo $res['name']; ?></option>
<?php
}
?>
                      
                    </select>
                </div>
              </div>
            </div>

 <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>region</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <select class="form-control" name="region" id="region" >
                      <?php
$qry=mysqli_query($con,"select *from states");
while($res=mysqli_fetch_array($qry))
{
?>
  <option value="<?php if($res['id'] == $result_user['region']){echo "selected";}?>"><?php echo $res['name']; ?></option>
<?php
}
?>
 
                    </select>
                </div>
              </div>
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>City</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="city" id="city"  style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_user['city'];?>">
                </div>
              </div>
            </div>

<div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Address</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <textarea class="form-control" name="address" id="address"  rows="6" style="border: 2px solid #ccc;border-radius: 10px;"><?php echo $result_user['address']; ?></textarea>
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Email Id</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="email" class="form-control" name="email" id="email" rows="10" value="<?php echo $result_user['email']; ?>" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Password</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="password" class="form-control" name="password" value="<?php echo $result_user['password']; ?>" id="password" rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>
           
                        <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="edituser">
                 <input type="hidden" name="id" id="id" value="<?php echo $_REQUEST['userid']; ?>">
                 <input type="submit" name="submit" value="Submit" class="btn btn-blue  pull-center">
                 <a href="<?php echo HTTP_BASE_URL;?>user"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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