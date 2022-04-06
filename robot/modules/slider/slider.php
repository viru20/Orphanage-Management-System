
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Slider Details</h1>
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

         
        </div>
        <div class="clearfix"></div>

        
      </div>
    </div>
     
<?php if($_REQUEST["action"]=="")
{
  $qry_app=mysqli_query($con,"select * from slider");
  $result_user=mysqli_fetch_array($qry_app);

  ?>    
    <form method="post" action="<?php echo SLIDER;?>process.php" name="portal-form" enctype="multipart/form-data">
    
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <?php 
       if(isset($_SESSION["app_alert_message"]))
       {
        ?>
        <div class="state iradio_square-green checked" style="color:green;"> <i class="fa fa-arrow-circle-right"></i><?php echo $_SESSION["app_alert_message"]; ?></div>

        <?php
        unset($_SESSION["app_alert_message"]);
      }?>
      <section class="box ">
        <header class="panel_header">                           
          <!-- <ol class="breadcrumb">
            <li>
              <a href=""><i class="fa fa-home"></i>Home</a>
            </li>
            
            <li class="active">
              <strong>Edit Record</strong>
            </li>
          </ol>  -->
        </header>
 <div class="content-body">
          <div class="row">
             <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Heading</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="heading" id="heading" value="<?php echo $result_user['head']; ?>" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Sub Heading</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <textarea class="form-control" name="sub" id="sub" value="<?php echo $result_user['subhead']; ?>" rows="3" style="border: 2px solid #ccc;border-radius: 10px;"><?php echo $result_user['subhead']; ?></textarea>
               </div>
             </div>      
            </div>
            <div class="col-md-6">
             <div class="form-group">
                <label class="form-label" for="field-1"><b>Contact No</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                    <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $result_user['contact']; ?>" rows="3" style="border: 2px solid #ccc;border-radius: 10px;">
               </div>
             </div>      
            </div>
            
            
             
                         <div class="clearfix"></div>
              <div class="form-group"> 
                 <input type="hidden" name="action" id="action" value="edit">
                 
                 <input type="submit" name="submit" value="Update" class="btn btn-blue  pull-center">
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