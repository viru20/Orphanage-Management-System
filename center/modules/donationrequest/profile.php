
<section id="main-content" class=" ">
  <section class="wrapper" style='margin-top:70px;display:inline-block;width:100%;'>
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
      <div class="page-title">
        <div class="pull-left" >
          <h1 class="title">User Details</h1>
        </div>                           
        
                                      
      
      <div class="content-body">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form method="post" action="">
              <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
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
                    <th>ID</th>
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
                
                 $qry= mysqli_query($con,"select * from ".TABLE_PREFIX."user_master where user_is_delete=0");
                
                while($result_user = mysqli_fetch_array($qry))
                {
                    ?>
                    
                      <td><?php echo $result_user["id"];?></td>
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