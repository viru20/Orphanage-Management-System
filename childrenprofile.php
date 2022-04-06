<?php
include('secure/config.php');
include('secure/function.php');
include('topheader.php');
include('bottomheader.php');
$result=mysqli_query($con,"select *from orphanage_children_master where children_id = '".$_REQUEST['id']."'");
$row=mysqli_fetch_array($result);
?>
 <section class="about-low-area section-padding2">
    <div class="container">
            <div class="row">
            	<div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="<?php echo CHILDREN_IMAGE.$row['children_img'];?>" height="400px;" width="350px; "alt="" style="padding-top:0px;margin-bottom:50%;">
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
                            <h2><?php echo $row['children_name'];?></h2>
                        </div>
                        <div style="font-size:23px;">
                    <?php 
                    if($row['children_dob']!="")
                    {
                    ?>
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Date Of Birth:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['children_dob'];?>
                   </div>
                    </div>
                     <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Age:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['children_age'];?>
                   </div>
                    </div> 
                    <?php
                  }
                    ?> 
                      <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Gender:-
                   </div>
                       <div class="col-md-6">
                       <?php if($row['children_gender']==1)
                       {
                        echo "Male";
                       }
                       if($row['children_gender']==2)
                       {
                        echo "Female";
                       }
                        ;?>
                   </div>
                    </div> 
                   
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Children Height:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['children_height'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Children weight:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['children_weight']." Kg";?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Children Bloodgroup:-
                   </div>
                       <div class="col-md-6">
                       <?php echo $row['children_bloodgroup'];?>
                   </div>
                    </div> 
                    <div class="row" style="padding-bottom:20px;">
                       <div class="col-md-6">
                       Center:-
                   </div>
                       <div class="col-md-6">
                       <?php
                       $qry=mysqli_query($con,"select *from ".TABLE_PREFIX."center_master where center_id='".$row['center_id']."'");
                       $res=mysqli_fetch_array($qry);
                       echo $res['center_name'];
                       ?>
                   </div>
                    </div> 
                      
                       </div>
                    </div>
                    <a href="children?id=<?php echo $res['center_id'];?>" class="btn">Back</a>
                    <a href="adopt?id=<?php echo $_REQUEST['id']; ?>" class="btn">Adopt</a>
                </div>
                
            </div>
        </div>
</section>        
<?php
include('footer.php');
?>