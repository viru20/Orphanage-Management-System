<link rel="stylesheet" href="<?php echo MEDIA;?>css/summernote.css">
<script type="text/javascript" src="<?php echo MEDIA;?>js/summernote.js"></script>
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">News</h1> 
        </div>                           
        
        <div class="pull-right col-lg-8">                                  

          
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
       if(isset($_SESSION["appinfo_alert_message"]))
       {
        ?>
        <div class="state iradio_square-green checked" style="color:green;"> <i class="fa fa-arrow-circle-right"></i><?php echo $_SESSION["appinfo_alert_message"]; ?></div>

        <?php
        unset($_SESSION["appinfo_alert_message"]);
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
            <form method="post" action="<?php echo PAYMENT_METHOD;?>process.php">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Name</th>
                   
                    <th  width="10%">Edit</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    
                    <th  width="10%">Edit</th>
                 </tr>
               </tfoot>
               <tbody>
                <?php
                $qry_appinfo= mysqli_query($con,"SELECT * from ".TABLE_PREFIX."news_master");
                
                while($result_appinfo = mysqli_fetch_array($qry_appinfo))
                {
                    ?>
                    <tr>
                      <td><?php echo html_entity_decode($result_appinfo["daily_free_coins_news_desc"],ENT_QUOTES);?></td>
                     
                      <td align="center"><a href="<?php echo HTTP_BASE_URL;?>appinfo-edit-<?php echo $result_appinfo['daily_free_coins_news_id']?>"><img src="<?php echo MEDIA;?>images/edit.png" width="14" height="14" border="0" /></a></td>
                     
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
  ?>    
  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
      <header class="panel_header">                           
        <ol class="breadcrumb">
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>"><i class="fa fa-home"></i>Home</a>
          </li>
          <li>
            <a href="<?php echo HTTP_BASE_URL;?>appinfo">News</a>
          </li>
          <li class="active">
            <strong>Edit Record</strong>
          </li>
        </ol>
      </header>
      <form method="post" action="<?php echo APPINFO;?>process.php" name="portal-form" enctype="multipart/form-data">
        <?php 
        //echo "SELECT * from ".TABLE_PREFIX."app_info_master where app_info_id='".$_REQUEST["appinfo_id"]."'";
        $qry_appinfo = mysqli_query($con,"SELECT * from ".TABLE_PREFIX."news_master where daily_free_coins_news_id='".$_REQUEST["appinfo_id"]."'");
        $result_appinfo = mysqli_fetch_array($qry_appinfo);
          ?>
          <div class="content-body">
            <div class="row">
            <div class="col-md-6">             
              
              <div class="form-group">
                <label class="form-label" for="field-1"><b>App info</b></label>
                <!-- <span class="desc">e.g. "Men, Women, Kids etc."</span> -->
                <div class="controls">
                   
                 <textarea class="form-control" name="txtname" id="txtname" rows="10" style="border: 2px solid #ccc;border-radius: 10px;"><?php echo $result_appinfo['daily_free_coins_news_desc'];?></textarea>
               </div>
             </div> 

         
            <div class="clearfix"></div>  
            
            <div class="form-group"> 
             <input type="hidden" name="action" id="action" value="appinfo_edit">
             <input type="hidden" name="appinfo_id" value="<?php echo $_REQUEST['daily_free_coins_news_id'];?>"/>
             <button type="submit" class="btn btn-blue  pull-center">Submit</button>
             <a href="<?php echo HTTP_BASE_URL;?>appinfo"><button type="button" class="btn btn-blue  pull-center">Back</button></a>
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
<script src="assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
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

<script src="<?php echo MEDIA;?>js/summernote.js" type="text/javascript"></script>


<script type="text/javascript">

    $(document).ready(function() {
        $('#txtname').summernote({
            height: 300
        });
    });
</script>