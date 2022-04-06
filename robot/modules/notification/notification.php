<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">Notification</h1> 
        </div>                           
        
        <div class="pull-right col-lg-8">                                  
 
        </div>
        <div class="clearfix"></div>

        
      </div>
       <?php 
       if(isset($_SESSION["notification_alert_message"]))
       {
        ?>
        <div class="state iradio_square-green checked" style="color:green;"> <i class="fa fa-arrow-circle-right"></i><?php echo $_SESSION["notification_alert_message"]; ?></div>

        <?php
        unset($_SESSION["notification_alert_message"]);
      }
      ?>
    </div>
    
<?php if($_REQUEST["action"]=="")
{
  ?>    
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
      <header class="panel_header">                           
        <ol class="breadcrumb">
          
        </ol> 
      </header>
       
      <form method="post" action="<?php echo NOTIFICATION;?>process.php" name="portal-form">
        <div class="content-body">
          <div class="row">
            <div class="col-md-6">     
              <div class="form-group">
                <label class="form-label" for="field-1"><b>Message</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                  <textarea name="msg" id="msg" class="form-control" cols="10" rows="10"> </textarea>
                </div>
              </div> 
              <div class="clearfix"></div>
          
              <div class="form-group"> 
                <input type="hidden" name="action" id="action" value="notification">
                <button type="submit" class="btn btn-blue  pull-center">Submit</button>
              
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


<!-- FUCTIONS -->         
<?php 
$year=date('Y');
$month=date('m');
$date=date('d');
?>

<link rel="stylesheet" type="text/css" href="scripts/datetime/jquery.datetimepicker.css"/>

<script src="scripts/datetime/jquery.datetimepicker.js"></script>
<script>
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
startDate:  '<?php echo $month; ?>-<?php echo $date; ?>-<?php echo $year; ?>'

});
</script>