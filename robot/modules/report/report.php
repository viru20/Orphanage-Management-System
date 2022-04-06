
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">User Report</h1>
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
        <h2 class="title pull-left">
          <form action="" Method="POST">
            <div class="row">
              <div class="col-md-12">
           <div class="col-md-5">
           <input type="date" name="from" id="from" class="form-control" style="height:40px;">
           </div>
           <div class="col-md-5">
           <input type="date" name="to" id="to" class="form-control" style="height:40px;">
         </div>
           
         <div class="col-md-2">
           <input type="submit" class="btn btn-successfull" name="genrate" id="genrate" value="Submit">
         </div>
         </div>
       </div>
          </form>        
        </h2> 
       <h4 class="title pull-center">
               
      </h4>                                
      </header>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>USER ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>MOBILE_NO</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>DATE</th>
                    <th>UPADATED DATE</th>
                   <!--  <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>USER ID</th>
                    <th>NAME</th>
                    <th>GENDER</th>
                    <th>MOBILE_NO</th>
                    <th>DOB</th>
                    <th>ADDRESS</th>
                    <th>DATE</th>
                    <th>UPADATED DATE</th>
                    <!-- <th>Interstitial Ad</th>
                    <th>Banner Ad</th>
                    <th>Video Ad</th> -->
                 </tr>
               </tfoot>
               <tbody>
                <?php
}
$qry= mysqli_query($con,"select *from orphanage_user_master where user_is_delete=0 and date='".date("y/m/d")."'");
if(isset($_REQUEST['genrate']))
                {
                if($_REQUEST['from']!=="" && $_REQUEST['to']!=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date BETWEEN '".$_REQUEST['from']."' and '".$_REQUEST['to']."' ");
                }
                else if($_REQUEST['from']!=="" && $_REQUEST['to']=="")
                { 
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0 and  date ='".$_REQUEST['from']."'");
                }
                

                ?>
                
                <h2 class="title pull-right">
                <a href="<?php echo REPORT;?>process.php?action=download&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>"onclick="return confirm('Are you sure?\n\nDo you want to download this?')"><img src="<?php echo MEDIA;?>images/download.png" width="32" height="32" border="0" />&nbsp;&nbsp;Download</a>|
                <a href="<?php echo REPORT;?>process.php?action=preview&from=<?php echo $_REQUEST['from'];?>&to=<?php echo $_REQUEST['to'];?>"><img src="<?php echo MEDIA;?>images/view.png" width="32" height="32" border="0" />&nbsp;&nbsp;Preview</a>
      </h2>                                
      </header>
      <?php
      }
                while($result_user = mysqli_fetch_array($qry))
                {
                    ?>
                    
                      <td><?php echo $result_user["id"];?></td>
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
                <td><?php 
                $day= strtotime($result_user["dob"]);
                $day = date('d-M-Y',$day);
                echo $day;
                ?></td>
                <td><?php echo $result_user["address"];?></td>
                <td><?php 
                $day= strtotime($result_user["datetime"]);
                $day = date('d-M-Y H:i:sa',$day);
                echo $day;
                ?></td>
                <td><?php 
                $day= strtotime($result_user["user_update_datetime"]);
                $day = date('d-M-Y H:i:sa',$day);
                echo $day ;
                ?></td>
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
<?php

?>
</div>               


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