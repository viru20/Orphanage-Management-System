
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">center profile</h1>
        </div>                           
        
<?php
  $qry_app=mysqli_query($con,"select * from ".TABLE_PREFIX."center_master where center_id='".$_SESSION[SESSION_PREFIX.'login-center-id']."'");
  $result_center=mysqli_fetch_array($qry_app);
  ?>    
    <form method="post" action="<?php echo CENTER;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      
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
    
  <div class="content-body">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Center_Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="cname" id="cname" rows="3" value="<?php echo $result_center['center_name']; ?>" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
             
 
            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Center_Mobile_no</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="mono" id="mono" rows="10" value="<?php echo $result_center['center_mo_no']; ?>" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Center_Registration_Date</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="date" class="form-control" name="rdate" id="rdate" rows="10" value="<?php echo $result_center['center_reg_date']; ?>"style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>  
            
                    <div class="content-body">
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Head Name</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">

                    <input type="text" class="form-control" name="pname" id="pname" rows="3" value="<?php echo $result_center['center_head_name']; ?>" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>

            <div class="col-md-6">  
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Center Img</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <img src="<?php echo CENTER_IMAGE.$result_center['center_head_image'];?>" height="100" width="100">
                <div class="controls">
                    <input type="file" name="pimg" id="pimg" class="form-control">
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
  <option value="<?php if($res['id'] == $result_center['country']){echo "selected";}?>"><?php echo $res['name']; ?></option>
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
  <option value="<?php if($res['id'] == $result_center['country']){echo "selected";}?>"><?php echo $res['name']; ?></option>
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
                     <input type="text" class="form-control" name="city" id="city"  style="border: 2px solid #ccc;border-radius: 10px;" value="<?php echo $result_center['city']?>">
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Email Id</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="email" class="form-control" name="email" id="email" rows="10" value="<?php echo $result_center['email']; ?>"style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>

            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Password</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <?php
                $pass=base64_decode($result_center['password']);
                  ?>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $pass; ?>"rows="10" style="border: 2px solid #ccc;border-radius: 10px;">
                </div>
              </div>
            </div>



            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Address</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <textarea class="form-control" name="address" id="address" rows="1" style="border: 2px solid #ccc;border-radius: 10px;"><?php echo $result_center['address']; ?></textarea>
                </div>
              </div>
            </div>
            
            <div class="col-md-6"> 
              <div class="form-group">
                <label class="form-label" for="field-1"><b>History</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <textarea class="form-control" name="history" id="history" rows="6" style="border: 2px solid #ccc;border-radius: 10px;"><?php echo $result_center['history']; ?></textarea>
                </div>
              </div>
            </div>

                        <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="editcenter">
                 <input type="hidden" name="id" id="id" value="<?php echo $_SESSION[SESSION_PREFIX.'login-center-id']; ?>">
                 <input type="submit" name="submit" value="Submit" class="btn btn-blue  pull-center">
                 <a href="<?php echo HTTP_BASE_URL;?>center"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
              </div>  

            </div>
        </div>
 
      </section>
    </div> 
</form>            
      
<?php  ?>  


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