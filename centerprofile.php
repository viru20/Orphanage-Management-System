<?php
include('secure/config.php');
include('secure/function.php');
include('topheader.php');
include('bottomheader.php');
$result=mysqli_query($con,"select *from orphanage_center_master where center_id = '".$_REQUEST['id']."'");
$row=mysqli_fetch_array($result);
?>
 <section class="about-low-area section-padding2">
    <div class="container">
            <div class="row">
            	<div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="<?php echo CENTER_IMAGE.$row['center_head_image'];?>" height="400px;" width="550px; "alt="" style="padding-top:0px;margin-bottom:90%;padding-left: 0px;padding-right:30%">
                        </div>
                        <div class="about-back-img ">
                           <!--  <img src="assets/img/gallery/about1.png" alt=""> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">

                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <!-- <span></span> -->
                            <h2><?php echo $row['center_name'];?></h2>
                        </div>
                        <div style="font-size:23px;">
                       <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Head Name:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['center_head_name'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Registration Date:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['center_reg_date'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Mobile No:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['center_mo_no'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Country:-
                   </div>
                       <div class="col-md-6">
                       <?php 
                        $query=mysqli_query($con,"select *from country");
                        while($res1=mysqli_fetch_array($query))
                        {
                         
                        if($res1['id'] == $row['country'])
                         {
                           echo $res1['name'];
                         }
                        }
                        ?> 
                   
                   </div> </div>  <div class="row"
                   style="padding-bottom:20px;"> <div class="col-md-6">
                   Region:- </div> <div class="col-md-6"> <?php 
                   $query1=mysqli_query($con,"select *from states");
                   while($res1=mysqli_fetch_array($query1)) {
                         
                        if($res1['id'] == $row['region'])
                         {
                           echo $res1['name'];
                         }
                        }
                        ?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       City:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['city'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Address:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['address'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Email:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['email'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       History:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['history'];?>
                   </div>
                    </div>    
                       </div>
                    </div>
                    <a href="children?id=<?php echo $_REQUEST['id']; ?>" class="btn">Children</a>
                </div>
                
                
                        <div class="map" style="padding-top: 50px;"><?php echo $row['map'];?></div>
                  
            </div>
        </div>
</section>        
<?php
include('footer.php');
?>