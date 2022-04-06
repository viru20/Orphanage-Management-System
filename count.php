 <!--? Count Down Start -->
 <?php
include('secure/config.php');
$qry=mysqli_query($con,"select SUM(amount) as total from ".TABLE_PREFIX."donation_master where payment_status='1'");
$donation=mysqli_fetch_array($qry);
$res=mysqli_query($con,"select * from orphanage_adopt_master where ADOPT_STATUS='1'");
$count=mysqli_num_rows($res);
$res1=mysqli_query($con,"select * from orphanage_donate_master where donate_status='1'");
$count1=mysqli_num_rows($res1);

$res2=mysqli_query($con,"select * from orphanage_volunteer_master where vol_status='1'");
$count2=mysqli_num_rows($res2);
 ?>
    <div class="count-down-area pt-25 section-bg" data-background="assets/img/gallery/section_bg02.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="count-down-wrapper" >
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter color-green"><?php echo $donation['total'];?></span>
                                    <span class="plus">Rs.</span>
                                    <p class="color-green">Donation</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter color-green"><?php echo $count;?></span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Adoption</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter color-green"><?php echo $count1;?></span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Donate</p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- Counter Up -->
                                <div class="single-counter text-center">
                                    <span class="counter color-green"><?php echo $count2;?></span>
                                    <span class="plus">+</span>
                                    <p class="color-green">Volunteer</p>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Count Down End -->