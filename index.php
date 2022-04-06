<html>
<head><title>Orphanage</title></head>
<!--Tittel-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Orphanage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
 <!--Preloader-->
 
<!--Preloader-->
 
<?php
include('secure/config.php');
include('topheader.php');
include('bottomheader.php');
?>
<!-- slider Area Start-->
<?php
$qry=mysqli_query($con,"select * from slider");
  $res=mysqli_fetch_array($qry);
  ?>
    <div class="slider-area">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInUp" data-delay=".6s"><?php echo $res['head'];?></h1>
                                <P data-animation="fadeInUp" data-delay=".8s" style="justify-content:center;"><?php echo $res['subhead'];?></P>
                                <!-- Hero-btn -->
                                <div class="hero__btn">
                                    <a href="donation" class="btn hero-btn mb-10"  data-animation="fadeInLeft" data-delay=".8s">Donation</a>
                                    <a href="industries.html" class="cal-btn ml-15" data-animation="fadeInRight" data-delay="1.0s">
                                        <i class="flaticon-null"></i>
                                        <p>+91 <?php echo $res['contact'];?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
           
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="wantToWork-area ">
        <div class="container">
            <div class="wants-wrapper w-padding2  section-bg" data-background="assets/img/gallery/section_bg01.png">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-9 col-md-8">
                        <div class="wantToWork-caption wantToWork-caption2">
                            <h2>Lets Chenge The World With Humanity</h2>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4">
                        <a href="volunteer" class="btn white-btn f-right sm-left">Become A Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider Area End-->                                            
<section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span></span>
                            <h2>We Are In A Mission To  Help Helpless</h2>
                        </div>
                        <p>Every child deserves a happy and healthy childhood and the opportunity to build a brighter future. Your support provides access to education, protection of protection, nutrition of nutritious meals and the chance to build a secure future.</p>
                        <p>Change the life of an orphan’s life by giving them a loving and caring home. Your sponsorship will provide nutritious meals, clothing, healthcare, education and a special guardian. Give the chance to break out of poverty today. </p>
                    </div>
                   
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="assets/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
include('count.php');
include('footer.php');
?>